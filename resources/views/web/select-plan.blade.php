<!doctype html>
@include('web.main.html')
<head>
    <meta charset="utf-8" />
    <title>{{ x_('Select Plan', 'web') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('web.main.meta')
</head>
<body>
    <main class="page-wrapper">
        @include('web.main.navbar')
        <!-- Guide Content Section -->
        <section class="py-4 bg-dark" data-bs-theme="dark">
            <div class="container pb-2 py-lg-3">
                <!-- Breadcrumb -->
                <nav class="pb-4 mb-lg-3" aria-label="breadcrumb">
                    <ol class="mb-0 breadcrumb justify-content-center justify-content-lg-start">
                        <li class="breadcrumb-item">
                            <a href="index-2.html"><i class="bx bx-home-alt fs-lg me-1"></i>{{ x_('Home', 'web') }}</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">{{ x_('Select Plan', 'web') }}</li>
                    </ol>
                </nav>
                <h1 class="mb-0 text-center">{{ x_('Select Your Plan', 'web') }}</h1>
            </div>
            <div style="height: 300px;"></div>
        </section>
        <section class="container position-relative zindex-2" style="margin-top: -300px;">
            <div class="price-switch-wrapper">
                <div class="table-responsive-lg">
                    <div class="pb-4 d-flex align-items-center">
                        <!-- Pricing plan -->
                        <div class="border shadow-sm rounded-3 rounded-end-0 me-n1"
                            style="width: 32%; min-width: 16rem;">
                            <div class="py-3 border-0 card bg-light h-100 border-end rounded-end-0 py-sm-4 py-lg-5">
                                <div class="text-center card-body">
                                    <h3 class="mb-2">{{ x_('Billed Monthly', 'web') }}</h3>
                                    <div class="pb-4 mb-3 fs-lg">{{ x_('Best for small teams', 'web') }}</div>
                                    <div class="mb-1 display-5 text-dark" data-monthly-price>$10</div>
                                    <div class="mb-5 text-muted">{{ x_('per month', 'web') }}</div>
                                </div>
                                <div class="pt-0 pb-4 text-center border-0 card-footer">
                                    <form action="{{ route('client.subscribe.plan') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="plan" value="monthly">
                                        <input type="hidden" name="price" value="10">
                                        <button type="submit" class="btn btn-primary btn-lg">{{ x_('Get started now', 'web') }}</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Featurd pricing plan -->
                        <div class="p-4 bg-primary position-relative rounded-3 shadow-primary shadow-dark-mode-none zindex-2"
                            style="width: 36%; min-width: 18rem;">
                            <div class="py-3 bg-transparent card border-light py-sm-4 py-lg-5">
                                <div class="text-center card-body text-light">
                                    <h3 class="mb-2 text-light">{{ x_('Billed Annually', 'web') }}</h3>
                                    <div class="pb-4 mb-3 fs-lg">{{ x_('Best for large teams', 'web') }}</div>
                                    <div class="mb-1 display-5" data-monthly-price>$7.50</div>
                                    <div class="mb-5 opacity-50">{{ x_('per month', 'web') }}</div>
                                </div>
                                <div class="pt-0 pb-4 text-center border-0 card-footer">
                                    <form action="{{ route('client.subscribe.plan') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="plan" value="annual">
                                        <input type="hidden" name="price" value="90">
                                        <button type="submit" class="btn btn-light btn-lg shadow-secondary">{{ x_('Get started now', 'web') }}</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Pricing plan -->
                        <div class="border shadow-sm rounded-3 rounded-start-0" style="width: 32%; min-width: 16rem;">
                            <div class="py-3 border-0 card bg-light h-100 rounded-start-0 py-sm-4 py-lg-5">
                                <div class="text-center card-body">
                                    <h3 class="mb-2">{{ x_('Billed Bi-Annually', 'web') }}</h3>
                                    <div class="pb-4 mb-3 opacity-70 fs-lg">{{ x_('Best for growing teams', 'web') }}</div>
                                    <div class="mb-1 display-5 text-dark" data-monthly-price>$8.5</div>
                                    <div class="mb-5 text-muted">{{ x_('per month', 'web') }}</div>
                                </div>
                                <div class="pt-0 pb-4 text-center border-0 card-footer">
                                    <form action="{{ route('client.subscribe.plan') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="plan" value="semi-annual">
                                        <input type="hidden" name="price" value="50">
                                        <button type="submit" class="btn btn-primary btn-lg">{{ x_('Get started now', 'web') }}</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @include('web.main.footer')
    </main>
    @include('web.main.scripts')
</body>
</html>
