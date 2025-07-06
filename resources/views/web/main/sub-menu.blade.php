<div class="sub-menu">
    <div class="menu-header">
        <a class="navbar-brand" href="/">
            <img class="brand-img img-fluid" src="{{ URL::asset('crmlogo.png') }}" alt="brand">
        </a>
    </div>
    <div data-simplebar class="nicescroll-bar">
        <ul id="submenu_1" class="nav subnav-list flex-column d-flex">
            <li class="nav-item">
                <div class="menu-content-wrap"  style="height: 100vh;">
                    <div class="menu-group">
                        <div class="nav-header header-wth-search">
                            <div class="mb-5 d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-icon avatar-xxs avatar-soft-pink me-2">
                                        <span class="initial-wrap">
                                            <i class="bi bi-person-badge fs-6"></i>
                                        </span>
                                    </div>
                                    <span class="fs-6 text-dark fw-medium">Users Management</span>
                                </div>
                            </div>

                            <ul class="nav nav-light navbar-nav flex-column">
                                <li class="nav-item {{ request()->url() == route('roles.index') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('roles.index') }}">
                                        <i class="ri-list-check-2 fs-5" style="margin-right: 15px;"></i>
                                        <span class="nav-link-text">Roles</span>
                                    </a>
                                </li>
                                <li class="nav-item {{ request()->url() == route('users.index') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('users.index') }}">
                                        <i class="ri-team-line fs-5" style="margin-right: 15px;"></i>
                                        <span class="nav-link-text">Users</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
        <ul id="submenu_2" class="nav subnav-list flex-column d-flex">
            <li class="nav-item">
                <div class="menu-content-wrap"  style="height: 100vh;">
                    <div class="menu-group">
                        <div class="nav-header header-wth-search">
                            <div class="mb-5 d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-icon avatar-xxs avatar-soft-pink me-2">
                                        <span class="initial-wrap">
                                            <span class="feather-icon"><i data-feather="briefcase"></i></span>
                                        </span>
                                    </div>
                                    <span class="fs-6 text-dark fw-medium">CRM</span>
                                </div>
                            </div>
                            <ul class="nav nav-light navbar-nav flex-column">
                                <li class="nav-item {{ request()->url() == route('admin.home') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('admin.home') }}">
                                        <i class="ri-dashboard-line fs-5" style="margin-right: 15px;"></i>
                                        <span class="nav-link-text">Dashboard</span>
                                    </a>
                                </li>
                                <li class="nav-item {{ request()->url() == route('leads.index') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('leads.index') }}">
                                        <i class="ri-archive-drawer-line fs-5" style="margin-right: 15px;"></i>
                                        <span class="nav-link-text">Leads</span>
                                    </a>
                                </li>
                                <li class="nav-item {{ request()->url() == route('companies.index') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('companies.index') }}">
                                        <i class="ri-building-line fs-5" style="margin-right: 15px;"></i>
                                        <span class="nav-link-text">Companies</span>
                                    </a>
                                </li>
                                <li class="nav-item {{ request()->url() == route('contacts.index') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('contacts.index') }}">
                                        <i class="ri-contacts-book-line fs-5" style="margin-right: 15px;"></i>
                                        <span class="nav-link-text">Contacts</span>
                                    </a>
                                </li>
                                <li class="nav-item {{ request()->url() == route('deals.index') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('deals.index') }}">
                                        <i class="ri-award-line fs-5" style="margin-right: 15px;"></i>

                                        <span class="nav-link-text">Deals</span>
                                    </a>
                                </li>
                                <li class="nav-item {{ request()->url() == route('pipelines.index') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('pipelines.index') }}">
                                        <i class="ri-filter-2-line fs-5" style="margin-right: 15px;"></i>

                                        <span class="nav-link-text">Pipelines</span>
                                    </a>
                                </li>
                                <li class="nav-item {{ request()->url() == route('industries.index') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('industries.index') }}">
                                        <i class="ri-building-2-line fs-5" style="margin-right: 15px;"></i>
                                        <span class="nav-link-text">Industries</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
        <ul id="submenu_3" class="nav subnav-list flex-column d-flex">
            <li class="nav-item">
                <div class="menu-content-wrap"  style="height: 100vh;">
                    <div class="menu-group">
                        <div class="nav-header header-wth-search">
                            <div class="mb-5 d-flex justify-content-between align-items-center">
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
                                <li class="nav-item {{ request()->url() == route('ats.home') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('ats.home') }}">
                                        <i class="ri-dashboard-line fs-5" style="margin-right: 15px;"></i>
                                        <span class="nav-link-text">ATS Dashboard</span>
                                    </a>
                                </li>
                                <li class="nav-item {{ request()->url() == route('ats.clients.index') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('ats.clients.index') }}">
                                        <i class="bi bi-building fs-5" style="margin-right: 15px;"></i>
                                        <span class="nav-link-text">Clients</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="">
                                        <i class="ri-file-user-line fs-5" style="margin-right: 15px;"></i>
                                        <span class="nav-link-text">Clients' Hiring Managers</span>
                                    </a>
                                </li>
                                <li class="nav-item {{ request()->url() == route('jobs.index') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('jobs.index') }}">
                                        <i class="bi bi-briefcase fs-5" style="margin-right: 15px;"></i>
                                        <span class="nav-link-text"> Jobs</span>
                                    </a>
                                </li>
                                <li class="nav-item {{ request()->url() == route('candidates.index') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('candidates.index') }}">
                                        <i class="bi bi-person-badge fs-5" style="margin-right: 15px;"></i>

                                        <span class="nav-link-text">Candidates</span>
                                    </a>
                                </li>
                                <li class="nav-item {{  request()->url() == route('interviews.index') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('interviews.index') }}">
                                        <i class="bi bi-calendar2-range fs-5" style="margin-right: 15px;"></i>
                                        <span class="nav-link-text">Interviews</span>
                                    </a>
                                </li>
                                <li class="nav-item {{  request()->url() == route('job.offers.index') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('job.offers.index') }}">
                                        <i class="ri-bookmark-3-line fs-5" style="margin-right: 15px;"></i>
                                        <span class="nav-link-text">Job Offers</span>
                                    </a>
                                </li>
                                <li class="nav-item {{ request()->url() == route('ATS.pipelines.index') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('ATS.pipelines.index') }}">
                                        <i class="ri-filter-2-line fs-5" style="margin-right: 15px;"></i>

                                        <span class="nav-link-text">Hirings Pipelines</span>
                                    </a>
                                </li>
                                <hr style="border: 1px solid #3e3e3e;">
                                <div class="mt-2 mb-3 d-flex align-items-center justify-content-between">
									<div class="mb-0 title-sm text-primary">ATS Settings </div>
								</div>
                                <li class="nav-item {{ request()->url() == route('ATS.pipelines.index') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('ATS.pipelines.index') }}">
                                        <i class="ri-filter-2-line fs-5" style="margin-right: 15px;"></i>

                                        <span class="nav-link-text">ATS Pipelines</span>
                                    </a>
                                </li>
                                <li class="nav-item {{ request()->url() == route('tags.index') ? 'active' : ''}}">
                                    <a class="nav-link" href="{{ route('tags.index') }}">
                                        <i class="bi bi-tag fs-5" style="margin-right: 15px;"></i>
                                        <span class="nav-link-text">Tags</span>
                                    </a>
                                </li>
                                {{-- <li class="nav-item {{ request()->url() == route('users.index') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('users.index') }}">
                                        <i class="ri-team-line fs-5" style="margin-right: 15px;"></i>
                                        <span class="nav-link-text">Users</span>
                                    </a>
                                </li> --}}
                            </ul>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>
