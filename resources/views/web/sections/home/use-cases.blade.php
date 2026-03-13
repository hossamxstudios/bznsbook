<section class="container pt-5 pb-2 mt-3 mt-sm-4 mt-xl-5">
    <h2 class="pb-3 text-center h1 pb-lg-4">{{ x_('One Platform — Built for Everyone', 'home') }}</h2>

    <!-- Nav tabs -->
    <ul class="overflow-auto flex-nowrap pb-2 mb-3 nav nav-tabs justify-content-lg-center mb-lg-4" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link text-nowrap active" id="agencies-tab" data-bs-toggle="tab" data-bs-target="#agencies" type="button" role="tab" aria-controls="agencies" aria-selected="true">
          <i class="opacity-60 bx bx-buildings fs-lg me-2"></i>
          {{ x_('For Agencies', 'home') }}
        </button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link text-nowrap" id="freelancers-tab" data-bs-toggle="tab" data-bs-target="#freelancers" type="button" role="tab" aria-controls="freelancers" aria-selected="false">
          <i class="opacity-60 bx bx-user fs-lg me-2"></i>
          {{ x_('For Freelancers', 'home') }}
        </button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link text-nowrap" id="businesses-tab" data-bs-toggle="tab" data-bs-target="#businesses" type="button" role="tab" aria-controls="businesses" aria-selected="false">
          <i class="opacity-60 bx bx-briefcase-alt-2 fs-lg me-2"></i>
          {{ x_('For Businesses', 'home') }}
        </button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link text-nowrap" id="startups-tab" data-bs-toggle="tab" data-bs-target="#startups" type="button" role="tab" aria-controls="startups" aria-selected="false">
          <i class="opacity-60 bx bx-rocket fs-lg me-2"></i>
          {{ x_('For Startups', 'home') }}
        </button>
      </li>
    </ul>

    <!-- Tab panes -->
    <div class="py-4 tab-content bg-secondary rounded-3">

      <!-- For Agencies -->
      <div class="tab-pane fade show active" id="agencies" role="tabpanel" aria-labelledby="agencies-tab">
        <div class="px-3 pt-3 row align-items-center pt-sm-4 pt-md-0 px-sm-4 px-lg-0">
          <div class="text-center col-lg-4 col-md-5 offset-lg-1 text-md-start">
            <h3 class="mb-lg-4">{{ x_('Grow Your Agency', 'home') }}</h3>
            <p>{{ x_('Showcase your agency\'s services, portfolio, and team expertise. Attract new clients through your professional profile, receive service requests, and apply to projects that match your capabilities. Build a strong reputation with verified reviews.', 'home') }}</p>
          </div>
          <div class="col-lg-6 col-md-7 mt-md-4">
            <img src="assets/img/landing/saas-1/use-cases/01.png" class="mx-auto d-block my-lg-2 me-md-0" width="595" alt="{{ x_('For Agencies', 'home') }}">
          </div>
        </div>
      </div>

      <!-- For Freelancers -->
      <div class="tab-pane fade" id="freelancers" role="tabpanel" aria-labelledby="freelancers-tab">
        <div class="px-3 pt-3 pb-2 row align-items-center pb-sm-3 pt-sm-4 pt-md-0 px-sm-4 px-lg-0">
          <div class="text-center col-lg-4 col-md-5 offset-lg-1 text-md-start">
            <h3 class="mb-lg-4">{{ x_('Land More Projects', 'home') }}</h3>
            <p>{{ x_('Create a professional profile that highlights your skills and past work. Browse the projects marketplace, submit proposals with your estimated budget and timeline, and win new opportunities. Let your portfolio speak for itself.', 'home') }}</p>
          </div>
          <div class="col-lg-6 col-md-7 mt-md-4">
            <img src="assets/img/landing/saas-1/use-cases/02.png" class="mx-auto d-block my-lg-2 me-md-0" width="502" alt="{{ x_('For Freelancers', 'home') }}">
          </div>
        </div>
      </div>

      <!-- For Businesses -->
      <div class="tab-pane fade" id="businesses" role="tabpanel" aria-labelledby="businesses-tab">
        <div class="px-3 pt-3 row align-items-center pt-sm-4 pt-md-0 pe-sm-4 pe-md-0 ps-sm-4 ps-lg-0">
          <div class="text-center col-lg-4 col-md-5 offset-lg-1 text-md-start">
            <h3 class="mb-lg-4">{{ x_('Find the Right Partner', 'home') }}</h3>
            <p>{{ x_('Post your project requirements and let qualified professionals come to you. Browse service providers by category, review their portfolios and ratings, and choose the perfect partner for your business needs.', 'home') }}</p>
          </div>
          <div class="col-lg-6 col-md-7 mt-n3 mt-md-1">
            <img src="assets/img/landing/saas-1/use-cases/03.png" class="mx-auto d-block mb-lg-2 me-md-0" width="525" alt="{{ x_('For Businesses', 'home') }}">
          </div>
        </div>
      </div>

      <!-- For Startups -->
      <div class="tab-pane fade" id="startups" role="tabpanel" aria-labelledby="startups-tab">
        <div class="px-3 pt-3 row align-items-center pt-sm-4 pt-md-0 pe-sm-4 pe-md-0 ps-sm-4 ps-lg-0">
          <div class="text-center col-lg-4 col-md-5 offset-lg-1 text-md-start">
            <h3 class="mb-lg-4">{{ x_('Build Your Dream Team', 'home') }}</h3>
            <p>{{ x_('Whether you need branding, development, marketing, or design — find specialized professionals ready to help you launch. Post projects, compare proposals, and collaborate with experts who understand the startup ecosystem.', 'home') }}</p>
          </div>
          <div class="col-lg-6 col-md-7 mt-n3 mt-md-1">
            <img src="assets/img/landing/saas-1/use-cases/04.png" class="mx-auto d-block mb-lg-2 me-md-0" width="545" alt="{{ x_('For Startups', 'home') }}">
          </div>
        </div>
      </div>
    </div>
  </section>
