<!doctype html>
@include('web.main.html')
<head>
    <meta charset="utf-8" />
    <title>BZNS BOOK</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('web.main.meta')
</head>
<body>
    <main class="page-wrapper">
        @include('web.main.navbar')
        <section class="pb-4 position-relative h-100">
            <!-- Sign in form -->
            <div class="container flex-wrap d-flex justify-content-center justify-content-xl-start h-100">
                <div class="pb-4 w-100 align-self-end" style="max-width: 526px;">
                    <h1 class="text-center text-xl-start">Welcome Back</h1>
                    <p class="pb-3 mb-3 text-center text-xl-start">Don't have an account yet? <a href="{{ route('client.register') }}">Register here.</a></p>
                    <form class="mb-2 needs-validation" action="{{ route('admin.login') }}" method="POST">
                        @csrf
                        <div class="mb-4 position-relative">
                            <label for="email" class="form-label fs-base">Email</label>
                            <input class="form-control" placeholder="Enter username or email ID" type="email" name="email" :value="old('email')" required>
                            <div class="invalid-feedback position-absolute start-0 top-100">Please enter a valid email address!</div>
                        </div>
                        <div class="mb-4">
                            <label for="password" class="form-label fs-base">Password</label>
                            <div class="password-toggle">
                                <input class="form-control form-control-lg" placeholder="Enter your password" type="password" name="password" required autocomplete="current-password" />
                                <label class="password-toggle-btn" aria-label="Show/hide password">
                                    <input class="password-toggle-check" type="checkbox">
                                    <span class="password-toggle-indicator"></span>
                                </label>
                                <div class="invalid-feedback position-absolute start-0 top-100">Please enter your password!</div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <div class="form-check">
                                <input type="checkbox" id="remember" class="form-check-input">
                                <label for="remember" class="form-check-label fs-base">Remember me</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary shadow-primary btn-lg w-100">Sign in</button>
                    </form>
                    <a href="{{ route('password.request') }}" class="btn btn-link btn-lg w-100">Forgot Password ?</a>
                    <hr class="my-4">
                    <h6 class="mb-4 text-center">Or sign in with your social network</h6>
                    <div class="row row-cols-1 row-cols-sm-2">
                        <div class="mb-3 col">
                            <a href="#" class="btn btn-icon btn-secondary btn-google btn-lg w-100">
                                <i class="bx bxl-google fs-xl me-2"></i>
                                Google
                            </a>
                        </div>
                        <div class="mb-3 col">
                            <a href="#" class="btn btn-icon btn-secondary btn-facebook btn-lg w-100">
                                <i class="bx bxl-facebook fs-xl me-2"></i>
                                Facebook
                            </a>
                        </div>
                    </div>
                </div>
                <div class="w-100 align-self-end">
                    <p class="pb-2 mb-0 text-center nav d-block fs-xs text-xl-start">&copy;Design & Develop by <a href="https://hossam-x-studios.com/en">Hossam X Studios</a></p>
                </div>
            </div>

            <!-- Background -->
            <div class="top-0 position-absolute end-0 w-50 h-100 bg-position-center bg-repeat-0 bg-size-cover d-none d-xl-block" style="background-image: url(bg-login.jpg);"></div>
        </section>
    </main>
    @include('web.main.scripts')
</body>
</html>
