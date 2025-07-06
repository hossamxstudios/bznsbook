      <!-- Sidebar (User info + Account menu) -->
<aside class="pb-5 col-lg-3 col-md-4 border-end mt-n5">
  <div class="top-0 position-sticky">
    <div class="pt-5 text-center">
      <div class="pt-5 mx-auto mt-2 mb-3 d-table position-relative mt-lg-4">
        @if(auth('client')->user()->getFirstMediaUrl('profile'))
          <img src="{{ auth('client')->user()->getFirstMediaUrl('profile') }}" class="d-block rounded-circle" width="120" height="120" alt="{{ auth('client')->user()->name }}">
        @else
          <img src="{{ asset('assets/img/avatar/placeholder.jpg') }}" class="d-block rounded-circle" width="120" height="120" alt="{{ auth('client')->user()->name }}">
        @endif
        <form action="{{ route('client.picture.update') }}" method="POST" enctype="multipart/form-data" id="profile-picture-form">
          @csrf
          <input type="file" name="profile_picture" id="profile-picture-input" class="visually-hidden" accept="image/*">
          <button type="button" id="change-picture-btn" class="bottom-0 mt-4 bg-white border shadow-sm btn btn-icon btn-light btn-sm rounded-circle position-absolute end-0" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Change picture" aria-label="Change picture">
            <i class="bx bx-refresh"></i>
          </button>
        </form>
      </div>
      <h2 class="mb-1 h5">{{ auth('client')->user()->name }}</h2>
      <p class="pb-3 mb-3">{{ auth('client')->user()->email }}</p>
      <button type="button" class="mb-3 btn btn-secondary w-100 d-md-none mt-n2" data-bs-toggle="collapse" data-bs-target="#account-menu">
        <i class="bx bxs-user-detail fs-xl me-2"></i>
        Account menu
        <i class="bx bx-chevron-down fs-lg ms-1"></i>
      </button>
      <div id="account-menu" class="list-group list-group-flush collapse d-md-block">
        <a href="/profile" class="list-group-item list-group-item-action d-flex align-items-center @if(request()->is('profile')) active @endif">
          <i class="opacity-60 bx bx-cog fs-xl me-2"></i>
          Account Details
        </a>
        <a href="/profile/portfolio" class="list-group-item list-group-item-action d-flex align-items-center @if(request()->is('profile/portfolio')) active @endif">
            <i class="opacity-60 bx bx-collection fs-xl me-2"></i>
            My Portfolio
          </a>
        <a href="/profile/projects" class="list-group-item list-group-item-action d-flex align-items-center @if(request()->is('profile/projects')) active @endif">
          <i class="opacity-60 bx bx-lock-alt fs-xl me-2"></i>
          Applied Projects
        </a>
        <a href="/profile/project-requests" class="list-group-item list-group-item-action d-flex align-items-center @if(request()->is('profile/project-requests')) active @endif">
            <i class="opacity-60 bx bx-chat fs-xl me-2"></i>
            Project Requests
        </a>
        <a href="/profile/material" class="list-group-item list-group-item-action d-flex align-items-center @if(request()->is('profile/material')) active @endif">
            <i class="opacity-60 bx bx-bookmark fs-xl me-2"></i>
            My References Material
        </a>
        <a href="/profile/subscription" class="list-group-item list-group-item-action d-flex align-items-center @if(request()->is('profile/subscription')) active @endif">
            <i class="opacity-60 bx bx-credit-card-front fs-xl me-2"></i>
            My Subscription
        </a>
        {{-- <a href="account-security.html" class="list-group-item list-group-item-action d-flex align-items-center">
          <i class="opacity-60 bx bx-lock-alt fs-xl me-2"></i>
          Security
        </a>
        <a href="account-notifications.html" class="list-group-item list-group-item-action d-flex align-items-center">
          <i class="opacity-60 bx bx-bell fs-xl me-2"></i>
          Notifications
        </a>
        <a href="account-messages.html" class="list-group-item list-group-item-action d-flex align-items-center">
          <i class="opacity-60 bx bx-chat fs-xl me-2"></i>
          Messages
        </a>
        <a href="account-saved-items.html" class="list-group-item list-group-item-action d-flex align-items-center">
          <i class="opacity-60 bx bx-bookmark fs-xl me-2"></i>
          Saved Items
        </a>
        <a href="account-collections.html" class="list-group-item list-group-item-action d-flex align-items-center">
          <i class="opacity-60 bx bx-collection fs-xl me-2"></i>
          My Collections
        </a>
        <a href="account-payment.html" class="list-group-item list-group-item-action d-flex align-items-center">
          <i class="opacity-60 bx bx-credit-card-front fs-xl me-2"></i>
          Payment Details
        </a> --}}
        <form method="POST" action="{{ route('client.logout') }}" id="logout-form">
          @csrf
          <button type="submit" class="bg-transparent border-0 list-group-item list-group-item-action d-flex align-items-center w-100 text-start">
            <i class="opacity-60 bx bx-log-out fs-xl me-2"></i>
            Sign Out
          </button>
        </form>
      </div>
    </div>
  </div>
</aside>
