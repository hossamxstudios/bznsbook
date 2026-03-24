
    <!-- Footer -->
    <footer class="pt-5 pb-4 mt-2 bg-zinc-500 footer pb-lg-5 mt-md-0">
        <div class="container pt-lg-4">
          <div class="pb-5 row">
            <div class="col-lg-4 col-md-6">
              <div class="p-0 mb-3 navbar-brand text-dark me-0 mb-lg-4">
                <img src="{{ asset('crmlogo.png') }}" width="200" alt="{{ x_('Bzns Book', 'web-layout') }}">
              </div>
              <p class="mb-4 fs-sm pb-lg-3">{{ x_('BznsBook is a professional marketplace where agencies, freelancers, and businesses connect, collaborate, and grow through services, portfolios, and project opportunities.', 'web-layout') }}</p>
              <form class="needs-validation" novalidate>
                <label for="subscr-email" class="form-label">{{ x_('Subscribe to our newsletter', 'web-layout') }}</label>
                <div class="input-group">
                  <input type="email" id="subscr-email" class="form-control rounded-start ps-5" placeholder="{{ x_('Your email', 'web-layout') }}" required>
                  <i class="bx bx-envelope fs-lg text-muted position-absolute top-50 start-0 translate-middle-y ms-3 zindex-5"></i>
                  <div class="invalid-tooltip position-absolute top-100 start-0">{{ x_('Please provide a valid email address.', 'web-layout') }}</div>
                  <button type="submit" class="btn btn-primary">{{ x_('Subscribe', 'web-layout') }}</button>
                </div>
              </form>
            </div>
            <div class="pt-4 col-xl-6 col-lg-7 col-md-5 offset-xl-2 offset-md-1 pt-md-1 pt-lg-0">
              <div id="footer-links" class="row">
                <div class="col-lg-4">
                  <h6 class="mb-2">
                    <a href="#useful-links" class="py-2 d-block text-dark dropdown-toggle d-lg-none" data-bs-toggle="collapse">{{ x_('Useful Links', 'web-layout') }}</a>
                  </h6>
                  <div id="useful-links" class="collapse d-lg-block" data-bs-parent="#footer-links">
                    <ul class="nav flex-column pb-lg-1 mb-lg-3">
                      <li class="nav-item"><a href="{{ route('pages.home') }}" class="px-0 pt-1 pb-2 nav-link d-inline-block">{{ x_('Home', 'web-layout') }}</a></li>
                      <li class="nav-item"><a href="{{ route('pages.companies') }}" class="px-0 pt-1 pb-2 nav-link d-inline-block">{{ x_('Explore Professionals', 'web-layout') }}</a></li>
                      <li class="nav-item"><a href="{{ route('pages.pricing') }}" class="px-0 pt-1 pb-2 nav-link d-inline-block">{{ x_('Pricing', 'web-layout') }}</a></li>
                      <li class="nav-item"><a href="{{ route('pages.about') }}" class="px-0 pt-1 pb-2 nav-link d-inline-block">{{ x_('About', 'web-layout') }}</a></li>
                      <li class="nav-item"><a href="{{ route('pages.contact') }}" class="px-0 pt-1 pb-2 nav-link d-inline-block">{{ x_('Contact', 'web-layout') }}</a></li>
                    </ul>
                    <ul class="mb-2 nav flex-column mb-lg-0">
                      <li class="nav-item"><a href="{{ route('pages.terms') }}" class="px-0 pt-1 pb-2 nav-link d-inline-block">{{ x_('Terms and Conditions', 'web-layout') }}</a></li>
                      <li class="nav-item"><a href="{{ route('pages.privacy') }}" class="px-0 pt-1 pb-2 nav-link d-inline-block">{{ x_('Privacy Policy', 'web-layout') }}</a></li>
                    </ul>
                  </div>
                </div>
                <div class="col-xl-4 col-lg-3">
                  <h6 class="mb-2">
                    <a href="#social-links" class="py-2 d-block text-dark dropdown-toggle d-lg-none" data-bs-toggle="collapse">{{ x_('Socials', 'web-layout') }}</a>
                  </h6>
                  <div id="social-links" class="collapse d-lg-block" data-bs-parent="#footer-links">
                    <ul class="mb-2 nav flex-column mb-lg-0">
                      <li class="nav-item"><a href="#" class="px-0 pt-1 pb-2 nav-link d-inline-block">{{ x_('Facebook', 'web-layout') }}</a></li>
                      <li class="nav-item"><a href="#" class="px-0 pt-1 pb-2 nav-link d-inline-block">{{ x_('LinkedIn', 'web-layout') }}</a></li>
                      <li class="nav-item"><a href="#" class="px-0 pt-1 pb-2 nav-link d-inline-block">{{ x_('Twitter', 'web-layout') }}</a></li>
                      <li class="nav-item"><a href="#" class="px-0 pt-1 pb-2 nav-link d-inline-block">{{ x_('Behance', 'web-layout') }}</a></li>
                    </ul>
                  </div>
                </div>
                <div class="pt-2 col-xl-4 col-lg-5 pt-lg-0">
                  <h6 class="mb-2">{{ x_('Contact Us', 'web-layout') }}</h6>
                  <a href="mailto:info@bznsbook.com" class="mb-2 fw-medium d-block">info@bznsbook.com</a>
                  <a href="tel:+20201036943149" class="px-0 pt-1 pb-1 nav-link fs-sm">+202 01036943149</a>
                  <a href="tel:+971554396086" class="px-0 pt-1 pb-1 nav-link fs-sm">+971 55 4396086</a>
                  <p class="mt-2 mb-0 fs-sm">{{ x_('90 Street, 5th District,', 'web-layout') }}<br>{{ x_('New Cairo, Egypt', 'web-layout') }}</p>
                </div>
              </div>
            </div>
          </div>
          <p class="pb-2 mb-0 text-center nav d-block fs-xs text-md-start pb-lg-0">
            {{ x_('Design & Develop by', 'web-layout') }} <a href="https://hossam-x-studios.com/en">{{ x_('Hossam X Studios', 'web-layout') }}</a>
          </p>
        </div>
      </footer>
