


    <!-- Back to top button -->
    <a href="#top" class="btn-scroll-top" data-scroll>
        <span class="btn-scroll-top-tooltip text-muted fs-sm me-2">Top</span>
        <i class="btn-scroll-top-icon bx bx-chevron-up"></i>
      </a>

      <script src="{{ URL::asset('assets/jquery/dist/jquery.min.js') }}"></script>

      <!-- Vendor Scripts -->
      <script src="{{ URL::asset('assets/vendor/jarallax/dist/jarallax.min.js') }}"></script>
      <script src="{{ URL::asset('assets/vendor/rellax/rellax.min.js') }}"></script>
      <script src="{{ URL::asset('assets/vendor/parallax-js/dist/parallax.min.js') }}"></script>
      <script src="{{ URL::asset('assets/vendor/@lottiefiles/lottie-player/dist/lottie-player.js') }}"></script>
      <script src="{{ URL::asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
      <script src="{{ URL::asset('assets/vendor/lightgallery/lightgallery.min.js') }}"></script>
      <script src="{{ URL::asset('assets/vendor/lightgallery/plugins/video/lg-video.min.js') }}"></script>
      <script src="{{ URL::asset('assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
      <script src="{{ URL::asset('assets/vendor/shufflejs/dist/shuffle.min.js') }}"></script>


      <script src="{{ URL::asset('vendors/select2/dist/js/select2.full.min.js') }}"></script>
      <script src="{{ URL::asset('dist/js/select2-data.js') }}"></script>
      <!-- Main Theme Script -->
      <script src="{{ URL::asset('assets/js/theme.min.js') }}"></script>
      <script src="{{ URL::asset('dist/js/jquery.star-rating-svg.min.js') }}"></script>

      <script src="{{ URL::asset('vendors/sweetalert2/dist/sweetalert2.min.js') }}"></script>
      <script src="{{ URL::asset('dist/js/sweetalert-data.js') }}"></script>

      @if (session('success'))
      <script>
          Swal.fire({
              title: "{{ session('success') }}",
              icon: 'success',
              timer: 2000,
              timerProgressBar: true,
              showConfirmButton: false
          });
      </script>
      @endif
      @if (session('error'))
      <script>
          Swal.fire({
              title: "{{ session('error') }}",
              icon: 'error',
              timer: 2000,
              timerProgressBar: true,
              showConfirmButton: false
          });
      </script>
      @endif

