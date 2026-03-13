   <!-- Sign up CTA -->
   <section class="container position-relative zindex-2">
    <div class="px-4 py-5 border bg-dark border-light rounded-3 px-sm-0">
      <div class="row justify-content-center py-sm-2 py-lg-5">
        <div class="text-center col-xl-6 col-lg-7 col-md-8 col-sm-10">
          <h2 class="mb-4 h1 text-light">{{ x_('Ready to Get Started?', 'web') }}</h2>
          <p class="pb-4 mb-3 opacity-70 fs-lg text-light">{{ x_('Organize your tasks with a 14-day free trial', 'web') }}</p>

          <!-- Desktop form -->
          <form class="mb-3 input-group input-group-lg d-none d-sm-flex needs-validation" novalidate>
            <input type="email" class="form-control rounded-start ps-5" placeholder="{{ x_('Your email', 'web') }}" required>
            <i class="bx bx-envelope fs-lg text-muted position-absolute top-50 start-0 translate-middle-y ms-3 zindex-5"></i>
            <div class="invalid-tooltip position-absolute top-100 start-0">{{ x_('Please provide a valid email address.', 'web') }}</div>
            <button type="submit" class="btn btn-dark">{{ x_('Get started for free', 'web') }}</button>
          </form>

          <!-- Mobile form -->
          <form class="mb-3 needs-validation d-sm-none" novalidate>
            <div class="mb-3 position-relative">
              <input type="email" class="form-control form-control-lg rounded-start ps-5" placeholder="{{ x_('Your email', 'web') }}" required>
              <i class="bx bx-envelope fs-lg text-muted position-absolute top-50 start-0 translate-middle-y ms-3 zindex-5"></i>
              <div class="top-0 invalid-tooltip position-absolute start-0 mt-n4">{{ x_('Please provide a valid email address.', 'web') }}</div>
            </div>
            <button type="submit" class="btn btn-dark btn-lg w-100">{{ x_('Get started for free', 'web') }}</button>
          </form>
          <p class="mb-0 opacity-50 fs-sm text-light">{{ x_('No subscriptions. No annual fees. No lock-ins.', 'web') }}</p>
        </div>
      </div>
    </div>
  </section>