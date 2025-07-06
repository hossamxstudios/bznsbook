
<!doctype html>
@include('admin.main.html')
<head>
    <meta charset="utf-8" />
    <title> BZNSBOOK </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('admin.main.meta')
</head>
<body>
<div class="hk-wrapper hk-pg-auth" data-footer="simple">
    <div class="py-0 hk-pg-wrapper">
        <div class="py-0 hk-pg-body">
            <div class="container-fluid">
                <div class="row auth-split">
                    <div class="mx-auto col-xl-5 col-lg-6 col-md-7 position-relative bg-primary-light-5">
                        <div class="pt-8 auth-content flex-column pb-md-8 pb-13">
                            <form class="w-100" action="{{ route('admin.register') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="mx-auto col-xl-9 col-sm-10">
                                        <div class="p-2 mb-0 shadow-xl card card-flush rounded-8 p-sm-7">
                                            <div class="card-body">
                                                <div class="mb-7 text-center">
                                                    <a class="navbar-brand me-0" href="/">
                                                        <img class="brand-img d-inline-block img-fluid" src="{{ asset('crmlogo.png') }}" alt="brand">
                                                    </a>
                                                </div>
                                                <div class="mb-4 text-center">
                                                    <h4>Sign Up your account</h4>
                                                </div>
                                                <div class="row gx-3">
                                                    <div class="form-group col-lg-12">
                                                        <div class="form-label-group">
                                                            <label> Full Name</label>
                                                        </div>
                                                        <input class="form-control" placeholder="Enter Full Name" value="" type="text" name="name" :value="old('name')">
                                                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                                    </div>
                                                    <div class="form-group col-lg-12">
                                                        <div class="form-label-group">
                                                            <label>Email</label>
                                                        </div>
                                                        <input class="form-control" placeholder="Enter username or email ID" value="" type="text" name="email" :value="old('email')">
                                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                                    </div>
                                                    <div class="form-group col-lg-12">
                                                        <div class="form-label-group">
                                                            <label>Password</label>
                                                        </div>
                                                        <div class="input-group password-check">
                                                            <span class="input-affix-wrapper affix-wth-text">
                                                                <input class="form-control" placeholder="Enter your password" value="" type="password"  name="password" required autocomplete="current-password" />
                                                                <a href="#" class="input-suffix text-primary text-uppercase fs-8 fw-medium">
                                                                    <span>Show</span>
                                                                    <span class="d-none">Hide</span>
                                                                </a>
                                                            </span>
                                                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-lg-12">
                                                        <div class="form-label-group">
                                                            <label>Confirm Password</label>
                                                        </div>
                                                        <div class="input-group password-check">
                                                            <span class="input-affix-wrapper affix-wth-text">
                                                                <input class="form-control" placeholder="Confirm your password" value="" type="password"  name="password_confirmation" required  />
                                                                <a href="#" class="input-suffix text-primary text-uppercase fs-8 fw-medium">
                                                                    <span>Show</span>
                                                                    <span class="d-none">Hide</span>
                                                                </a>
                                                            </span>
                                                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary btn-uppercase btn-block">Regiser</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="bg-transparent border-0 hk-footer">
                            <footer class="container-xxl footer">
                                <div class="row">
                                    <div class="text-center col-xl-8">
                                        <p class="pb-0 footer-text"><span class="copy-text">BZNSBOOKHr © 2025 All rights reserved.</span> <a href="#" class="">Privacy Policy</a><span class="footer-link-sep">|</span><a href="#" class="">T&amp;C</a><span class="footer-link-sep">|</span><a href="#" class="">System Status</a></p>
                                    </div>
                                </div>
                            </footer>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-6 col-md-5 col-sm-10 d-md-block d-none position-relative bg-primary-light-5">
                        <div class="py-8 text-center auth-content flex-column">
                            <div class="row">
                                <div class="mx-auto col-xxl-7 col-xl-8 col-lg-11">
                                    <h2 class="mb-4">Meet all new BZNSBOOKHR ERP</h2>
                                </div>
                            </div>
                            <img src={{ asset("dist/img/login.png") }} class="mt-7 img-fluid w-sm-50" alt="login">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('admin.main.scripts')
</body>
</html>
