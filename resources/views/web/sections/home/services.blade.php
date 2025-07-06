<section class="container pb-md-4 pb-lg-5">
    <h1 class="pb-4">Our Services</h1>
    <div class="row">
        <!-- Item -->
        @foreach ($services as $service)
            <div class="py-4 my-2 col-md-4">
                <a href="javascript:void(0);" class="pt-5 border-0 shadow-sm card card-hover h-100 text-decoration-none px-sm-3 px-md-0 px-lg-3 pb-sm-3 pb-md-0 pb-lg-3 me-xl-2">
                    <div class="pt-3 card-body">
                        <div class="top-0 p-3 d-inline-block bg-dark shadow-primary rounded-3 position-absolute translate-middle-y">
                        @if ($service->getFirstMediaUrl('icons'))
                            <img src="{{ $service->getFirstMediaUrl('icons') }}" class="m-1 d-block" width="40" alt="Icon">
                        @endif
                        </div>
                        <h2 class="h4 d-inline-flex align-items-center">
                        {{ $service->name }}
                        <i class="bx bx-right-arrow-circle text-primary fs-3 ms-2"></i>
                        </h2>
                        <p class="mb-0 fs-md text-body">{{ $service->details }}</p>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</section>
