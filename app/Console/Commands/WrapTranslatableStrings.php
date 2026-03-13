<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class WrapTranslatableStrings extends Command
{
    protected $signature = 'translations:wrap
                            {--dir=resources/views : Directory to scan}
                            {--dry-run : Show changes without writing}
                            {--place= : Override place tag for all strings}';

    protected $description = 'Wrap visible text strings in Blade files with x_() for translation';

    // Patterns to skip
    private array $skipPatterns = [
        '/^\s*$/',                    // empty/whitespace
        '/^[\d\.\,\$\%\#\@\!\&\+\-\=\|\:\;\/\\\\]+$/', // only symbols/numbers
        '/^[a-z_\-\.]+$/',           // likely CSS class, variable, or key
        '/^\{\{/',                    // already blade expression
        '/^\{!!/',                    // already blade raw
        '/^@/',                       // blade directive
        '/^https?:\/\//',            // URL
        '/^mailto:/',                // mailto
        '/^tel:/',                   // tel
        '/^#/',                      // anchor/color
        '/^javascript:/',            // JS
        '/^\d+px/',                  // CSS value
        '/^[A-Z][A-Z_]+$/',         // likely constant (but we allow normal words)
    ];

    // HTML attributes that contain visible text
    private array $textAttributes = [
        'placeholder',
        'title',
        'data-bs-original-title',
        'alt',
    ];

    // Attributes to NEVER touch
    private array $skipAttributes = [
        'class', 'id', 'name', 'type', 'href', 'src', 'action', 'method',
        'style', 'data-bs-toggle', 'data-bs-placement', 'data-bs-trigger',
        'data-bs-target', 'data-bs-dismiss', 'data-target', 'data-simplebar',
        'role', 'aria-label', 'aria-labelledby', 'aria-hidden', 'for',
        'value', 'width', 'height', 'viewBox', 'xmlns', 'stroke', 'fill',
        'stroke-width', 'stroke-linecap', 'stroke-linejoin', 'd', 'cx', 'cy',
        'r', 'x', 'y', 'rx', 'x1', 'y1', 'x2', 'y2', 'data-feather',
        'data-layout', 'data-menu', 'data-footer', 'data-hover',
        'onsubmit', 'onclick', 'onchange', 'oninput',
        'data-simplebar', 'content', 'charset', 'http-equiv',
        'data-bs-parent', 'data-original-title', 'data-placement',
        'accept', 'enctype', 'colspan', 'rowspan', 'scope',
        'min', 'max', 'step', 'pattern', 'maxlength', 'minlength',
        'rows', 'cols', 'size', 'tabindex', 'autocomplete',
    ];

    private int $totalWrapped = 0;
    private int $totalFiles = 0;

    public function handle(): int
    {
        $dir = base_path($this->option('dir'));
        $dryRun = $this->option('dry-run');

        if (!File::isDirectory($dir)) {
            $this->error("Directory not found: {$dir}");
            return 1;
        }

        $files = File::allFiles($dir);
        $bladeFiles = collect($files)->filter(fn($f) => str_ends_with($f->getFilename(), '.blade.php'));

        $this->info("Found {$bladeFiles->count()} Blade files in {$dir}");

        foreach ($bladeFiles as $file) {
            $this->processFile($file->getPathname(), $dryRun);
        }

        $this->newLine();
        $this->info("Done! Wrapped {$this->totalWrapped} strings across {$this->totalFiles} files.");

        return 0;
    }

    private function processFile(string $path, bool $dryRun): void
    {
        $original = File::get($path);

        // Skip files that are purely PHP/JS with no HTML
        if (!preg_match('/<[a-zA-Z]/', $original)) {
            return;
        }

        // Determine place tag from path
        $place = $this->option('place') ?: $this->guessPlace($path);

        $content = $original;
        $wrappedCount = 0;

        // 1. Wrap text content between HTML tags
        $content = $this->wrapTagContent($content, $place, $wrappedCount);

        // 2. Wrap text attributes (placeholder, title, alt, data-bs-original-title)
        $content = $this->wrapTextAttributes($content, $place, $wrappedCount);

        if ($wrappedCount > 0) {
            $this->totalFiles++;
            $this->totalWrapped += $wrappedCount;

            $relativePath = str_replace(base_path() . '/', '', $path);
            $this->line("  <info>{$relativePath}</info>: {$wrappedCount} strings wrapped");

            if (!$dryRun) {
                File::put($path, $content);
            }
        }
    }

    private function wrapTagContent(string $content, string $place, int &$count): string
    {
        // Match text between > and < that isn't already wrapped
        // This regex finds: >  some visible text  <
        $result = preg_replace_callback(
            '/(?<=>)([^<>{}\n]*[a-zA-Z][^<>{}\n]*)(?=<)/',
            function ($matches) use ($place, &$count) {
                $text = $matches[1];
                $trimmed = trim($text);

                // Skip if empty or too short
                if (strlen($trimmed) < 2) return $matches[0];

                // Skip if already contains blade expressions
                if (str_contains($text, '{{') || str_contains($text, '{!!') || str_contains($text, 'x_(')) {
                    return $matches[0];
                }

                // Skip if matches skip patterns
                foreach ($this->skipPatterns as $pattern) {
                    if (preg_match($pattern, $trimmed)) {
                        return $matches[0];
                    }
                }

                // Skip pure numbers, emails, URLs
                if (is_numeric($trimmed)) return $matches[0];
                if (filter_var($trimmed, FILTER_VALIDATE_EMAIL)) return $matches[0];
                if (filter_var($trimmed, FILTER_VALIDATE_URL)) return $matches[0];

                // Skip if it looks like a domain
                if (preg_match('/^[a-z0-9\-]+\.[a-z]{2,}$/i', $trimmed)) return $matches[0];

                // Skip CSS-like values
                if (preg_match('/^[\d]+(px|em|rem|vh|vw|%)/', $trimmed)) return $matches[0];

                // Skip JS code fragments
                if (preg_match('/^(var |let |const |function |return |if |else |document\.)/', $trimmed)) return $matches[0];

                // Skip single characters or symbols
                if (preg_match('/^[^a-zA-Z]*$/', $trimmed)) return $matches[0];

                // Preserve leading/trailing whitespace
                $leadingSpace = '';
                $trailingSpace = '';
                if (preg_match('/^(\s+)/', $text, $m)) $leadingSpace = $m[1];
                if (preg_match('/(\s+)$/', $text, $m)) $trailingSpace = $m[1];

                // Escape single quotes in the key
                $escaped = str_replace("'", "\\'", $trimmed);

                $count++;
                return "{$leadingSpace}{{ x_('{$escaped}', '{$place}') }}{$trailingSpace}";
            },
            $content
        );

        return $result ?? $content;
    }

    private function wrapTextAttributes(string $content, string $place, int &$count): string
    {
        foreach ($this->textAttributes as $attr) {
            // Match: attribute="some text" (not already containing {{ }})
            $pattern = '/(' . preg_quote($attr, '/') . ')="([^"]*[a-zA-Z][^"]*)"/';

            $content = preg_replace_callback(
                $pattern,
                function ($matches) use ($place, &$count, $attr) {
                    $value = $matches[2];

                    // Skip if already contains blade expressions
                    if (str_contains($value, '{{') || str_contains($value, 'x_(')) {
                        return $matches[0];
                    }

                    $trimmed = trim($value);

                    // Skip empty or too short
                    if (strlen($trimmed) < 2) return $matches[0];

                    // Skip patterns
                    foreach ($this->skipPatterns as $pattern) {
                        if (preg_match($pattern, $trimmed)) {
                            return $matches[0];
                        }
                    }

                    // Skip URLs and emails
                    if (filter_var($trimmed, FILTER_VALIDATE_URL)) return $matches[0];
                    if (filter_var($trimmed, FILTER_VALIDATE_EMAIL)) return $matches[0];

                    $escaped = str_replace("'", "\\'", $trimmed);

                    $count++;
                    return "{$attr}=\"{{ x_('{$escaped}', '{$place}') }}\"";
                },
                $content
            ) ?? $content;
        }

        return $content;
    }

    private function guessPlace(string $path): string
    {
        $relative = str_replace(base_path() . '/resources/views/', '', $path);
        $relative = str_replace('.blade.php', '', $relative);

        // Map path segments to place tags
        if (str_starts_with($relative, 'web/main/')) return 'web-layout';
        if (str_starts_with($relative, 'web/sections/home/')) return 'home';
        if (str_starts_with($relative, 'web/sections/about/')) return 'about';
        if (str_starts_with($relative, 'web/sections/contact/')) return 'contact';
        if (str_starts_with($relative, 'web/sections/companies/')) return 'companies';
        if (str_starts_with($relative, 'web/projects/')) return 'projects';
        if (str_starts_with($relative, 'web/portfolio/')) return 'portfolio';
        if (str_starts_with($relative, 'web/guides/')) return 'guides';
        if (str_starts_with($relative, 'web/')) return 'web';
        if (str_starts_with($relative, 'admin/main/')) return 'admin-layout';
        if (str_starts_with($relative, 'admin/sections/blogs/')) return 'blogs';
        if (str_starts_with($relative, 'admin/sections/categories/')) return 'categories';
        if (str_starts_with($relative, 'admin/sections/clients/')) return 'clients';
        if (str_starts_with($relative, 'admin/sections/companies/')) return 'companies';
        if (str_starts_with($relative, 'admin/sections/contacts/')) return 'contacts';
        if (str_starts_with($relative, 'admin/sections/deals/')) return 'deals';
        if (str_starts_with($relative, 'admin/sections/leads/')) return 'leads';
        if (str_starts_with($relative, 'admin/sections/pipelines/')) return 'pipelines';
        if (str_starts_with($relative, 'admin/sections/roles/')) return 'roles';
        if (str_starts_with($relative, 'admin/projects/')) return 'admin-projects';
        if (str_starts_with($relative, 'admin/translations/')) return 'translations';
        if (str_starts_with($relative, 'admin/')) return 'admin';

        return 'general';
    }
}
