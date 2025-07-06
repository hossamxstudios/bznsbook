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
                                <li class="nav-item {{ request()->url() == route('leads.index') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('leads.index') }}">
                                        <i class="ri-archive-drawer-line fs-5" style="margin-right: 15px;"></i>
                                        <span class="nav-link-text">Leads</span>
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
                                    <span class="fs-6 text-dark fw-medium">Web Site Management</span>
                                </div>
                            </div>
                            <ul class="nav nav-light navbar-nav flex-column">
                                <li class="nav-item {{ request()->url() == route('sections.index') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('sections.index') }}">
                                        <i class="ri-folder-shield-line fs-5" style="margin-right: 15px;"></i>
                                        <span class="nav-link-text">Sections</span>
                                    </a>
                                </li>
                                <li class="nav-item {{ request()->url() == route('categories.index') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('categories.index') }}">
                                        <i class="ri-pie-chart-box-line fs-5" style="margin-right: 15px;"></i>
                                        <span class="nav-link-text">Categories</span>
                                    </a>
                                </li>
                                <li class="nav-item {{ request()->url() == route('subcategories.index') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('subcategories.index') }}">
                                        <i class="ri-pie-chart-box-fill fs-5" style="margin-right: 15px;"></i>
                                        <span class="nav-link-text">Subcategories</span>
                                    </a>
                                </li>
                                <li class="nav-item {{ request()->url() == route('topics.index') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('topics.index') }}">
                                        <i class="ri-chat-new-fill fs-5" style="margin-right: 15px;"></i>
                                        <span class="nav-link-text">Topics</span>
                                    </a>
                                </li>
                                <li class="nav-item {{ request()->url() == route('blogs.index') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('blogs.index') }}">
                                        <i class="ri-article-line fs-5" style="margin-right: 15px;"></i>
                                        <span class="nav-link-text">Blogs</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
        <ul id="submenu_4" class="nav subnav-list flex-column d-flex">
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
                                    <span class="fs-6 text-dark fw-medium">Client Management</span>
                                </div>
                            </div>
                            <ul class="nav nav-light navbar-nav flex-column">
                                <li class="nav-item {{ request()->url() == route('clients.index') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('clients.index') }}">
                                        <i class="ri-user-3-line fs-5" style="margin-right: 15px;"></i>
                                        <span class="nav-link-text">Clients</span>
                                    </a>
                                </li>
                                <li class="nav-item {{ request()->routeIs('admin.subscriptions.*') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('admin.subscriptions.index') }}">
                                        <i class="ri-vip-crown-line fs-5" style="margin-right: 15px;"></i>
                                        <span class="nav-link-text">Subscriptions</span>
                                    </a>
                                </li>
                                <li class="nav-item {{ request()->routeIs('admin.projects.*') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('admin.projects.index') }}">
                                        <i class="ri-briefcase-4-line fs-5" style="margin-right: 15px;"></i>
                                        <span class="nav-link-text">Projects</span>
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
