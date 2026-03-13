<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\Process\Process;

class TerminalController extends Controller
{
    /**
     * Allowed commands whitelist — only these can be executed.
     * Use 'PHP' as placeholder; it gets replaced with the real PHP_BINARY at runtime.
     * Use 'COMPOSER' as placeholder for the composer binary.
     */
    private array $commands = [
        // Composer
        'composer_install'        => ['PHP', 'COMPOSER', 'install', '--no-interaction', '--prefer-dist'],
        'composer_update'         => ['PHP', 'COMPOSER', 'update', '--no-interaction', '--prefer-dist'],
        'composer_dump'           => ['PHP', 'COMPOSER', 'dump-autoload', '-o'],

        // Artisan — Cache & Optimization
        'optimize_clear'          => ['PHP', 'artisan', 'optimize:clear'],
        'optimize'                => ['PHP', 'artisan', 'optimize'],
        'cache_clear'             => ['PHP', 'artisan', 'cache:clear'],
        'config_clear'            => ['PHP', 'artisan', 'config:clear'],
        'config_cache'            => ['PHP', 'artisan', 'config:cache'],
        'route_clear'             => ['PHP', 'artisan', 'route:clear'],
        'route_cache'             => ['PHP', 'artisan', 'route:cache'],
        'view_clear'              => ['PHP', 'artisan', 'view:clear'],
        'view_cache'              => ['PHP', 'artisan', 'view:cache'],
        'event_clear'             => ['PHP', 'artisan', 'event:clear'],

        // Artisan — Database
        'migrate'                 => ['PHP', 'artisan', 'migrate', '--force'],
        'migrate_status'          => ['PHP', 'artisan', 'migrate:status'],
        'migrate_fresh_seed'      => ['PHP', 'artisan', 'migrate:fresh', '--seed', '--force'],
        'db_seed'                 => ['PHP', 'artisan', 'db:seed', '--force'],

        // Artisan — Storage & Links
        'storage_link'            => ['PHP', 'artisan', 'storage:link'],

        // Artisan — Queue & Schedule
        'queue_work_once'         => ['PHP', 'artisan', 'queue:work', '--once'],
        'queue_restart'           => ['PHP', 'artisan', 'queue:restart'],
        'queue_retry_all'         => ['PHP', 'artisan', 'queue:retry', 'all'],
        'queue_clear'             => ['PHP', 'artisan', 'queue:clear'],
        'schedule_run'            => ['PHP', 'artisan', 'schedule:run'],

        // Artisan — Maintenance
        'down'                    => ['PHP', 'artisan', 'down', '--retry=60'],
        'up'                      => ['PHP', 'artisan', 'up'],

        // Artisan — Info
        'about'                   => ['PHP', 'artisan', 'about'],
        'route_list'              => ['PHP', 'artisan', 'route:list', '--compact'],

        // Translations
        'translations_compile'    => ['PHP', 'artisan', 'translations:compile'],
        'translations_scan'       => ['PHP', 'artisan', 'translations:scan'],

        // Diagnostics
        'diagnose'                => ['DIAGNOSE'],
    ];

    private function phpBinary(): string
    {
        // PHP_BINARY under FPM/LSAPI returns php-fpm or lsphp, not php-cli.
        $binary = PHP_BINARY;
        $version = PHP_MAJOR_VERSION . PHP_MINOR_VERSION; // e.g. "84"
        $versionDot = PHP_MAJOR_VERSION . '.' . PHP_MINOR_VERSION; // e.g. "8.4"

        // cPanel EA-PHP paths (most common on cPanel)
        $candidates = [
            "/usr/local/bin/ea-php{$version}",
            "/opt/cpanel/ea-php{$version}/root/usr/bin/php",
            "/opt/alt/php{$version}/usr/bin/php",
            "/usr/local/bin/php{$versionDot}",
            "/usr/local/bin/php{$version}",
            "/usr/local/bin/php",
            "/usr/bin/php{$versionDot}",
            "/usr/bin/php",
        ];

        // If running under FPM/LSAPI, also try deriving from current binary
        if (str_contains($binary, 'php-fpm') || str_contains($binary, 'lsphp') || PHP_SAPI === 'fpm-fcgi' || PHP_SAPI === 'litespeed') {
            $cli = preg_replace('/php-fpm[^\/]*$/', 'php', $binary);
            if ($cli && $cli !== $binary && file_exists($cli)) {
                return $cli;
            }
            $cli = preg_replace('/lsphp$/', 'php', $binary);
            if ($cli && $cli !== $binary && file_exists($cli)) {
                return $cli;
            }
            $cli = str_replace('/sbin/', '/bin/', $binary);
            $cli = preg_replace('/php-fpm[^\/]*$/', 'php', $cli);
            if ($cli !== $binary && file_exists($cli)) {
                return $cli;
            }
        }

        // Also add sibling of current binary
        array_unshift($candidates, dirname($binary) . '/php');

        foreach ($candidates as $path) {
            if ($path !== $binary && file_exists($path)) {
                return $path;
            }
        }

        return $binary;
    }

