     <!-- Links + Contact form -->
     <section class="pt-5 position-relative bg-secondary">
        <div class="container pt-5 position-relative zindex-2">
          <!-- Breadcrumb -->
          <nav class="pb-3 mb-2 pt-lg-4 mb-sm-3" aria-label="breadcrumb">
            <ol class="mb-0 breadcrumb">
              <li class="breadcrumb-item">
                <a href="{{ route('pages.home') }}"><i class="bx bx-home-alt fs-lg me-1"></i>Home</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">Contacts v.2</li>
            </ol>
          </nav>

          <div class="row">

            <!-- Contact links -->
            <div class="pb-4 mb-2 col-xl-4 col-lg-5 pb-sm-5 mb-sm-0">
              <div class="pe-lg-4 pe-xl-0">
                <h1 class="pb-3 pb-md-4 mb-lg-5">Contact Us</h1>
                <div class="pb-3 d-flex align-items-start mb-sm-1 mb-md-3">
                  <div class="flex-shrink-0 p-3 bg-light text-primary rounded-circle fs-3 lh-1">
                    <i class="bx bx-envelope"></i>
                  </div>
                  <div class="ps-3 ps-sm-4">
                    <h2 class="pb-1 mb-2 h4">Email us</h2>
                    <p class="mb-2">Please feel free to drop us a line. We will respond as soon as possible.</p>
                    <div class="px-0 btn btn-link btn-lg">
                      Leave a message
                      <i class="bx bx-right-arrow-alt lead ms-2"></i>
                    </div>
                  </div>
                </div>
                <div class="d-flex align-items-start">
                  <div class="flex-shrink-0 p-3 bg-light text-primary rounded-circle fs-3 lh-1">
                    <i class="bx bx-group"></i>
                  </div>
                  <div class="ps-3 ps-sm-4">
                    <h2 class="pb-1 mb-2 h4">Careers</h2>
                    <p class="mb-2">Sit ac ipsum leo lorem magna nunc mattis maecenas non vestibulum.</p>
                    <div class="px-0 btn btn-link btn-lg">
                      Send an application
                      <i class="bx bx-right-arrow-alt lead ms-2"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Contact form -->
            <div class="col-xl-6 col-lg-7 offset-xl-2">
              <div class="py-3 shadow-lg card border-light p-sm-4 p-md-5">
                <div class="top-0 bg-dark position-absolute start-0 w-100 h-100 rounded-3 d-none d-dark-mode-block"></div>
                <div class="card-body position-relative zindex-2">
                  <h2 class="pb-3 mb-4 card-title">Get Online Consultation</h2>
                  <form class="row g-4 needs-validation" novalidate>
                    <div class="col-12">
                      <label for="fn" class="form-label fs-base">Full name</label>
                      <input type="text" class="form-control form-control-lg" id="fn" required>
                      <div class="invalid-feedback">Please enter your full name!</div>
                    </div>
                    <div class="col-12">
                      <label for="email" class="form-label fs-base">Email address</label>
                      <input type="email" class="form-control form-control-lg" id="email" required>
                      <div class="invalid-feedback">Please provid a valid email address!</div>
                    </div>
                    <div class="col-12">
                      <label for="specialist" class="form-label fs-base">Specialist</label>
                      <select class="form-select form-select-lg" id="specialist" required>
                        <option value="" selected disabled>Choose a specialist</option>
                        <option value="Therapist">Therapist</option>
                        <option value="Dentist">Dentist</option>
                        <option value="Cardiologist">Cardiologist</option>
                        <option value="Pediatrician">Pediatrician</option>
                        <option value="Gynecologist">Gynecologist</option>
                        <option value="Surgeon">Surgeon</option>
                      </select>
                      <div class="invalid-feedback">Choose a specialist from the list!</div>
                    </div>
                    <div class="col-sm-6">
                      <label for="date" class="form-label fs-base">Date</label>
                      <input type="text" class="form-control form-control-lg" id="date" data-format='{"date": true, "datePattern": ["m", "d"]}' placeholder="mm/dd" required>
                      <div class="invalid-feedback">Enter a date!</div>
                    </div>
                    <div class="col-sm-6">
                      <label for="time" class="form-label fs-base">Time</label>
                      <input type="text" class="form-control form-control-lg" id="time" data-format='{"time": true, "timePattern": ["h", "m"]}' placeholder="hh:mm" required>
                      <div class="invalid-feedback">Enter a time!</div>
                    </div>
                    <div class="pt-2 col-12 pt-sm-3">
                      <button type="submit" class="btn btn-lg btn-primary w-100 w-sm-auto">Make an appointment</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="bottom-0 position-absolute start-0 w-100 bg-light" style="height: 8rem;"></div>
      </section>