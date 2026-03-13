     <!-- Links + Contact form -->
     <section class="pt-5 position-relative bg-secondary">
        <div class="container pt-5 position-relative zindex-2">
          <!-- Breadcrumb -->
          <nav class="pb-3 mb-2 pt-lg-4 mb-sm-3" aria-label="breadcrumb">
            <ol class="mb-0 breadcrumb">
              <li class="breadcrumb-item">
                <a href="{{ route('pages.home') }}"><i class="bx bx-home-alt fs-lg me-1"></i>{{ x_('Home', 'contact') }}</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">{{ x_('Contact Us', 'contact') }}</li>
            </ol>
          </nav>

          <div class="row">

            <!-- Contact links -->
            <div class="pb-4 mb-2 col-xl-4 col-lg-5 pb-sm-5 mb-sm-0">
              <div class="pe-lg-4 pe-xl-0">
                <h1 class="pb-3 pb-md-4 mb-lg-5">{{ x_('Contact Us', 'contact') }}</h1>
                <div class="pb-3 d-flex align-items-start mb-sm-1 mb-md-3">
                  <div class="flex-shrink-0 p-3 bg-light text-primary rounded-circle fs-3 lh-1">
                    <i class="bx bx-envelope"></i>
                  </div>
                  <div class="ps-3 ps-sm-4">
                    <h2 class="pb-1 mb-2 h4">{{ x_('Email us', 'contact') }}</h2>
                    <p class="mb-2">{{ x_('Please feel free to drop us a line. We will respond as soon as possible.', 'contact') }}</p>
                    <a href="mailto:info@bznsbook.com" class="px-0 btn btn-link btn-lg">
                      info@bznsbook.com
                      <i class="bx bx-right-arrow-alt lead ms-2"></i>
                    </a>
                  </div>
                </div>
                <div class="d-flex align-items-start">
                  <div class="flex-shrink-0 p-3 bg-light text-primary rounded-circle fs-3 lh-1">
                    <i class="bx bx-group"></i>
                  </div>
                  <div class="ps-3 ps-sm-4">
                    <h2 class="pb-1 mb-2 h4">{{ x_('Careers', 'contact') }}</h2>
                    <p class="mb-2">{{ x_('Your business is agricultural, industrial, commercial, service, shipping, or business services. You can share your business on our website through your account.', 'contact') }}</p>
                    <a href="{{ route('client.register') }}" class="px-0 btn btn-link btn-lg">
                      {{ x_('Create your account', 'contact') }}
                      <i class="bx bx-right-arrow-alt lead ms-2"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>

            <!-- Contact form -->
            <div class="col-xl-6 col-lg-7 offset-xl-2">
              <div class="py-3 shadow-lg card border-light p-sm-4 p-md-5">
                <div class="top-0 bg-dark position-absolute start-0 w-100 h-100 rounded-3 d-none d-dark-mode-block"></div>
                <div class="card-body position-relative zindex-2">
                  <h2 class="pb-3 mb-4 card-title">{{ x_('Get in Touch', 'contact') }}</h2>
                  <p class="mb-4 text-body-secondary">{{ x_('Do you have a product? Looking for a product, trusted supplier, or clients? Subscribe now and we will help you achieve your target.', 'contact') }}</p>
                  <form class="row g-4 needs-validation" novalidate>
                    <div class="col-12">
                      <label for="fn" class="form-label fs-base">{{ x_('Full name', 'contact') }}</label>
                      <input type="text" class="form-control form-control-lg" id="fn" required>
                      <div class="invalid-feedback">{{ x_('Please enter your full name!', 'contact') }}</div>
                    </div>
                    <div class="col-12">
                      <label for="email" class="form-label fs-base">{{ x_('Email address', 'contact') }}</label>
                      <input type="email" class="form-control form-control-lg" id="email" required>
                      <div class="invalid-feedback">{{ x_('Please provide a valid email address!', 'contact') }}</div>
                    </div>
                    <div class="col-12">
                      <label for="business-type" class="form-label fs-base">{{ x_('Business Type', 'contact') }}</label>
                      <select class="form-select form-select-lg" id="business-type" required>
                        <option value="" selected disabled>{{ x_('Choose your business type', 'contact') }}</option>
                        <option value="Agricultural">{{ x_('Agricultural', 'contact') }}</option>
                        <option value="Industrial">{{ x_('Industrial', 'contact') }}</option>
                        <option value="Commercial">{{ x_('Commercial', 'contact') }}</option>
                        <option value="Service">{{ x_('Service', 'contact') }}</option>
                        <option value="Shipping">{{ x_('Shipping', 'contact') }}</option>
                        <option value="Business Services">{{ x_('Business Services', 'contact') }}</option>
                        <option value="Other">{{ x_('Other', 'contact') }}</option>
                      </select>
                      <div class="invalid-feedback">{{ x_('Choose a business type from the list!', 'contact') }}</div>
                    </div>
                    <div class="col-12">
                      <label for="message" class="form-label fs-base">{{ x_('Message', 'contact') }}</label>
                      <textarea class="form-control form-control-lg" id="message" rows="3" placeholder="{{ x_('Tell us about your business needs', 'contact') }}" required></textarea>
                      <div class="invalid-feedback">{{ x_('Please enter your message!', 'contact') }}</div>
                    </div>
                    <div class="pt-2 col-12 pt-sm-3">
                      <button type="submit" class="btn btn-lg btn-primary w-100 w-sm-auto">{{ x_('Send Message', 'contact') }}</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="bottom-0 position-absolute start-0 w-100 bg-light" style="height: 8rem;"></div>
      </section>
