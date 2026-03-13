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
            $client_arr = ['clients'];
            $web_arr = ['sections','categories', 'subcategories', 'topics','blogs'];
        @endphp
        <div data-simplebar class="nicescroll-bar">
            <div class="menu-content-wrap">
                <div class="menu-group">
                    <ul class="navbar-nav flex-column">
                        <li class="nav-item {{in_array(Request::segment(2), $crm_arr) ? 'active' : '' }} {{Request::segment(2) == NULL ? 'active' : '' }}">
                            <a class="nav-link" href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="right" title="" data-bs-original-title="{{ x_('CRM', 'sidebar') }}" data-bs-trigger="hover" data-target="#submenu_2">
                                <i class="bi bi-cash-coin fs-3"></i>
                            </a>
                        </li>
                        <li class="nav-item {{in_array(Request::segment(2), $web_arr) ? 'active' : '' }} ">
                            <a class="nav-link" href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="right" title="" data-bs-original-title="{{ x_('Web', 'sidebar') }}" data-bs-trigger="hover" data-target="#submenu_3">
                                <i class="bi bi-terminal-plus fs-3"></i>
                            </a>
                        </li>
                        <li class="nav-item {{in_array(Request::segment(2), $client_arr) ? 'active' : '' }} ">
                            <a class="nav-link" href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="right" title="" data-bs-original-title="{{ x_('Client', 'sidebar') }}" data-bs-trigger="hover" data-target="#submenu_4">
                                <i class="bi bi-briefcase fs-3"></i>
                            </a>
                        </li>
                    </ul>
                    <ul class="navbar-nav flex-column d-lg-none">
                        <li class="nav-item nav-link">
                            <ul class="navbar-nav flex-column">
                                <li class="nav-item {{in_array(Request::segment(2) , $user_arr) ? 'active' : '' }}">
                                    <a class="nav-link" href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="right" title="" data-bs-original-title="{{ x_('User Management', 'sidebar') }}" data-bs-trigger="hover" data-target="#submenu_1">
                                   <i class="ri-user-settings-line fs-3"></i>
                                    </a>
                                </li>
                            </ul>
                            <a href="javascript:void(0)" class="mx-auto d-block avatar avatar-xs avatar-primary avatar-rounded dropdown-toggle no-caret" data-bs-toggle="dropdown">
                                <span class="initial-wrap">{{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right w-250p position-fixed">
                                <div class="py-2 dropdown-item rounded-3">
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
                                <div class="py-2 dropdown-item rounded-3">
                                    <div class="media align-items-center active-user">
                                        <div class="media-body mw-175p">
                                            <div class="dropdown-divider"></div>
                                            <form action="{{ route('admin.logout') }}" method="POST">
                                                @csrf
                                                <button type="submit" class="dropdown-item" href="#">{{ x_('Logout', 'sidebar') }} </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <ul class="navbar-nav flex-column">
                        <li class="nav-item {{in_array(Request::segment(2) , $user_arr) ? 'active' : '' }}">
                            <a class="nav-link" href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="right" title="" data-bs-original-title="{{ x_('User Management', 'sidebar') }}" data-bs-trigger="hover" data-target="#submenu_1">
                           <i class="ri-user-settings-line fs-5"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="bottom-nav d-lg-block d-none">
            <div class="menu-content-wrap">
                <div class="menu-group">
                    <ul class="navbar-nav flex-column">
                        {{-- Language Switcher --}}
                        @php
                            $currentLocale = app()->getLocale();
                            $sidebarLocales = array_merge(['en' => 'English'], function_exists('active_locales') ? active_locales() : []);
                        @endphp
                        @if(count($sidebarLocales) > 1)
                        <li class="nav-item nav-link">
                            <a href="javascript:void(0)" class="mx-auto d-block avatar avatar-xs avatar-soft-primary avatar-rounded dropdown-toggle no-caret" data-bs-toggle="dropdown" data-bs-placement="right" title="{{ x_('Language', 'sidebar') }}">
                                <span class="initial-wrap" style="font-size:10px;font-weight:700;">{{ strtoupper($currentLocale) }}</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" style="min-width:170px;">
                                <h6 class="dropdown-header">{{ x_('Language', 'sidebar') }}</h6>
                                @foreach($sidebarLocales as $code => $name)
                                <form action="{{ route('language.switch') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="locale" value="{{ $code }}">
                                    <button type="submit" class="dropdown-item {{ $currentLocale === $code ? 'active' : '' }}">
                                        {{ $name }} <small class="text-muted">({{ strtoupper($code) }})</small>
                                    </button>
                                </form>
                                @endforeach
                            </div>
                        </li>
                        @endif
                        {{-- User Account --}}
                        <li class="nav-item nav-link">
                            <a href="javascript:void(0)" class="mx-auto d-block avatar avatar-xs avatar-primary avatar-rounded dropdown-toggle no-caret" data-bs-toggle="dropdown">
                                <span class="initial-wrap">{{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right w-250p">
                                <h6 class="dropdown-header">{{ x_('Logged account', 'sidebar') }}</h6>
                                <div class="py-2 dropdown-item rounded-3">
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
                                <div class="py-2 dropdown-item rounded-3">
                                    <div class="media align-items-center active-user">
                                        <div class="media-body mw-175p">
                                            <div class="dropdown-divider"></div>
                                            <form action="{{ route('admin.logout') }}" method="POST">
                                                @csrf
                                                <button type="submit" class="dropdown-item" href="#">{{ x_('Logout', 'sidebar') }} </button>
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
    @include('admin.main.sub-menu')
    <div id="hk_menu_backdrop" class="hk-menu-backdrop"></div>
</div>
