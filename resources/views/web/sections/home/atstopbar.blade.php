

<header class="hk-pg-header pg-header-wth-tab">
    <div>
        <div class="d-flex align-items-center">
            <button class="btn btn-icon btn-rounded btn-flush-dark flush-soft-hover navbar-toggle me-2 d-xl-none"><span class="icon"><span class="feather-icon"><i data-feather="align-left"></i></span></span></button>
            <div class="avatar avatar-sm avatar-success d-sm-inline-block me-3">
                <span class="initial-wrap rounded-8">D</span>
            </div>
            <form action="/" method="GET" id="dateFilterForm">
                <div class="d-flex flex-wrap justify-content-between flex-1">
                    <div class="d-flex align-items-center">
                        <h5 class="pg-title fs-5 mb-0 d-flex align-items-center">Dashboard<span class="d-flex task-star marked ms-2"><span class="feather-icon"></span></span></h5>

                        <div class="ms-3 d-xl-flex d-none">
                            <div class="input-group w-300p d-md-flex d-none">
                                <span class="input-affix-wrapper">
                                    <span class="input-prefix"><span class="feather-icon"><i data-feather="calendar"></i></span></span>
                                    <input class="form-control form-wth-icon" name="datetimes" >
                                    <input type="hidden" name="start_date" id="start_date" value="{{ $startDate }}">
                                    <input type="hidden" name="end_date" id="end_date" value="{{ $endDate }}">
                                </span>
                            </div>
                        </div>
                        <div class="ms-3 d-xl-flex d-none">
                            <input type="submit" name="submit" class="btn btn-danger" value="search">
                        </div>
                    </div>

                </div>
            </form>

        </div>
        <ul class="nav nav-tabs nav-icon nav-icon nav-light mt-3">
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab" href="#tab_block_1">
                    <span class="nav-icon-wrap"><span class="svg-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-layout-columns" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <rect x="4" y="4" width="16" height="16" rx="2"></rect>
                            <line x1="12" y1="4" x2="12" y2="20"></line>
                        </svg>
                    </span></span>
                    <span class="nav-link-text">Overview</span>
                </a>
            </li>
        </ul>
    </div>
</header>

