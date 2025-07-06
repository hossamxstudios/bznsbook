<!-- Hero section with layer parallax gfx -->
<section class="py-5 position-relative">

    <!-- Gradient BG -->
    <div class="top-0 opacity-10 position-absolute start-0 w-100 h-100"
        style="background:linear-gradient(90deg, #000000 0%, #ffffff 70%, #00000091 100%) !important;"></div>

    <!-- Content -->
    <div class="container position-relative zindex-2 py-lg-4">
        <div class="row">
            <div class="col-lg-6 d-flex flex-column pt-lg-4 pt-xl-5">
                <h5 class="my-2">Welcome!</h5>
                <h1 class="mb-4 display-3">Find The <span class="text-primary">Best Partner </span> with No Limits</h1>
                <p class="mb-5 fs-lg">Enjoy our great selection of Premium companies from all over the world. Choose from more than 25K business partner and expand your business now!</p>
            </div>
            <div class="col-lg-6">
                <!-- Parallax gfx -->
                <div class="mx-auto parallax me-lg-0" style="max-width: 648px;">
                    <div class="parallax-layer" data-depth="0.1">
                        <img src="assets/img/landing/online-courses/hero/layer01.png" alt="Layer">
                    </div>
                    <div class="parallax-layer" data-depth="0.13">
                        <img src="assets/img/landing/online-courses/hero/layer02.png" alt="Layer">
                    </div>
                    <div class="parallax-layer zindex-5" data-depth="-0.12">
                        <img src="assets/img/landing/online-courses/hero/layer03.png" alt="Layer">
                    </div>
                    <div class="parallax-layer zindex-3" data-depth="0.27">
                        <img src="assets/img/landing/online-courses/hero/layer04.png" alt="Layer">
                    </div>
                    <div class="parallax-layer zindex-1" data-depth="-0.18">
                        <img src="assets/img/landing/online-courses/hero/layer05.png" alt="Layer">
                    </div>
                    <div class="parallax-layer zindex-1" data-depth="0.1">
                        <img src="assets/img/landing/online-courses/hero/layer06.png" alt="Layer">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <form class="mb-5 d-flex" action="{{ route('pages.companies') }}">
                <div class="input-group d-block d-sm-flex input-group-lg me-3">
                    <select class="form-select w-25" name="subcategory">
                        <option value="" selected >Please Select Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->name }}" disabled>- {{ $category->name }} -</option>
                            @foreach ($category->subcategories as $subcategory)
                                <option value="{{ $subcategory->name }}" @if(request()->subcategory == $subcategory->name) selected @endif>{{ $subcategory->name }}</option>
                            @endforeach
                        @endforeach
                    </select>
                    @php $isDisabled = !auth('client')->check() || (auth('client')->check() && !auth('client')->user()->hasActiveSubscription()); @endphp
                    <input type="text" class="w-25 form-control {{ $isDisabled ? 'opacity-75' : '' }}" placeholder="{{ $isDisabled ? 'Subscribe to search' : 'Search Service...' }}" name="search" value="{{ request()->search ?? '' }}" {{ $isDisabled ? 'disabled' : '' }} {{ $isDisabled ? 'title="You need an active subscription to use search"' : '' }}>
                    <select class="w-25 form-select {{ $isDisabled ? 'opacity-75' : '' }}" name="service" {{ $isDisabled ? 'disabled' : '' }} {{ $isDisabled ? 'title="You need an active subscription to filter by service"' : '' }}>
                        <option value="" selected >{{ $isDisabled ? 'Premium Feature' : 'Please Select Service' }}</option>
                        @foreach ($services as $service)
                            <option value="{{ $service->name }}" @if(request()->service == $service->name) selected @endif>{{ $service->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-icon btn-primary btn-lg" aria-label="Search">
                    <i class="bx bx-search"></i>
                </button>
            </form>
        </div>
    </div>
</section>
