<!doctype html>
@include('web.main.html')
<head>
    <meta charset="utf-8" />
    <title> Bzns Book </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('web.main.meta')
</head>
<body>
    <main class="page-wrapper">
        @include('web.main.navbar')
        <section class="container pt-5">
            <div class="row">
                @include('web.sections.profile.side')
                @include('web.sections.profile.material')
            </div>
        </section>
        @include('web.main.footer')
    </main>
    @include('web.main.scripts')
    @yield('scripts')
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        // Profile picture upload functionality
        const changePictureBtn = document.getElementById('change-picture-btn');
        const profilePictureInput = document.getElementById('profile-picture-input');
        const profilePictureForm = document.getElementById('profile-picture-form');

        if (changePictureBtn && profilePictureInput && profilePictureForm) {
          changePictureBtn.addEventListener('click', function() {
            profilePictureInput.click();
          });

          profilePictureInput.addEventListener('change', function() {
            if (profilePictureInput.files.length > 0) {
              profilePictureForm.submit();
            }
          });
        }
      });
    </script>
</body>
</html>
