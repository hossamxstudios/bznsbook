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
                @include('web.sections.profile.main')
            </div>
        </section>
        @include('web.main.footer')
    </main>
    @include('web.main.scripts')
    @yield('scripts')
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        // Old profile picture upload functionality (keeping for backward compatibility)
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
        
        // New profile picture upload with preview
        const profileUploadBtn = document.getElementById('profile-upload-btn');
        const profilePicInput = document.getElementById('profile_picture');
        const profilePreview = document.getElementById('profile-preview');
        
        if (profileUploadBtn && profilePicInput) {
          profileUploadBtn.addEventListener('click', function() {
            profilePicInput.click();
          });
          
          profilePicInput.addEventListener('change', function() {
            if (profilePicInput.files && profilePicInput.files[0]) {
              const reader = new FileReader();
              
              reader.onload = function(e) {
                // Clear previous content
                profilePreview.innerHTML = '';
                
                // Create image element
                const img = document.createElement('img');
                img.src = e.target.result;
                img.className = 'w-100 h-100';
                img.style.objectFit = 'cover';
                
                // Append to preview container
                profilePreview.appendChild(img);
              }
              
              reader.readAsDataURL(profilePicInput.files[0]);
            }
          });
        }
        
        // Cover photo upload with preview
        const coverUploadBtn = document.getElementById('cover-upload-btn');
        const coverPhotoInput = document.getElementById('cover_photo');
        const coverPreview = document.getElementById('cover-preview');
        
        if (coverUploadBtn && coverPhotoInput) {
          coverUploadBtn.addEventListener('click', function() {
            coverPhotoInput.click();
          });
          
          coverPhotoInput.addEventListener('change', function() {
            if (coverPhotoInput.files && coverPhotoInput.files[0]) {
              const reader = new FileReader();
              
              reader.onload = function(e) {
                // Clear previous content
                coverPreview.innerHTML = '';
                
                // Create image element
                const img = document.createElement('img');
                img.src = e.target.result;
                img.className = 'w-100 h-100';
                img.style.objectFit = 'cover';
                
                // Append to preview container
                coverPreview.appendChild(img);
              }
              
              reader.readAsDataURL(coverPhotoInput.files[0]);
            }
          });
        }
      });
    </script>

</body>
</html>
