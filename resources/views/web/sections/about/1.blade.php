      <!-- Hero -->
    <section class="pt-5 position-relative">

          <!-- Background -->
        <div class="top-0 position-absolute start-0 w-100 bg-position-bottom-center bg-size-cover bg-repeat-0">
            <div class="d-lg-none" style="height: 960px;"></div>
            <div class="d-none d-lg-block" style="height: 768px;"></div>
        </div>

          <!-- Content -->
        <div class="container pt-5 position-relative zindex-5">
            <div class="row">
                <div class="col-lg-6">
                    <!-- Breadcrumb -->
                    <nav class="pb-4 pt-md-2 pt-lg-3 pb-md-5 mb-xl-4" aria-label="breadcrumb">
                        <ol class="mb-0 breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('pages.home') }}"><i class="bx bx-home-alt fs-lg me-1"></i>{{ x_('Home', 'about') }}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ x_('About v.1', 'about') }}</li>
                        </ol>
                    </nav>
                    <!-- Text -->
                    <h1 class="pb-2 pb-md-3">{{ x_('About Bzns Book', 'about') }}</h1>
                    <p class="pb-4 mb-1 fs-xl mb-md-2 mb-lg-3" style="max-width: 726px;">{{ x_('BznsBook is a SaaS platform that provides introductory and communication services between businesses over the internet. It offers campaign support services and documentation for business entities, making it suitable for both startups and large enterprises. It is also applicable to all types of business activities—agricultural, industrial, commercial, or service-based.', 'about') }}</p>
                    <br>
                    <p class="pb-4 mb-1 fs-xl mb-md-2 mb-lg-3" style="max-width: 726px;">{{ x_('Additionally, the platform offers semi-educational or advisory services in the fields of business and international trade, as well as knowledge-based content on international trade agreements, potential opportunities, and markets.', 'about') }}</p>
                    <br>
                    <p class="pb-4 mb-1 fs-xl mb-md-2 mb-lg-3" style="max-width: 726px;">{{ x_('It also provides services for businesspeople to visit potential markets, facilitating information on visa issuance and flight bookings. meaning that by joining the platform, you are essentially starting your business journey with a professional guide.', 'about') }}</p>
                    <br>


                </div>
                <!-- Images -->
                <div class="col-lg-6">
                    <div class="row row-cols-2 gx-3 gx-lg-4">
                        <div class="col pt-lg-5 mt-lg-1">
                            <img src="assets/img/about/hero/01.jpg" class="mb-3 d-block rounded-3 mb-lg-4" alt="{{ x_('Image', 'about') }}">
                            <img src="assets/img/about/hero/02.jpg" class="d-block rounded-3" alt="{{ x_('Image', 'about') }}">
                        </div>
                        <div class="col">
                            <img src="assets/img/about/hero/03.jpg" class="mb-3 d-block rounded-3 mb-lg-4" alt="{{ x_('Image', 'about') }}">
                            <img src="assets/img/about/hero/04.jpg" class="d-block rounded-3" alt="{{ x_('Image', 'about') }}">
                        </div>
                    </div>
                </div>
                <div class="pt-md-0 mt-md-0 col-lg-12">
                    <p class="pb-4 mb-1 fs-xl mb-md-2 mb-lg-3">{{ x_('Our future plans in a world filled with tensions and disruptions, such as the coronavirus pandemic, include launching the first specialized online exhibitions that bring together companies in the same field and serve as a meeting point for buyers and sellers remotely.', 'about') }}</p>
                    <img src="assets/img/about/clutch-dark.png" class="d-dark-mode-none" width="175" alt="{{ x_('Clutch', 'about') }}">
                    <img src="assets/img/about/clutch-light.png" class="d-none d-dark-mode-block" width="175" alt="{{ x_('Clutch', 'about') }}">
                    <div class="pt-4 mt-2 row row-cols-3 pt-md-5 mt-xl-4">
                        <div class="col">
                            <h3 class="mb-2 h2">2,480</h3>
                            <p class="mb-0"><strong>{{ x_('Remote', 'about') }}</strong> {{ x_('Sales Experts', 'about') }}</p>
                        </div>
                        <div class="col">
                            <h3 class="mb-2 h2">760</h3>
                            <p class="mb-0"><strong>{{ x_('New Clients', 'about') }}</strong> {{ x_('per Month', 'about') }}</p>
                        </div>
                        <div class="col">
                            <h3 class="mb-2 h2">1,200</h3>
                            <p class="mb-0"><strong>{{ x_('Requests', 'about') }}</strong> {{ x_('per Week', 'about') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
