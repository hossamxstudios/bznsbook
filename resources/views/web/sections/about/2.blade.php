    <!-- Benefits (features) -->
    <section class="container mt-3 mb-5 pt-lg-5" id="benefits">
        <div class="pt-3 swiper" data-swiper-options='{
          "slidesPerView": 1,
          "pagination": {
            "el": ".swiper-pagination",
            "clickable": true
          },
          "breakpoints": {
            "500": {
              "slidesPerView": 2
            },
            "991": {
              "slidesPerView": 3
            }
          }
        }'>
          <div class="pt-4 swiper-wrapper">

            <!-- Item -->
            <div class="px-2 swiper-slide border-end-lg">
              <div class="text-center">
                <img src="assets/img/landing/digital-agency/icons/idea.svg" width="48" alt="{{ x_('Bulb icon', 'about') }}" class="mx-auto mb-4 d-block">
                <h4 class="pb-1 mb-2">{{ x_('Creative Solutions', 'about') }}</h4>
                <p class="mx-auto" style="max-width: 336px;">{{ x_('Sed morbi nulla pulvinar lectus tempor vel euismod accumsan.', 'about') }}</p>
              </div>
            </div>

            <!-- Item -->
            <div class="px-2 swiper-slide border-end-lg">
              <div class="text-center">
                <img src="assets/img/landing/digital-agency/icons/award.svg" width="48" alt="{{ x_('Award icon', 'about') }}" class="mx-auto mb-4 d-block">
                <h4 class="pb-1 mb-2">{{ x_('Award Winning', 'about') }}</h4>
                <p class="mx-auto" style="max-width: 336px;">{{ x_('Sit facilisis dolor arcu, fermentum vestibulum arcu elementum imperdiet.', 'about') }}</p>
              </div>
            </div>

            <!-- Item -->
            <div class="px-2 swiper-slide">
              <div class="text-center">
                <img src="assets/img/landing/digital-agency/icons/team.svg" width="48" alt="{{ x_('Team icon', 'about') }}" class="mx-auto mb-4 d-block">
                <h4 class="pb-1 mb-2">{{ x_('Team of Professionals', 'about') }}</h4>
                <p class="mx-auto" style="max-width: 336px;">{{ x_('Nam venenatis urna aenean quis feugiat et senectus turpis.', 'about') }}</p>
              </div>
            </div>
          </div>

          <!-- Pagination (bullets) -->
          <div class="pt-2 mt-4 swiper-pagination position-relative pt-sm-3"></div>
        </div>
      </section>