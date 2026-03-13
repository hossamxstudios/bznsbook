<!doctype html>
@include('admin.main.html')
<head>
    <meta charset="utf-8" />
    <title>BZNSBOOK - {{ x_('Edit Translation', 'translations') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('admin.main.meta')
    <style>
        .locale-card .status-header { padding: 4px 12px; font-size: 0.75rem; font-weight: 600; border-radius: 4px; }
        .locale-card .status-missing { background: #f8d7da; color: #842029; }
        .locale-card .status-ai { background: #fff3cd; color: #664d03; }
        .locale-card .status-approved { background: #d1e7dd; color: #0f5132; }
        .locale-card .status-manual { background: #cfe2ff; color: #084298; }
        .avatar.avatar-info > .initial-wrap { background-color: #3e3e3e !important; color: #fff; }
        .form-label { color: #33475b; font-weight: 500; }
        .form-control { border-radius: 3px; transition: all 0.15s ease-out; }
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
                                                <div class="pg-subtitle">
                                                    <a href="{{ route('translations.index') }}" class="text-muted">{{ x_('Translations', 'translations') }}</a> / {{ x_('Edit Key', 'translations') }} #{{ $key->id }}
                                                </div>
                                                <h5 class="pg-title fs-5">{{ x_('Edit Translation', 'translations') }}</h5>
                                            </div>
                                            <div class="pg-header-action-wrap position-relative">
                                                <div class="d-md-flex d-none ms-auto align-items-center gap-2">
                                                    @if($prev)
                                                    <a href="{{ route('translations.edit', $prev->id) }}" class="btn btn-custom btn-white text-primary btn-floating rounded-8">
                                                        <span><span class="icon shadow-xl bg-white rounded-8"><span class="feather-icon"><i data-feather="arrow-left"></i></span></span><span class="fs-7">{{ x_('Prev', 'translations') }}</span></span>
                                                    </a>
                                                    @endif
                                                    @if($next)
                                                    <a href="{{ route('translations.edit', $next->id) }}" class="btn btn-custom btn-white text-primary btn-floating rounded-8">
                                                        <span><span class="icon shadow-xl bg-white rounded-8"><span class="feather-icon"><i data-feather="arrow-right"></i></span></span><span class="fs-7">{{ x_('Next', 'translations') }}</span></span>
                                                    </a>
                                                    @endif
                                                    <a href="{{ route('translations.index') }}" class="btn btn-custom btn-white text-primary btn-floating rounded-8">
                                                        <span><span class="icon shadow-xl bg-white rounded-8"><span class="feather-icon"><i data-feather="list"></i></span></span><span class="fs-7">{{ x_('Back to List', 'translations') }}</span></span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </header>

                            {{-- Main Content Area --}}
                            <div class="overflow-hidden flex-1 d-flex">
                                <div data-simplebar class="nicescroll-bar" id="tab_1">
                                    <div class="px-5 pt-5 container-fluid">

                                        {{-- Flash messages --}}
                                        @if(session('success'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            {{ session('success') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                        </div>
                                        @endif

                                        <form action="{{ route('translations.update', $key->id) }}" method="POST" id="editForm">
                                            @csrf
                                            @method('PUT')

                                            {{-- Source key info --}}
                                            <div class="row mb-4">
                                                <div class="col-md-12">
                                                    <div class="card rounded-8 mb-0">
                                                        <div class="card-header card-header-action">
                                                            <h6>{{ x_('Source Key', 'translations') }}</h6>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-md-8">
                                                                    <label class="form-label fw-bold">{{ x_('English Text (param)', 'translations') }}</label>
                                                                    <div class="p-3 bg-light rounded mb-3 fs-5">{{ $key->param }}</div>

                                                                    <label class="form-label fw-bold">{{ x_('Default Text (editable English wording)', 'translations') }}</label>
                                                                    <input type="text" name="default_text" class="form-control" value="{{ $key->default_text }}">
                                                                    <small class="text-muted">{{ x_('Edit this to refine the English wording without changing the code-level key.', 'translations') }}</small>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    @if($key->place)
                                                                    <div class="mb-3">
                                                                        <label class="form-label fw-bold">{{ x_('Place / Group', 'translations') }}</label>
                                                                        <div><span class="badge bg-soft-primary fs-6">{{ $key->place }}</span></div>
                                                                    </div>
                                                                    @endif
                                                                    <div class="mb-3">
                                                                        <label class="form-label fw-bold">{{ x_('Created', 'translations') }}</label>
                                                                        <div class="text-muted">{{ $key->created_at?->format('M d, Y H:i') ?? x_('N/A', 'admin') }}</div>
                                                                    </div>
                                                                    <div>
                                                                        <label class="form-label fw-bold">{{ x_('Key ID', 'translations') }}</label>
                                                                        <div class="text-muted">#{{ $key->id }}</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- Per-locale translation cards --}}
                                            @foreach($locales as $code => $name)
                                            @php
                                                $trans = $key->translations->where('locale', $code)->first();
                                                $statusClass = !$trans ? 'missing' : ($trans->is_approved ? 'approved' : ($trans->is_ai_generated ? 'ai' : 'manual'));
                                                $statusLabel = !$trans ? 'Missing' : ($trans->is_approved ? 'Approved' : ($trans->is_ai_generated ? 'AI Generated' : 'Manual'));
                                            @endphp
                                            <div class="row mb-3">
                                                <div class="col-md-12">
                                                    <div class="card rounded-8 mb-0 locale-card">
                                                        <div class="card-header card-header-action d-flex align-items-center justify-content-between">
                                                            <div class="d-flex align-items-center gap-2">
                                                                <h6 class="mb-0">{{ $name }} <small class="text-muted">({{ $code }})</small></h6>
                                                                <span class="status-header status-{{ $statusClass }}">{{ x_($statusLabel, 'translations') }}</span>
                                                            </div>
                                                            <form action="{{ route('translations.retranslate', [$key->id, $code]) }}" method="POST" class="d-inline">
                                                                @csrf
                                                                <button type="submit" class="btn btn-sm btn-outline-warning" onclick="return confirm('{{ x_('Re-translate this with AI?', 'translations') }}')">
                                                                    <span class="feather-icon"><i data-feather="globe"></i></span> {{ x_('AI Retranslate', 'translations') }}
                                                                </button>
                                                            </form>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label class="form-label text-muted">{{ x_('English Reference', 'translations') }}</label>
                                                                    <div class="p-2 bg-light rounded" style="min-height:80px;">{{ $key->default_text }}</div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label class="form-label fw-bold">{{ $name }} {{ x_('Translation', 'translations') }}</label>
                                                                    <textarea name="translations[{{ $code }}]" class="form-control" rows="3" dir="{{ str_starts_with($code, 'ar') ? 'rtl' : 'ltr' }}">{{ $trans->text ?? '' }}</textarea>
                                                                </div>
                                                            </div>
                                                            @if($trans)
                                                            <div class="mt-2">
                                                                <small class="text-muted">
                                                                    @if($trans->is_ai_generated) <span class="feather-icon"><i data-feather="cpu" style="width:12px;height:12px;"></i></span> {{ x_('AI translated', 'translations') }} {{ $trans->created_at?->diffForHumans() }} @endif
                                                                    @if($trans->is_approved && $trans->approver) | <span class="feather-icon"><i data-feather="check" style="width:12px;height:12px;"></i></span> {{ x_('Approved by', 'translations') }} {{ $trans->approver->name }} {{ $trans->approved_at?->diffForHumans() }} @endif
                                                                    | {{ x_('Last updated', 'translations') }} {{ $trans->updated_at?->diffForHumans() }}
                                                                </small>
                                                            </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach

                                            {{-- Save bar --}}
                                            <div class="row mb-5">
                                                <div class="col-md-12">
                                                    <div class="card rounded-8 mb-0">
                                                        <div class="card-body d-flex align-items-center justify-content-between">
                                                            <a href="{{ route('translations.index') }}" class="btn btn-outline-secondary">
                                                                <span class="feather-icon"><i data-feather="arrow-left"></i></span> {{ x_('Back to List', 'translations') }}
                                                            </a>
                                                            <div class="d-flex align-items-center gap-3">
                                                                <small class="text-muted">{{ x_('Ctrl+S to save', 'translations') }}</small>
                                                                <button type="submit" class="btn btn-primary">
                                                                    <span class="feather-icon"><i data-feather="save"></i></span> {{ x_('Save All Translations', 'translations') }}
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>

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
        document.addEventListener('keydown', function(e) {
            if (e.ctrlKey && e.key === 's') {
                e.preventDefault();
                document.getElementById('editForm').submit();
            }
        });
    </script>
</body>
</html>
