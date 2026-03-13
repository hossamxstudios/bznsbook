<section class="container-fluid">
    <div class="px-3 py-5 bg-secondary rounded-3 px-sm-4 px-lg-0">
      <div class="pt-1 pb-2 row align-items-center py-lg-4">
        <div class="pb-3 mb-4 col-xl-4 col-lg-5 col-md-6 offset-lg-1 mb-md-0 pb-md-0">
          <h2 class="h1 mb-lg-4">{{ x_('Get in Touch', 'home') }}</h2>
          <p class="pb-2 pb-md-4 pb-lg-5">{{ x_('Do you have a product? Looking for a product, trusted supplier, or clients? Subscribe now and we will help you achieve your target.', 'home') }}</p>
          <h3 class="mb-lg-4">{{ x_('Contact Info', 'home') }}</h3>
          <ul class="pb-3 mb-2 list-unstyled pb-md-4 pb-lg-5">
            <li class="mb-2">
              <a href="tel:+20201036943149" class="p-0 nav-link d-flex align-items-center">
                <i class="bx bx-phone-call fs-xl text-primary me-2"></i>
                +202 01036943149
              </a>
            </li>
            <li class="mb-2">
              <a href="tel:+971554396086" class="p-0 nav-link d-flex align-items-center">
                <i class="bx bx-phone-call fs-xl text-primary me-2"></i>
                +971 55 4396086
              </a>
            </li>
            <li class="mb-2">
              <a href="mailto:info@bznsbook.com" class="p-0 nav-link d-flex align-items-center">
                <i class="bx bx-envelope fs-xl text-primary me-2"></i>
                info@bznsbook.com
              </a>
            </li>
            <li class="mb-2">
              <a href="#" class="p-0 nav-link d-flex align-items-center">
                <i class="bx bx-map fs-xl text-primary me-2"></i>
                {{ x_('90 Street, 5th District, New Cairo, Egypt', 'home') }}
              </a>
            </li>
          </ul>
          <div class="d-flex">
            <a href="#" class="btn btn-icon btn-outline-secondary btn-facebook me-3" aria-label="Facebook">
              <i class="bx bxl-facebook"></i>
            </a>
            <a href="#" class="btn btn-icon btn-outline-secondary btn-twitter me-3" aria-label="Twitter">
              <i class="bx bxl-twitter"></i>
            </a>
            <a href="#" class="btn btn-icon btn-outline-secondary btn-linkedin me-3" aria-label="LinkedIn">
              <i class="bx bxl-linkedin"></i>
            </a>
            <a href="#" class="btn btn-icon btn-outline-secondary btn-instagram" aria-label="Instagram">
              <i class="bx bxl-instagram"></i>
            </a>
          </div>
        </div>
        <div class="col-lg-5 col-md-6 offset-xl-1">
          <div class="border-0 shadow-sm card p-sm-2">
            <form class="card-body needs-validation" novalidate>
              <div class="mb-4">
                <label for="service" class="form-label fs-base">{{ x_('Service', 'home') }}</label>
                <select id="service" class="form-select form-select-lg" required>
                  <option value="" selected disabled>{{ x_('What are you interested in?', 'home') }}</option>
                  <option value="Publishing Services">{{ x_('Publishing My Services', 'home') }}</option>
                  <option value="Finding Professionals">{{ x_('Finding Professionals', 'home') }}</option>
                  <option value="Posting a Project">{{ x_('Posting a Project', 'home') }}</option>
                  <option value="Subscription Plans">{{ x_('Subscription Plans', 'home') }}</option>
                  <option value="Partnership">{{ x_('Partnership Inquiry', 'home') }}</option>
                  <option value="General">{{ x_('General Question', 'home') }}</option>
                </select>
                <div class="invalid-feedback">{{ x_('Please choose the service!', 'home') }}</div>
              </div>
              <div class="mb-4">
                <label for="name" class="form-label fs-base">{{ x_('Full name', 'home') }}</label>
                <input type="text" id="name" class="form-control form-control-lg" required>
                <div class="invalid-feedback">{{ x_('Please enter your name!', 'home') }}</div>
              </div>
              <div class="mb-4">
                <label for="email" class="form-label fs-base">{{ x_('Email address', 'home') }}</label>
                <input type="email" id="email" class="form-control form-control-lg" required>
                <div class="invalid-feedback">{{ x_('Please provide a valid email address!', 'home') }}</div>
              </div>
              <div class="pb-2 mb-4">
                <label for="message" class="form-label fs-base">{{ x_('Email address', 'home') }}</label>
                <textarea id="message" class="form-control form-control-lg" rows="3" placeholder="{{ x_('Tell us about your project', 'home') }}" required></textarea>
                <div class="invalid-feedback">{{ x_('Please enter you message!', 'home') }}</div>
              </div>
              <button type="submit" class="btn btn-primary shadow-primary btn-lg">{{ x_('Send request', 'home') }}</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
