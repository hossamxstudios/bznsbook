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
    ];

    private function phpBinary(): string
    {
        // PHP_BINARY under FPM returns php-fpm, not php-cli. Derive the CLI path.
        $binary = PHP_BINARY;

        // If running under FPM, swap to CLI binary
        if (str_contains($binary, 'php-fpm') || PHP_SAPI === 'fpm-fcgi') {
            // /path/to/php-fpm → /path/to/php
            $cli = preg_replace('/php-fpm[^\/]*$/', 'php', $binary);
            if ($cli && file_exists($cli)) {
                return $cli;
            }

            // Try sibling bin directory (e.g. /opt/homebrew/Cellar/php/8.x/sbin/php-fpm → .../bin/php)
            $cli = str_replace('/sbin/php-fpm', '/bin/php', $binary);
            if (file_exists($cli)) {
                return $cli;
            }
        }

        // Common fallback paths
        $candidates = [
            dirname($binary) . '/php',
            '/usr/local/bin/php',
            '/usr/bin/php',
            '/opt/homebrew/bin/php',
        ];

        foreach ($candidates as $path) {
            if ($path !== $binary && file_exists($path)) {
                return $path;
            }
        }

        return $binary;
    }

    private function composerBinary(): string
    {
        // Check common locations
        $candidates = [
            base_path('composer.phar'),
            '/usr/local/bin/composer',
            '/usr/bin/composer',
            '/opt/homebrew/bin/composer',
        ];

        foreach ($candidates as $path) {
            if (file_exists($path)) {
                return $path;
            }
        }

        // Fallback: try `which composer`
        $which = trim((string) shell_exec('which composer 2>/dev/null'));
        if ($which && file_exists($which)) {
            return $which;
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

        $cmd = $this->resolveCommand($this->commands[$key]);

        try {
            $process = new Process($cmd);
            $process->setWorkingDirectory(base_path());
            $process->setTimeout(300); // 5 minutes max
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
}
