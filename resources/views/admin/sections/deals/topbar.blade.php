<header class="hk-pg-header pg-header-wth-tab">
    <div>
        <div class="d-flex align-items-center">
            <div class="avatar avatar-sm avatar-success d-sm-inline-block d-none me-3">
                <span class="initial-wrap rounded-8">D</span>
            </div>
            <div class="d-flex flex-wrap justify-content-between flex-1">
                <div class="d-flex align-items-center">
                    <h5 class="pg-title fs-5 mb-0 d-flex align-items-center">Deals<span class="d-flex task-star marked ms-2"><span class="feather-icon"></span></span>
                    </h5>
                    <div class="ms-3 d-xl-flex d-none">
                        <div class="input-group">
                            <span class="input-affix-wrapper">
                                <select id="pipeline_select" class="form-select" onchange="redirectToPipeline()">
                                    <option selected disabled value="{{ $pipeline->id }}"> {{ $pipeline->name }}</option>
                                    @foreach ($pipelines as $pipeline)
                                        <option value="{{ $pipeline->id }}">{{ $pipeline->name }}</option>
                                    @endforeach
                                </select>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="pg-header-action-wrap position-relative">
                    <span style="padding: 0 8px 0 0;">New Deal</span>
                    <div class="d-flex ms-auto align-items-center">
                        <div class="avatar-group avatar-group-overlapped d-xl-flex d-none me-3">
                            <div class="avatar avatar-icon  avatar-rounded cursor-pointer"  data-bs-placement="top" title="" data-bs-original-title="Add new deal" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAdd">
                                <span class="initial-wrap bg-white text-primary shadow-xl fs-5" style="cursor: pointer;">
                                    <span class="svg-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <line x1="12" y1="5" x2="12" y2="19"></line>
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                        </svg>
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                    <span class="nav-link-text">Deals Board view</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab_block_2">
                    <span class="nav-icon-wrap"><span class="svg-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-list-details" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M13 5h8"></path>
                            <path d="M13 9h5"></path>
                            <path d="M13 15h8"></path>
                            <path d="M13 19h5"></path>
                            <rect x="3" y="4" width="6" height="6" rx="1"></rect>
                            <rect x="3" y="14" width="6" height="6" rx="1"></rect>
                        </svg>
                    </span></span>
                    <span class="nav-link-text">Deals Table view</span>
                </a>
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tab_block_4">
                    <span class="nav-icon-wrap">
                        <span class="svg-icon">
                            <i class="zmdi zmdi-edit zmdi-hc-fw"></i>
                    </span>
                </span>
                    <span class="nav-link-text">Edit pipeline</span>
                </a>
            </li> --}}
        </ul>
    </div>
</header>

