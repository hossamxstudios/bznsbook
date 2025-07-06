<div class="sub-menu">
    <div class="menu-header">
        <a class="navbar-brand" href="/">
            <img class="brand-img img-fluid" src="{{ URL::asset('crmlogo.png') }}" alt="brand">
        </a>
    </div>
    <div data-simplebar class="nicescroll-bar">
        <ul id="submenu_3" class="nav subnav-list flex-column d-flex">
            <li class="nav-item">
                <div class="menu-content-wrap"  style="height: 100vh;">
                    <div class="menu-group">
                        <div class="nav-header header-wth-search">
                            <div class="d-flex justify-content-between align-items-center mb-5">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-icon avatar-xxs avatar-soft-pink me-2">
                                        <span class="initial-wrap">
                                            <i class="bi bi-briefcase fs-6"></i>
                                        </span>
                                    </div>
                                    <span class="fs-6 text-dark fw-medium">ATS Management</span>
                                </div>
                            </div>
                            <ul class="nav nav-light navbar-nav flex-column">


                                <li class="nav-item {{ request()->url() == route('candidates.index') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('company.candidates.index') }}">
                                        <i class="  bi bi-person-badge fs-5" style="margin-right: 15px;"></i>

                                        <span class="nav-link-text">Candidates</span>
                                    </a>
                                </li>
                                <li class="nav-item {{ request()->url() == route('jobs.index') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('company.jobs.index') }}">
                                        <i class="  bi bi-briefcase fs-5" style="margin-right: 15px;"></i>
                                        <span class="nav-link-text">All Jobs</span>
                                    </a>
                                </li>
                                <li class="nav-item {{  request()->url() == route('interviews.index') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('company.interviews.index') }}">
                                        <i class=" bi bi-calendar2-range fs-5" style="margin-right: 15px;"></i>
                                        <span class="nav-link-text">Interviews</span>
                                    </a>
                                </li>


                            </ul>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>