    private function composerBinary(): string
    {
        $user = get_current_user();

        // Check common locations (cPanel shared hosting paths included)
        $candidates = [
            base_path('composer.phar'),
            "/home/{$user}/composer.phar",
            "/home/{$user}/bin/composer",
            "/home/{$user}/bin/composer.phar",
            '/opt/cpanel/composer/bin/composer',
            '/usr/local/bin/composer',
            '/usr/local/bin/composer.phar',
            '/usr/bin/composer',
            '/usr/bin/composer.phar',
            '/opt/alt/php-tools/bin/composer',
            '/opt/homebrew/bin/composer',
        ];

        foreach ($candidates as $path) {
            if (file_exists($path)) {
                return $path;
            }
        }

        // Try `which composer`
        $which = trim((string) shell_exec('which composer 2>/dev/null'));
        if ($which && file_exists($which)) {
            return $which;
        }

        // Auto-download composer.phar if not found
        $pharPath = base_path('composer.phar');
        $downloaded = @file_put_contents(
            $pharPath,
            file_get_contents('https://getcomposer.org/composer-stable.phar')
        );
        if ($downloaded && file_exists($pharPath)) {
            chmod($pharPath, 0755);
            return $pharPath;
        }

        return 'composer';
    }

    private function resolveCommand(array $cmd): array
    {
        $php = $this->phpBinary();
        $composer = $this->composerBinary();

        return array_map(function ($part) use ($php, $composer) {
            if ($part === 'PHP') return $php;
            if ($part === 'COMPOSER') return $composer;
            return $part;
        }, $cmd);
    }

    public function index()
    {
        return view('admin.terminal.index');
    }

    public function execute(Request $request)
    {
        $request->validate([
            'command' => 'required|string',
        ]);

        $key = $request->input('command');

        if (!isset($this->commands[$key])) {
            return response()->json([
                'success' => false,
                'output'  => 'Unknown command.',
            ], 400);
        }

        // Handle special diagnostic command
        if ($this->commands[$key] === ['DIAGNOSE']) {
            return $this->diagnose();
        }

        $cmd = $this->resolveCommand($this->commands[$key]);

        try {
            $process = new Process($cmd);
            $process->setWorkingDirectory(base_path());
            $process->setTimeout(300); // 5 minutes max

            // Set environment variables required on cPanel / shared hosting
            $home = getenv('HOME') ?: ('/home/' . get_current_user());
            $process->setEnv([
                'HOME'          => $home,
                'COMPOSER_HOME' => $home . '/.composer',
                'PATH'          => getenv('PATH') ?: '/usr/local/bin:/usr/bin:/bin',
            ]);

            $process->run();

            $output = $process->getOutput() . $process->getErrorOutput();

            return response()->json([
                'success'  => $process->isSuccessful(),
                'output'   => $output ?: '(no output)',
                'exitCode' => $process->getExitCode(),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'output'  => 'Error: ' . $e->getMessage(),
            ], 500);
        }
    }

    private function diagnose()
    {
        $php = $this->phpBinary();
        $composer = $this->composerBinary();

        $lines = [];
        $lines[] = '=== Server Diagnostics ===';
        $lines[] = '';
        $lines[] = 'PHP_BINARY:    ' . PHP_BINARY;
        $lines[] = 'PHP_SAPI:      ' . PHP_SAPI;
        $lines[] = 'PHP Version:   ' . PHP_VERSION;
        $lines[] = 'Resolved PHP:  ' . $php;
        $lines[] = 'PHP exists:    ' . (file_exists($php) ? 'YES' : 'NO');
        $lines[] = '';
        $lines[] = 'Resolved Composer: ' . $composer;
        $lines[] = 'Composer exists:   ' . (file_exists($composer) ? 'YES' : 'NO');
        $lines[] = '';
        $lines[] = 'Base path:     ' . base_path();
        $lines[] = 'Current user:  ' . get_current_user();
        $lines[] = 'Server OS:     ' . PHP_OS;
        $lines[] = '';
        $lines[] = 'PATH env:      ' . (getenv('PATH') ?: '(not set)');
        $lines[] = '';

        // Try running php -v
        $process = new Process([$php, '-v']);
        $process->setWorkingDirectory(base_path());
        $process->setTimeout(10);
        $process->run();
        $lines[] = '--- php -v ---';
        $lines[] = trim($process->getOutput()) ?: '(no output)';

        return response()->json([
            'success' => true,
            'output'  => implode("\n", $lines),
            'exitCode' => 0,
        ]);
    }
}
