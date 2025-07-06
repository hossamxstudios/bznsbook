<div class="hk-menu">
    <div class="main-menu">
        <div class="menu-header">
            <a class="navbar-brand" href="/">
                <img class="brand-img" style="width: 52px" src="{{ URL::asset('icon.png') }}" alt="brand">
            </a>
        </div>
        @php
            $user_arr = ['admin','roles','users'];
            $crm_arr = ['industries','deals','companies','contacts','leads','pipelines','stages'];
            $ats_arr = ['candidates','ats-pipelines'];
        @endphp
        <div data-simplebar class="nicescroll-bar">
            <div class="menu-content-wrap">
                <div class="menu-group">
                    <ul class="navbar-nav flex-column">
                        <li class="nav-item {{in_array(Request::segment(2), $ats_arr) ? 'active' : '' }} ">
                            <a class="nav-link" href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="right" title="" data-bs-original-title="ATS" data-bs-trigger="hover" data-target="#submenu_3">
                                <i class="bi bi-briefcase fs-3"></i>
                            </a>
                        </li>
                    </ul>
                    <ul class="navbar-nav flex-column d-lg-none">
                        <li class="nav-item nav-link">

                            <a href="javascript:void(0)" class="d-block mx-auto avatar avatar-xs avatar-primary avatar-rounded dropdown-toggle  no-caret " data-bs-toggle="dropdown">
                                <span class="initial-wrap">{{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right w-250p position-fixed">
                                <div class="dropdown-item py-2 rounded-3">
                                    <div class="media align-items-center">
                                        <div class="media-head me-2">
                                            <div class="avatar avatar-xs avatar-primary avatar-rounded">
                                                <span class="initial-wrap">{{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}</span>
                                            </div>
                                        </div>
                                        <div class="media-body mw-175p">
                                            <a href="#" class="d-block name">{{auth()->user()->name}} <i class="ri-checkbox-circle-fill fs-7 text-primary"></i></a>
                                            <a href="#" class="d-block fs-7 link-secondary text-truncate">{{auth()->user()->email}}</a>
                                            <div class="dropdown-divider"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="dropdown-item py-2 rounded-3">
                                    <div class="media align-items-center active-user">
                                        <div class="media-body mw-175p">
                                            <div class="dropdown-divider"></div>
                                            <form action="{{ route('member.logout') }}" method="POST">
                                                @csrf
                                                <button type="submit" class="dropdown-item" href="#">Logout </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="bottom-nav d-lg-block d-none">
            <div class="menu-content-wrap">
                <div class="menu-group">

                    <ul class="navbar-nav flex-column">
                        <li class="nav-item nav-link">
                            <a href="javascript:void(0)" class="d-block mx-auto avatar avatar-xs avatar-primary avatar-rounded dropdown-toggle  no-caret " data-bs-toggle="dropdown">
                                <span class="initial-wrap">{{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right w-250p">
                                <h6 class="dropdown-header">Logged account</h6>
                                <div class="dropdown-item py-2 rounded-3">
                                    <div class="media align-items-center active-user">
                                        <div class="media-head me-2">
                                            <div class="avatar avatar-xs avatar-primary avatar-rounded">
                                                <span class="initial-wrap"> {{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}</span>
                                            </div>
                                        </div>
                                        <div class="media-body mw-175p">
                                            <a href="#" class="d-block name">{{auth()->user()->name}} <i class="ri-checkbox-circle-fill fs-7 text-primary"></i></a>
                                            <a href="#" class="d-block fs-7 link-secondary text-truncate">{{auth()->user()->email}}</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="dropdown-item py-2 rounded-3">
                                    <div class="media align-items-center active-user">
                                        <div class="media-body mw-175p">
                                            <div class="dropdown-divider"></div>
                                            <form action="{{ route('member.logout') }}" method="POST">
                                                @csrf
                                                <button type="submit" class="dropdown-item" href="#">Logout </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    @include('company.main.sub-menu')
    <div id="hk_menu_backdrop" class="hk-menu-backdrop"></div>
</div>
