<header class="hk-pg-header pg-header-wth-tab">
    <div>
        <div class="d-flex align-items-center">
            <button class="btn btn-icon btn-rounded btn-flush-dark flush-soft-hover navbar-toggle me-2 d-xl-none"><span class="icon"><span class="feather-icon"><i data-feather="align-left"></i></span></span></button>
            <div class="avatar avatar-sm avatar-icon avatar-info me-3">
                <span class="initial-wrap rounded-8"><span class="svg-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-briefcase" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M3 7m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v9a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z"></path>
                        <path d="M8 7v-2a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v2"></path>
                        <path d="M12 12l0 .01"></path>
                        <path d="M3 13a20 20 0 0 0 18 0"></path>
                    </svg>
                </span></span>
            </div>
            <div>
                <h4 class="mb-0">Projects</h4>
                <nav aria-label="breadcrumb">
                    <ol class="mb-0 breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Projects</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <ul class="mt-3 nav nav-tabs nav-icon nav-light">
        <li class="nav-item">
            <a class="nav-link active" data-bs-toggle="tab" href="#tab_active">
                <span class="nav-icon-wrap"><span class="svg-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-check-circle" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                        <path d="M9 12l2 2l4 -4"></path>
                    </svg>
                </span></span>
                <span class="nav-link-text">Active Projects</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#tab_completed">
                <span class="nav-icon-wrap"><span class="svg-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-clock-check" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M20.942 13.021a9 9 0 1 0 -9.407 7.967"></path>
                        <path d="M12 7v5l3 3"></path>
                        <path d="M15 19l2 2l4 -4"></path>
                    </svg>
                </span></span>
                <span class="nav-link-text">Completed Projects</span>
            </a>
        </li>
    </ul>
</header>
