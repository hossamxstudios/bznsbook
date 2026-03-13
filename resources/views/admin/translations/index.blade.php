<!doctype html>
@include('admin.main.html')
<head>
    <meta charset="utf-8" />
    <title>BZNSBOOK - {{ x_('Translations', 'translations') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('admin.main.meta')
    <style>
        .translation-cell { cursor: pointer; }
        .translation-cell:hover { background: rgba(var(--bs-primary-rgb), 0.05); }
        .trans-badge { display: inline-block; font-size: 0.72rem; padding: 2px 8px; border-radius: 10px; font-weight: 500; }
        .trans-badge.missing { background: #f8d7da; color: #842029; }
        .trans-badge.ai-pending { background: #fff3cd; color: #664d03; }
        .trans-badge.approved { background: #d1e7dd; color: #0f5132; }
        .trans-badge.manual { background: #cfe2ff; color: #084298; }
        .place-badge { font-size: 0.72rem; padding: 2px 8px; }
        .floating-toolbar { position: fixed; bottom: 24px; left: 50%; transform: translateX(-50%); z-index: 1050; display: none; }
        .floating-toolbar.show { display: flex; }
        .avatar.avatar-info > .initial-wrap { background-color: #3e3e3e !important; color: #fff; }
        .stat-pill { display: inline-flex; align-items: center; gap: 6px; padding: 4px 12px; border-radius: 20px; font-size: 0.8rem; font-weight: 500; background: #f8f9fa; border: 1px solid #e9ecef; }
        .stat-pill .dot { width: 6px; height: 6px; border-radius: 50%; }
        .trans-preview { display: block; max-width: 300px; white-space: normal; word-break: break-word; font-size: 0.85rem; line-height: 1.4; }
    </style>
</head>
<body>
    <div class="hk-wrapper" data-layout="twocolumn" data-menu="light" data-footer="simple" data-hover="active">
        @include('admin.main.sidebar')
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
                                                <span class="svg-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-language" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M4 5h7"></path>
                                                        <path d="M9 3v2c0 4.418 -2.239 8 -5 8"></path>
                                                        <path d="M5 9c0 2.144 2.952 3.908 6.7 4"></path>
                                                        <path d="M12 20l4 -9l4 9"></path>
                                                        <path d="M19.1 18h-6.2"></path>
                                                    </svg>
                                                </span>
                                            </span>
                                        </div>
                                        <div class="d-flex flex-wrap justify-content-between flex-1">
                                            <div>
                                                <div class="pg-subtitle">{{ x_('Web Site Management', 'translations') }}</div>
                                                <h5 class="pg-title fs-5">{{ x_('Translations', 'translations') }}
                                                    <span class="badge badge-sm badge-soft-primary ms-1">{{ $totalKeys }} {{ x_('keys', 'translations') }}</span>
                                                </h5>
                                            </div>
                                            <div class="pg-header-action-wrap position-relative">
                                                <div class="d-md-flex d-none ms-auto align-items-center gap-2">
                                                    <form action="{{ route('translations.approve-all') }}" method="POST" class="d-inline">
                                                        @csrf
                                                        <button type="submit" class="btn btn-custom btn-white text-success btn-floating rounded-8" onclick="return confirm('{{ x_('Approve all AI translations?', 'translations') }}')">
                                                            <span><span class="icon shadow-xl bg-white rounded-8"><span class="feather-icon"><i data-feather="check-circle"></i></span></span><span class="fs-7">{{ x_('Approve All', 'translations') }}</span></span>
                                                        </button>
                                                    </form>
                                                    <form action="{{ route('translations.scan-translate') }}" method="POST" class="d-inline">
                                                        @csrf
                                                        <button type="submit" class="btn btn-custom btn-white text-primary btn-floating rounded-8">
                                                            <span><span class="icon shadow-xl bg-white rounded-8"><span class="feather-icon"><i data-feather="search"></i></span></span><span class="fs-7">{{ x_('Scan & Translate', 'translations') }}</span></span>
                                                        </button>
                                                    </form>
                                                    <button type="button" class="btn btn-custom btn-white text-primary btn-floating rounded-8" data-bs-toggle="modal" data-bs-target="#translateAllModal">
                                                        <span><span class="icon shadow-xl bg-white rounded-8"><span class="feather-icon"><i data-feather="globe"></i></span></span><span class="fs-7">{{ x_('Translate All AI', 'translations') }}</span></span>
                                                    </button>
                                                    <div class="dropdown">
                                                        <button class="btn btn-icon btn-rounded btn-flush-dark flush-soft-hover dropdown-toggle no-caret" data-bs-toggle="dropdown">
                                                            <span class="icon"><span class="feather-icon"><i data-feather="more-vertical"></i></span></span>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <form action="{{ route('translations.compile') }}" method="POST">
                                                                @csrf
                                                                <button type="submit" class="dropdown-item"><span class="feather-icon me-2"><i data-feather="refresh-cw" style="width:14px;height:14px;"></i></span>{{ x_('Recompile', 'translations') }}</button>
                                                            </form>
                                                            <form action="{{ route('translations.process-queue') }}" method="POST">
                                                                @csrf
                                                                <button type="submit" class="dropdown-item"><span class="feather-icon me-2"><i data-feather="play-circle" style="width:14px;height:14px;"></i></span>{{ x_('Process Queue', 'translations') }}</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Compact locale stats --}}
                                    <div class="d-flex flex-wrap gap-2 mt-3 mb-2">
                                        @foreach($stats as $code => $stat)
                                        <div class="stat-pill">
                                            <div class="dot" style="background: {{ $stat['percentage'] >= 100 ? '#198754' : ($stat['percentage'] >= 50 ? '#ffc107' : '#dc3545') }};"></div>
                                            <span>{{ $stat['name'] }}</span>
                                            <strong>{{ $stat['percentage'] }}%</strong>
                                            <span class="text-muted">({{ $stat['translated'] }}/{{ $totalKeys }})</span>
                                            @if($stat['ai_pending'] > 0)
                                                <span class="badge badge-sm bg-soft-warning text-warning">{{ $stat['ai_pending'] }} AI</span>
                                            @endif
                                        </div>
                                        @endforeach
                                    </div>

                                    {{-- Status tabs --}}
                                    <ul class="nav nav-tabs nav-icon nav-light mt-1">
                                        @php $tabs = ['all' => 'All', 'missing' => 'Missing', 'ai_pending' => 'AI Pending', 'approved' => 'Approved', 'manual' => 'Manual']; @endphp
                                        @foreach($tabs as $tabKey => $tabLabel)
                                        <li class="nav-item">
                                            <a class="nav-link {{ $status === $tabKey ? 'active' : '' }}" href="{{ route('translations.index', array_merge(request()->except('status', 'page'), ['status' => $tabKey])) }}">
                                                <span class="nav-link-text">{{ x_($tabLabel, 'translations') }} <span class="badge badge-sm badge-light ms-1">{{ $statusCounts[$tabKey] ?? 0 }}</span></span>
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </header>

                            {{-- Main Content Area --}}
                            <div class="overflow-hidden flex-1 d-flex">
                                <div data-simplebar class="nicescroll-bar" id="tab_1">
                                    <div class="px-5 pt-4 container-fluid">

                                        {{-- Flash messages --}}
                                        @if(session('success'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            {{ session('success') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                        </div>
                                        @endif
                                        @if(session('error'))
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            {{ session('error') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                        </div>
                                        @endif

                                        {{-- Filters --}}
                                        <form method="GET" action="{{ route('translations.index') }}" class="d-flex flex-wrap align-items-center gap-2 mb-4">
                                            <input type="hidden" name="status" value="{{ $status }}">
                                            <select name="locale" class="form-select form-select-sm" onchange="this.form.submit()" style="width:auto;">
                                                @foreach($locales as $code => $name)
                                                <option value="{{ $code }}" {{ $filterLocale === $code ? 'selected' : '' }}>{{ $name }} ({{ $code }})</option>
                                                @endforeach
                                            </select>
                                            <select name="place" class="form-select form-select-sm" onchange="this.form.submit()" style="width:auto;">
                                                <option value="">{{ x_('All Groups', 'translations') }}</option>
                                                @foreach($places as $p)
                                                <option value="{{ $p }}" {{ $place === $p ? 'selected' : '' }}>{{ $p }}</option>
                                                @endforeach
                                            </select>
                                            <div class="input-group input-group-sm" style="width:240px;">
                                                <input type="text" name="search" class="form-control" value="{{ $search }}" placeholder="{{ x_('Search...', 'translations') }}">
                                                <button class="btn btn-outline-secondary" type="submit"><span class="feather-icon"><i data-feather="search"></i></span></button>
                                            </div>
                                            @if($search || $place)
                                            <a href="{{ route('translations.index', ['status' => $status, 'locale' => $filterLocale]) }}" class="btn btn-sm btn-outline-secondary"><span class="feather-icon"><i data-feather="x"></i></span></a>
                                            @endif
                                        </form>

                                        {{-- Translation Keys Table --}}
                                        <div class="card rounded-8 mb-4">
                                            <div class="card-body p-0">
                                                <div class="table-responsive">
                                                    <table class="table table-hover w-100 mb-0">
                                                        <thead class="bg-light">
                                                            <tr>
                                                                <th style="width:30px" class="ps-3"><input type="checkbox" id="selectAll" class="form-check-input"></th>
                                                                <th style="min-width:250px">{{ x_('English Text', 'translations') }}</th>
                                                                <th style="width:100px">{{ x_('Group', 'translations') }}</th>
                                                                @foreach($locales as $code => $name)
                                                                <th style="min-width:200px">{{ $name }} ({{ strtoupper($code) }})</th>
                                                                @endforeach
                                                                <th style="width:50px"></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @forelse($keys as $key)
                                                            <tr data-key-id="{{ $key->id }}">
                                                                <td class="ps-3"><input type="checkbox" class="form-check-input row-check" value="{{ $key->id }}"></td>
                                                                <td>
                                                                    <span class="fw-medium" title="{{ $key->param }}" style="font-size:0.875rem;">{{ \Illuminate\Support\Str::limit($key->param, 55) }}</span>
                                                                </td>
                                                                <td>
                                                                    @if($key->place)
                                                                    <span class="badge bg-soft-primary place-badge">{{ $key->place }}</span>
                                                                    @else
                                                                    <span class="text-muted">—</span>
                                                                    @endif
                                                                </td>
                                                                @foreach($locales as $code => $name)
                                                                @php $trans = $key->translations->where('locale', $code)->first(); @endphp
                                                                <td class="translation-cell" data-key-id="{{ $key->id }}" data-locale="{{ $code }}" data-param="{{ $key->param }}" onclick="openInlineEdit(this)">
                                                                    @if($trans)
                                                                        <span class="trans-preview">{{ \Illuminate\Support\Str::limit($trans->text, 50) }}</span>
                                                                        <span class="trans-badge {{ $trans->is_approved ? 'approved' : ($trans->is_ai_generated ? 'ai-pending' : 'manual') }}">{{ $trans->is_approved ? x_('Approved', 'translations') : ($trans->is_ai_generated ? x_('AI', 'translations') : x_('Manual', 'translations')) }}</span>
                                                                    @else
                                                                        <span class="trans-badge missing">{{ x_('Missing', 'translations') }}</span>
                                                                    @endif
                                                                </td>
                                                                @endforeach
                                                                <td>
                                                                    <a href="{{ route('translations.edit', $key->id) }}" class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover btn-sm" title="{{ x_('Edit', 'translations') }}">
                                                                        <span class="icon"><span class="feather-icon"><i data-feather="edit-2"></i></span></span>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                            @empty
                                                            <tr><td colspan="{{ 4 + count($locales) }}" class="text-center text-muted py-5">
                                                                <span class="feather-icon d-block mb-2"><i data-feather="inbox" style="width:32px;height:32px;"></i></span>
                                                                {{ x_('No translation keys found.', 'translations') }}
                                                            </td></tr>
                                                            @endforelse
                                                        </tbody>
                                                    </table>
                                                </div>
                                                @if($keys->hasPages())
                                                <div class="px-3 py-3 border-top">{{ $keys->links() }}</div>
                                                @endif
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>

                        {{-- Inline edit modal --}}
                        <div class="modal fade" id="inlineEditModal" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">{{ x_('Edit Translation', 'translations') }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label class="form-label fw-bold">{{ x_('English Text', 'translations') }}</label>
                                            <div id="inlineEnglishText" class="p-2 bg-light rounded" style="font-size:0.9rem;"></div>
                                        </div>
                                        <div id="inlineLocaleFields"></div>
                                    </div>
                                    <div class="modal-footer">
                                        <small class="text-muted me-auto">Ctrl+Enter</small>
                                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">{{ x_('Cancel', 'translations') }}</button>
                                        <button type="button" class="btn btn-primary btn-sm" id="inlineSaveBtn">{{ x_('Save', 'translations') }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Translate All modal --}}
                        <div class="modal fade" id="translateAllModal" tabindex="-1" data-bs-backdrop="static">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">{{ x_('Translate All with AI', 'translations') }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div id="taSetup">
                                            <div class="mb-3">
                                                <label class="form-label">{{ x_('Target Locale', 'translations') }}</label>
                                                <select id="taLocale" class="form-select">
                                                    @foreach($locales as $code => $name)
                                                    <option value="{{ $code }}">{{ $name }} ({{ $code }})</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <button class="btn btn-primary w-100" id="taStartBtn">{{ x_('Start Translation', 'translations') }}</button>
                                        </div>
                                        <div id="taProgress" style="display:none;">
                                            <div class="text-center mb-3">
                                                <h4 id="taPercentText">0%</h4>
                                                <div class="progress mb-2" style="height:8px;">
                                                    <div class="progress-bar" id="taProgressBar" style="width:0%"></div>
                                                </div>
                                                <small class="text-muted">
                                                    <span id="taProcessed">0</span> / <span id="taTotal">0</span> {{ x_('processed', 'translations') }} |
                                                    <span class="text-success" id="taSucceeded">0</span> {{ x_('succeeded', 'translations') }} |
                                                    <span class="text-danger" id="taFailed">0</span> {{ x_('failed', 'translations') }}
                                                </small>
                                            </div>
                                            <button class="btn btn-outline-danger w-100" id="taCancelBtn">{{ x_('Cancel', 'translations') }}</button>
                                        </div>
                                        <div id="taDone" style="display:none;">
                                            <div class="text-center">
                                                <span class="feather-icon text-success"><i data-feather="check-circle" style="width:48px;height:48px;"></i></span>
                                                <h5 class="mt-2">{{ x_('Translation Complete', 'translations') }}</h5>
                                                <p class="text-muted" id="taDoneStats"></p>
                                                <button class="btn btn-primary" onclick="location.reload()">{{ x_('Reload Page', 'translations') }}</button>
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

    {{-- Floating bulk toolbar --}}
    <div class="floating-toolbar bg-dark text-white rounded-pill px-4 py-2 shadow-lg align-items-center gap-3" id="bulkToolbar">
        <span><strong id="selectedCount">0</strong> {{ x_('selected', 'translations') }}</span>
        <form action="{{ route('translations.bulk-approve') }}" method="POST" id="bulkApproveForm">
            @csrf
            <input type="hidden" name="ids" id="bulkIds">
            <button type="submit" class="btn btn-sm btn-success rounded-pill">{{ x_('Approve Selected', 'translations') }}</button>
        </form>
    </div>

    @include('admin.main.scripts')
    <script>
        // Bulk select
        const selectAll = document.getElementById('selectAll');
        const bulkToolbar = document.getElementById('bulkToolbar');
        const selectedCount = document.getElementById('selectedCount');
        const bulkIds = document.getElementById('bulkIds');

        selectAll?.addEventListener('change', function() {
            document.querySelectorAll('.row-check').forEach(cb => cb.checked = this.checked);
            updateBulkToolbar();
        });
        document.querySelectorAll('.row-check').forEach(cb => cb.addEventListener('change', updateBulkToolbar));

        function updateBulkToolbar() {
            const checked = document.querySelectorAll('.row-check:checked');
            const count = checked.length;
            selectedCount.textContent = count;
            bulkIds.value = Array.from(checked).map(c => c.value).join(',');
            bulkToolbar.classList.toggle('show', count > 0);
        }

        // Inline edit
        let currentInlineKeyId = null;
        const locales = @json($locales);

        function openInlineEdit(cell) {
            currentInlineKeyId = cell.dataset.keyId;
            const param = cell.dataset.param;
            document.getElementById('inlineEnglishText').textContent = param;

            const fieldsContainer = document.getElementById('inlineLocaleFields');
            fieldsContainer.innerHTML = '';

            const row = cell.closest('tr');
            for (const [code, name] of Object.entries(locales)) {
                const td = row.querySelector(`[data-locale="${code}"]`);
                const existingText = td?.querySelector('.trans-preview')?.textContent?.trim() || '';
                const div = document.createElement('div');
                div.className = 'mb-3';
                div.innerHTML = `<label class="form-label">${name} (${code})</label>
                    <textarea class="form-control inline-locale-text" data-locale="${code}" rows="2">${existingText === '—' ? '' : existingText}</textarea>`;
                fieldsContainer.appendChild(div);
            }

            new bootstrap.Modal(document.getElementById('inlineEditModal')).show();
        }

        document.getElementById('inlineSaveBtn')?.addEventListener('click', saveInlineEdit);
        document.getElementById('inlineEditModal')?.addEventListener('keydown', function(e) {
            if (e.ctrlKey && e.key === 'Enter') saveInlineEdit();
        });

        function saveInlineEdit() {
            const btn = document.getElementById('inlineSaveBtn');
            btn.disabled = true;
            btn.textContent = '{{ x_("Saving...", "translations") }}';

            const translations = [];
            document.querySelectorAll('.inline-locale-text').forEach(ta => {
                if (ta.value.trim()) {
                    translations.push({ locale: ta.dataset.locale, text: ta.value.trim() });
                }
            });
            if (!translations.length) { btn.disabled = false; btn.textContent = '{{ x_("Save", "translations") }}'; return; }

            fetch(`/admin/translations/${currentInlineKeyId}/inline-update`, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                body: JSON.stringify({ translations })
            }).then(r => r.json()).then(data => {
                if (data.success) {
                    bootstrap.Modal.getInstance(document.getElementById('inlineEditModal'))?.hide();
                    location.reload();
                }
            }).catch(() => {
                btn.disabled = false;
                btn.textContent = '{{ x_("Save", "translations") }}';
            });
        }

        // Translate All
        document.getElementById('taStartBtn')?.addEventListener('click', function() {
            const locale = document.getElementById('taLocale').value;
            document.getElementById('taSetup').style.display = 'none';
            document.getElementById('taProgress').style.display = 'block';

            fetch('{{ route("translations.translate-all-start") }}', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                body: JSON.stringify({ locale })
            }).then(r => r.json()).then(data => {
                if (data.error) { alert(data.error); return; }
                document.getElementById('taTotal').textContent = data.total;
                pollTranslateAll();
            });
        });

        document.getElementById('taCancelBtn')?.addEventListener('click', function() {
            fetch('{{ route("translations.translate-all-cancel") }}', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
            }).then(() => {
                document.getElementById('taProgress').style.display = 'none';
                document.getElementById('taDone').style.display = 'block';
                document.getElementById('taDoneStats').textContent = '{{ x_("Translation cancelled. Partial results saved.", "translations") }}';
            });
        });

        function pollTranslateAll() {
            fetch('{{ route("translations.translate-all-next") }}', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
            }).then(r => r.json()).then(data => {
                if (data.done) {
                    document.getElementById('taProgress').style.display = 'none';
                    document.getElementById('taDone').style.display = 'block';
                    document.getElementById('taDoneStats').textContent = `${data.succeeded || 0} succeeded, ${data.failed || 0} failed`;
                    return;
                }
                const pct = data.total > 0 ? Math.round((data.processed / data.total) * 100) : 0;
                document.getElementById('taPercentText').textContent = pct + '%';
                document.getElementById('taProgressBar').style.width = pct + '%';
                document.getElementById('taProcessed').textContent = data.processed;
                document.getElementById('taSucceeded').textContent = data.succeeded;
                document.getElementById('taFailed').textContent = data.failed;
                setTimeout(pollTranslateAll, 500);
            });
        }
    </script>
</body>
</html>
