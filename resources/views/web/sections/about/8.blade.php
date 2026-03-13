
      <!-- Social networks (Carousel on narrow screens) -->
      <section class="container py-5 my-2 text-center my-md-4 my-lg-5">
        <h2 class="mb-4 h1">{{ x_('We Have Social Networks', 'about') }}</h2>
        <p class="pb-2 mb-5 fs-lg text-muted">{{ x_('Follow us and keep up to date with the freshest news!', 'about') }}</p>
        <div class="swiper" data-swiper-options='{
          "slidesPerView": 2,
          "pagination": {
            "el": ".swiper-pagination",
            "clickable": true
          },
          "breakpoints": {
            "500": {
              "slidesPerView": 3
            },
            "650": {
              "slidesPerView": 4
            },
            "900": {
              "slidesPerView": 5
            },
            "1100": {
              "slidesPerView": 6
            }
          }
        }'>
          <div class="swiper-wrapper">

            <!-- Item -->
            <div class="swiper-slide">
              <div class="text-center position-relative border-end mx-n1">
                <a href="#" class="btn btn-icon btn-secondary btn-facebook btn-lg stretched-link" aria-label="Facebook">
                  <i class="bx bxl-facebook"></i>
                </a>
                <div class="pt-4">
                  <h6 class="mb-1">{{ x_('Facebook', 'about') }}</h6>
                  <p class="mb-0 fs-sm text-muted">{{ x_('Bzns Book', 'about') }}</p>
                </div>
              </div>
            </div>

            <!-- Item -->
            <div class="swiper-slide">
              <div class="text-center position-relative border-end mx-n1">
                <a href="#" class="btn btn-icon btn-secondary btn-instagram btn-lg stretched-link" aria-label="Instagram">
                  <i class="bx bxl-instagram"></i>
                </a>
                <div class="pt-4">
                  <h6 class="mb-1">{{ x_('Instagram', 'about') }}</h6>
                  <p class="mb-0 fs-sm text-muted">@BznsBook</p>
                </div>
              </div>
            </div>

            <!-- Item -->
            <div class="swiper-slide">
              <div class="text-center position-relative border-end mx-n1">
                <a href="#" class="btn btn-icon btn-secondary btn-twitter btn-lg stretched-link" aria-label="Twitter">
                  <i class="bx bxl-twitter"></i>
                </a>
                <div class="pt-4">
                  <h6 class="mb-1">{{ x_('Twitter', 'about') }}</h6>
                  <p class="mb-0 fs-sm text-muted">@BznsBook</p>
                </div>
              </div>
            </div>

            <!-- Item -->
            <div class="swiper-slide">
              <div class="text-center position-relative border-end mx-n1">
                <a href="#" class="btn btn-icon btn-secondary btn-linkedin btn-lg stretched-link" aria-label="LinkedIn">
                  <i class="bx bxl-linkedin"></i>
                </a>
                <div class="pt-4">
                  <h6 class="mb-1">{{ x_('LinkedIn', 'about') }}</h6>
                  <p class="mb-0 fs-sm text-muted">{{ x_('Bzns Book Inc.', 'about') }}</p>
                </div>
              </div>
            </div>

            <!-- Item -->
            <div class="swiper-slide">
              <div class="text-center position-relative border-end mx-n1">
                <a href="#" class="btn btn-icon btn-secondary btn-youtube btn-lg stretched-link" aria-label="Twitter">
                  <i class="bx bxl-youtube"></i>
                </a>
                <div class="pt-4">
                  <h6 class="mb-1">{{ x_('YouTube', 'about') }}</h6>
                  <p class="mb-0 fs-sm text-muted">{{ x_('Bzns Book', 'about') }}</p>
                </div>
              </div>
            </div>

            <!-- Item -->
            <div class="swiper-slide">
              <div class="text-center position-relative border-end mx-n1">
                <a href="#" class="btn btn-icon btn-secondary btn-dribbble btn-lg stretched-link" aria-label="Dribbble">
                  <i class="bx bxl-dribbble"></i>
                </a>
                <div class="pt-4">
                  <h6 class="mb-1">{{ x_('Dribbble', 'about') }}</h6>
                  <p class="mb-0 fs-sm text-muted">{{ x_('Bzns Book', 'about') }}</p>
                </div>
              </div>
            </div>
          </div>

          <!-- Pagination (bullets) -->
          <div class="bottom-0 pt-3 mt-4 swiper-pagination position-relative"></div>
        </div>
      </section>