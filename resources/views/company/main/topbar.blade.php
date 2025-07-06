
@switch( request()->url() )
    @case(route('leads.index'))
        @include('admin.sections.leads.topbar')
        @break
    @case(route('deals.index'))
        @include('admin.sections.deals.topbar')
        @break

    @case(route('roles.index'))
        @include('admin.sections.roles.topbar')
        @break
    @default
        <header class="hk-pg-header pg-header-wth-tab">
            <div class="px-5">
                <div class="d-flex align-items-center">
                    <button class="btn btn-icon btn-rounded btn-flush-dark flush-soft-hover navbar-toggle me-2 d-xl-none"><span class="icon"><span class="feather-icon"><i data-feather="align-left"></i></span></span></button>
                    <div class="avatar avatar-icon avatar-sm  avatar-violet me-3">
                        <span class="initial-wrap rounded-8"><span class="feather-icon"><i data-feather="bar-chart-2"></i></span></span>
                    </div>
                    <div class="d-flex flex-wrap justify-content-between flex-1">
                        <div>
                            <div class="pg-subtitle">
                                Analytics
                            </div>
                        </div>
                        <div class="pg-header-action-wrap position-relative">
                            <form action="/" method="GET" id="dateFilterForm">
                                <div class="input-group w-300p d-md-flex d-none">
                                    <span class="input-affix-wrapper">
                                        <span class="input-prefix"><span class="feather-icon"><i data-feather="calendar"></i></span></span>
                                        <input class="form-control form-wth-icon" name="datetimes" >
                                        <input type="hidden" name="start_date" id="start_date">
                                        <input type="hidden" name="end_date" id="end_date">
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <ul class="nav nav-tabs nav-icon nav-icon nav-light mt-3">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#tab_1">
                            <span class="nav-icon-wrap"><span class="svg-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chart-bar" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <rect x="3" y="12" width="6" height="8" rx="1"></rect>
                                    <rect x="9" y="8" width="6" height="12" rx="1"></rect>
                                    <rect x="15" y="4" width="6" height="16" rx="1"></rect>
                                    <line x1="4" y1="20" x2="18" y2="20"></line>
                                </svg>
                            </span></span>
                            <span class="nav-link-text">Overview</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#">
                            <span class="nav-icon-wrap"><span class="svg-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chart-bubble" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <circle cx="6" cy="16" r="3"></circle>
                                    <circle cx="16" cy="19" r="2"></circle>
                                    <circle cx="14.5" cy="7.5" r="4.5"></circle>
                                </svg>
                            </span></span>
                            <span class="nav-link-text">Analytics</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#">
                            <span class="nav-icon-wrap"><span class="svg-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-affiliate" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M5.931 6.936l1.275 4.249m5.607 5.609l4.251 1.275"></path>
                                    <path d="M11.683 12.317l5.759 -5.759"></path>
                                    <circle cx="5.5" cy="5.5" r="1.5"></circle>
                                    <circle cx="18.5" cy="5.5" r="1.5"></circle>
                                    <circle cx="18.5" cy="18.5" r="1.5"></circle>
                                    <circle cx="8.5" cy="15.5" r="4.5"></circle>
                                </svg>
                            </span></span>
                            <span class="nav-link-text">Operations</span>
                        </a>
                    </li>
                </ul>
            </div>
        </header>
@endswitch

