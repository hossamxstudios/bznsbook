<!doctype html>
@include('web.main.html')
<head>
    <meta charset="utf-8" />
    <title> {{ x_('Bzns Book', 'general') }} </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('web.main.meta')
    <style>
        .invalid-feedback {
            display: block;
            width: 100%;
            margin-top: 0.25rem;
            font-size: 80%;
            color: #dc3545;
        }
    </style>
</head>
<body>
    <main class="page-wrapper">
        @include('web.main.navbar')
        <section class="pb-4 position-relative h-100">
            <div class="container flex-wrap d-flex justify-content-center justify-content-xl-start h-100">
                <div class="pb-4 w-100 align-self-end" style="max-width: 526px;">
                    <h1 class="text-center text-xl-start">{{ x_('Welcome Back', 'general') }}</h1>
                    <p class="pb-3 mb-3 text-center text-xl-start">{{ x_('have an account yet?', 'general') }} <a href="{{ route('admin.login') }}">{{ x_('Login here.', 'general') }}</a></p>
                    <form class="mb-2" action="{{ route('client.register') }}" method="POST">
                        @csrf
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="mb-4">
                            <label for="name" class="form-label fs-base">{{ x_('Full Name', 'general') }}</label>
                            <input class="form-control @error('name') is-invalid @enderror" placeholder="{{ x_('Enter your full name', 'general') }}" type="text" id="name" name="name" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="phone" class="form-label fs-base">{{ x_('Phone Number', 'general') }}</label>
                            <input class="form-control @error('phone') is-invalid @enderror" placeholder="{{ x_('Enter your phone number', 'general') }}" type="tel" id="phone" name="phone" value="{{ old('phone') }}" required>
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="email" class="form-label fs-base">{{ x_('Email', 'general') }}</label>
                            <input class="form-control @error('email') is-invalid @enderror" placeholder="{{ x_('Enter username or email ID', 'general') }}" type="email" id="email" name="email" value="{{ old('email') }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="password" class="form-label fs-base">{{ x_('Password', 'general') }}</label>
                            <div class="password-toggle">
                                <input class="form-control form-control-lg @error('password') is-invalid @enderror" placeholder="{{ x_('Enter your password', 'general') }}" type="password" id="password" name="password" required autocomplete="current-password" />
                                <label class="password-toggle-btn" aria-label="{{ x_('Show/hide password', 'general') }}">
                                    <input class="password-toggle-check" type="checkbox">
                                    <span class="password-toggle-indicator"></span>
                                </label>
                            </div>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="password_confirmation" class="form-label fs-base">{{ x_('Confirm Password', 'general') }}</label>
                            <div class="password-toggle">
                                <input class="form-control form-control-lg @error('password_confirmation') is-invalid @enderror" placeholder="{{ x_('Confirm your password', 'general') }}" type="password" id="password_confirmation" name="password_confirmation" required autocomplete="new-password" />
                                <label class="password-toggle-btn" aria-label="{{ x_('Show/hide password', 'general') }}">
                                    <input class="password-toggle-check" type="checkbox">
                                    <span class="password-toggle-indicator"></span>
                                </label>
                            </div>
                            @error('password_confirmation')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary shadow-primary btn-lg w-100">{{ x_('Sign up', 'general') }}</button>
                    </form>
                    <a href="{{ route('password.request') }}" class="btn btn-link btn-lg w-100">{{ x_('Forgot Password ?', 'general') }}</a>
                </div>
                <div class="w-100 align-self-end">
                    <p class="pb-2 mb-0 text-center nav d-block fs-xs text-xl-start">{{ x_('&copy;Design & Develop by', 'general') }} <a href="https://hossam-x-studios.com/en">{{ x_('Hossam X Studios', 'general') }}</a> </p>
                </div>
            </div>
            <div class="top-0 position-absolute end-0 w-50 h-100 bg-position-center bg-repeat-0 bg-size-cover d-none d-xl-block" style="background-image: url({{ asset('bg-login.jpg') }});"></div>
        </section>
    </main>
    @include('web.main.scripts')

    <script>
        // Simple password toggle functionality
        document.addEventListener('DOMContentLoaded', function() {
            const passwordToggles = document.querySelectorAll('.password-toggle-check');

            passwordToggles.forEach(toggle => {
                toggle.addEventListener('change', function() {
                    const container = this.closest('.password-toggle');
                    const input = container.querySelector('input[type="password"], input[type="text"]');

                    input.type = this.checked ? 'text' : 'password';
                });
            });
        });
    </script>
</body>
</html>
