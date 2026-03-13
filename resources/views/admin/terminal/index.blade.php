<!doctype html>
@include('admin.main.html')
<head>
    <meta charset="utf-8" />
    <title>BZNSBOOK - Server Terminal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('admin.main.meta')
    <style>
        .cmd-group { margin-bottom: 1.5rem; }
        .cmd-group-title {
            font-size: 0.7rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: #6c757d;
            margin-bottom: 0.6rem;
            padding-bottom: 0.3rem;
            border-bottom: 1px solid #e8e8e8;
        }
        .cmd-btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 14px;
            margin: 3px 4px;
            border: 1px solid #dee2e6;
            border-radius: 6px;
            background: #fff;
            font-size: 0.82rem;
            font-family: 'SFMono-Regular', Consolas, 'Liberation Mono', Menlo, monospace;
            cursor: pointer;
            transition: all 0.15s ease;
            color: #33475b;
        }
        .cmd-btn:hover { background: #f0f4f8; border-color: #adb5bd; }
        .cmd-btn.running { opacity: 0.6; pointer-events: none; border-color: #0d6efd; }
        .cmd-btn.success { border-color: #198754; background: #d1e7dd; }
        .cmd-btn.failed  { border-color: #dc3545; background: #f8d7da; }
        .cmd-btn i { font-size: 1rem; }
        .cmd-btn .spinner-border { width: 14px; height: 14px; border-width: 2px; }

        .cmd-btn.danger { border-color: #dc3545; color: #dc3545; }
        .cmd-btn.danger:hover { background: #f8d7da; }
        .cmd-btn.warning { border-color: #ffc107; color: #856404; }
        .cmd-btn.warning:hover { background: #fff3cd; }

        #terminal-output {
            background: #1e1e2e;
            color: #cdd6f4;
            font-family: 'SFMono-Regular', Consolas, 'Liberation Mono', Menlo, monospace;
            font-size: 0.8rem;
            line-height: 1.5;
            padding: 16px;
            border-radius: 8px;
            min-height: 250px;
            max-height: 500px;
            overflow-y: auto;
            white-space: pre-wrap;
            word-break: break-word;
        }
        #terminal-output .cmd-line { color: #89b4fa; }
        #terminal-output .cmd-success { color: #a6e3a1; }
        #terminal-output .cmd-error { color: #f38ba8; }
        #terminal-output .cmd-info { color: #94e2d5; }
        #terminal-output .cmd-separator { color: #585b70; }

        .terminal-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 8px 16px;
            background: #313244;
            border-radius: 8px 8px 0 0;
            margin-bottom: -1px;
        }
        .terminal-header .dots span {
            display: inline-block;
            width: 10px; height: 10px;
            border-radius: 50%;
            margin-right: 5px;
        }
        .terminal-header .dot-red    { background: #f38ba8; }
        .terminal-header .dot-yellow { background: #f9e2af; }
        .terminal-header .dot-green  { background: #a6e3a1; }
        .terminal-header .title { color: #a6adc8; font-size: 0.75rem; font-weight: 500; }
    </style>
</head>
<body>
    <div class="hk-wrapper" data-layout="twocolumn" data-menu="light" data-footer="simple" data-hover="active">
        {{-- @include('admin.main.sidebar') --}}
        <div class="py-0 hk-pg-wrapper">
            <div class="py-0 hk-pg-body">
                <div class="taskboardapp-wrap">
                    <div class="taskboardapp-content">
                        <div class="taskboardapp-detail-wrap">

                            {{-- Page Header --}}
                            <header class="hk-pg-header pg-header-wth-tab">
                                <div>
                                    <div class="d-flex align-items-center">
                                        <button class="btn btn-icon btn-rounded btn-flush-dark flush-soft-hover navbar-toggle me-2 d-xl-none">
                                            <span class="icon"><span class="feather-icon"><i data-feather="align-left"></i></span></span>
                                        </button>
                                        <div class="avatar avatar-sm avatar-icon avatar-info me-3">
                                            <span class="initial-wrap rounded-8">
                                                <i class="text-white bi bi-terminal-fill fs-4"></i>
                                            </span>
                                        </div>
                                        <div>
                                            <h5 class="mb-0 pg-title fs-5">Server Terminal</h5>
                                            <p class="mb-0 pg-subtitle text-muted" style="font-size:0.78rem;">Run server commands without SSH access</p>
                                        </div>
                                    </div>
                                </div>
                            </header>

                            <div class="contact-body" style="padding: 20px;">

                                <div class="row">
                                    {{-- Left: Commands --}}
                                    <div class="mb-4 col-xl-5 col-lg-6">
                                        <div class="border-0 shadow-sm card">
                                            <div class="p-3 card-body">

                                                {{-- Composer --}}
                                                <div class="cmd-group">
                                                    <div class="cmd-group-title"><i class="bi bi-box-seam me-1"></i> Composer</div>
                                                    <button class="cmd-btn" data-cmd="composer_install"><i class="bi bi-download"></i> composer install</button>
                                                    <button class="cmd-btn" data-cmd="composer_update"><i class="bi bi-arrow-repeat"></i> composer update</button>
                                                    <button class="cmd-btn" data-cmd="composer_dump"><i class="bi bi-recycle"></i> dump-autoload</button>
                                                </div>

                                                {{-- Cache & Optimization --}}
                                                <div class="cmd-group">
                                                    <div class="cmd-group-title"><i class="bi bi-lightning-charge me-1"></i> Cache & Optimization</div>
                                                    <button class="cmd-btn" data-cmd="optimize_clear"><i class="bi bi-eraser"></i> optimize:clear</button>
                                                    <button class="cmd-btn" data-cmd="optimize"><i class="bi bi-speedometer2"></i> optimize</button>
                                                    <button class="cmd-btn" data-cmd="cache_clear"><i class="bi bi-trash3"></i> cache:clear</button>
                                                    <button class="cmd-btn" data-cmd="config_clear"><i class="bi bi-file-earmark-x"></i> config:clear</button>
                                                    <button class="cmd-btn" data-cmd="config_cache"><i class="bi bi-file-earmark-check"></i> config:cache</button>
                                                    <button class="cmd-btn" data-cmd="route_clear"><i class="bi bi-signpost-split"></i> route:clear</button>
                                                    <button class="cmd-btn" data-cmd="route_cache"><i class="bi bi-signpost-fill"></i> route:cache</button>
                                                    <button class="cmd-btn" data-cmd="view_clear"><i class="bi bi-eye-slash"></i> view:clear</button>
                                                    <button class="cmd-btn" data-cmd="view_cache"><i class="bi bi-eye-fill"></i> view:cache</button>
                                                    <button class="cmd-btn" data-cmd="event_clear"><i class="bi bi-bell-slash"></i> event:clear</button>
                                                </div>

                                                {{-- Database --}}
                                                <div class="cmd-group">
                                                    <div class="cmd-group-title"><i class="bi bi-database me-1"></i> Database</div>
                                                    <button class="cmd-btn" data-cmd="migrate"><i class="bi bi-arrow-up-circle"></i> migrate</button>
                                                    <button class="cmd-btn" data-cmd="migrate_status"><i class="bi bi-list-check"></i> migrate:status</button>
                                                    <button class="cmd-btn" data-cmd="db_seed"><i class="bi bi-tree"></i> db:seed</button>
                                                    <button class="cmd-btn danger" data-cmd="migrate_fresh_seed" data-confirm="This will DROP all tables and re-seed. Are you sure?"><i class="bi bi-exclamation-triangle"></i> migrate:fresh --seed</button>
                                                </div>

                                                {{-- Storage --}}
                                                <div class="cmd-group">
                                                    <div class="cmd-group-title"><i class="bi bi-folder-symlink me-1"></i> Storage</div>
                                                    <button class="cmd-btn" data-cmd="storage_link"><i class="bi bi-link-45deg"></i> storage:link</button>
                                                </div>

                                                {{-- Queue & Schedule --}}
                                                <div class="cmd-group">
                                                    <div class="cmd-group-title"><i class="bi bi-stack me-1"></i> Queue & Schedule</div>
                                                    <button class="cmd-btn" data-cmd="queue_work_once"><i class="bi bi-play-circle"></i> queue:work --once</button>
                                                    <button class="cmd-btn" data-cmd="queue_restart"><i class="bi bi-arrow-clockwise"></i> queue:restart</button>
                                                    <button class="cmd-btn" data-cmd="queue_retry_all"><i class="bi bi-arrow-repeat"></i> queue:retry all</button>
                                                    <button class="cmd-btn" data-cmd="queue_clear"><i class="bi bi-trash3"></i> queue:clear</button>
                                                    <button class="cmd-btn" data-cmd="schedule_run"><i class="bi bi-clock-history"></i> schedule:run</button>
                                                </div>

                                                {{-- Maintenance --}}
                                                <div class="cmd-group">
                                                    <div class="cmd-group-title"><i class="bi bi-tools me-1"></i> Maintenance</div>
                                                    <button class="cmd-btn warning" data-cmd="down" data-confirm="This will put the application in maintenance mode. Continue?"><i class="bi bi-pause-circle"></i> php artisan down</button>
                                                    <button class="cmd-btn" data-cmd="up"><i class="bi bi-play-fill"></i> php artisan up</button>
                                                </div>

                                                {{-- Info --}}
                                                <div class="cmd-group">
                                                    <div class="cmd-group-title"><i class="bi bi-info-circle me-1"></i> Info</div>
                                                    <button class="cmd-btn" data-cmd="about"><i class="bi bi-info-lg"></i> about</button>
                                                    <button class="cmd-btn" data-cmd="route_list"><i class="bi bi-signpost-2"></i> route:list</button>
                                                </div>

                                                {{-- Translations --}}
                                                <div class="cmd-group">
                                                    <div class="cmd-group-title"><i class="bi bi-translate me-1"></i> Translations</div>
                                                    <button class="cmd-btn" data-cmd="translations_compile"><i class="bi bi-file-earmark-code"></i> translations:compile</button>
                                                    <button class="cmd-btn" data-cmd="translations_scan"><i class="bi bi-search"></i> translations:scan</button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    {{-- Right: Terminal Output --}}
                                    <div class="col-xl-7 col-lg-6">
                                        <div class="border-0 shadow-sm card">
                                            <div class="p-0 card-body">
                                                <div class="terminal-header">
                                                    <div class="dots">
                                                        <span class="dot-red"></span>
                                                        <span class="dot-yellow"></span>
                                                        <span class="dot-green"></span>
                                                    </div>
                                                    <div class="title">Server Terminal — {{ config('app.name') }}</div>
                                                    <button id="clear-terminal" class="btn btn-sm btn-flush-light text-light" style="font-size:0.7rem;padding:2px 8px;">Clear</button>
                                                </div>
                                                <div id="terminal-output"><span class="cmd-info">Ready. Click a command to execute.</span>
</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('admin.main.scripts')

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const terminal = document.getElementById('terminal-output');
        const clearBtn = document.getElementById('clear-terminal');
        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content')
                       || '{{ csrf_token() }}';

        function appendLine(text, className) {
            const span = document.createElement('span');
            span.className = className || '';
            span.textContent = text + '\n';
            terminal.appendChild(span);
            terminal.scrollTop = terminal.scrollHeight;
        }

        function appendSeparator() {
            appendLine('─'.repeat(50), 'cmd-separator');
        }

        clearBtn.addEventListener('click', function() {
            terminal.innerHTML = '<span class="cmd-info">Terminal cleared.</span>\n';
        });

        document.querySelectorAll('.cmd-btn').forEach(function(btn) {
            btn.addEventListener('click', function() {
                const cmd = this.dataset.cmd;
                const confirmMsg = this.dataset.confirm;

                if (confirmMsg && !confirm(confirmMsg)) return;

                // Disable button
                this.classList.add('running');
                this.classList.remove('success', 'failed');
                const originalHTML = this.innerHTML;
                const label = this.textContent.trim();
                this.innerHTML = '<span class="spinner-border spinner-border-sm"></span> Running...';

                appendSeparator();
                appendLine('$ ' + label, 'cmd-line');
                appendLine('[' + new Date().toLocaleTimeString() + '] Executing...', 'cmd-info');

                const self = this;

                fetch('{{ route("admin.terminal.execute") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json',
                    },
                    body: JSON.stringify({ command: cmd })
                })
                .then(function(res) { return res.json(); })
                .then(function(data) {
                    if (data.success) {
                        appendLine(data.output, 'cmd-success');
                        appendLine('✓ Completed (exit code: ' + (data.exitCode ?? 0) + ')', 'cmd-success');
                        self.classList.add('success');
                    } else {
                        appendLine(data.output, 'cmd-error');
                        appendLine('✗ Failed (exit code: ' + (data.exitCode ?? 1) + ')', 'cmd-error');
                        self.classList.add('failed');
                    }
                })
                .catch(function(err) {
                    appendLine('Network error: ' + err.message, 'cmd-error');
                    self.classList.add('failed');
                })
                .finally(function() {
                    self.classList.remove('running');
                    self.innerHTML = originalHTML;
                    appendLine('');
                });
            });
        });
    });
    </script>
</body>
</html>
