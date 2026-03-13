<div class="row">
    <div class="col-xl-6 col-sm-6">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('owner.goldPrice.update') }} " method="POST" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label for="price" class="form-label"> {{ x_('Gold Price :', 'general') }}  </label>
                        <input type="number" step="0.001" name="price" class="form-control" placeholder="{{ x_('Enter gold price', 'general') }}" required value="{{ $carat?->price }}">
                        <input type="hidden" class="form-control" name="id" value="{{$carat?->id}}"><br>
                        <button type="submit" class="btn btn-warning"> {{ x_('Update', 'general') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-xl-6 col-sm-6">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('owner.dollarPrice.update') }} " method="POST" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label for="price" class="form-label"> {{ x_('Dollar Price', 'general') }}  </label>
                        <input type="number" step="0.001" name="price" class="form-control" placeholder="{{ x_('Enter currency name', 'general') }}" required value="{{ $currency?->price }}">
                        <input type="hidden" class="form-control" name="id" value="{{$currency?->id}}"><br>
                        <button type="submit" class="btn btn-success"> {{ x_('Update', 'general') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-sm-6">
        <div class="card">
            <div class="card-body">

                <p class="fs-md text-muted mb-0"> {{ x_('Avrage Waiting Time', 'general') }} </p>

                <div class="row mt-4 align-items-end">
                    <div class="col-lg-6">
                        <h3 class="mb-4"><span class="counter-value text-warning" data-target=" {{$orders_pending_count}}"> 0</span> {{ x_('Pending Orders', 'general') }} </h3>
                        {{-- <p class="text-success mb-0"><i class="bi bi-arrow-up me-1"></i>  </p> --}}
                    </div>
                    {{-- <div class="col-lg-6">
                        <div id="session_chart" data-colors='["--tb-primary", "--tb-secondary"]' class="apex-charts m-n3 mt-n4" dir="ltr"></div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-sm-6">
        <div class="card">
            <div class="card-body">

                <p class="fs-md text-muted mb-0"> {{ x_('Pending Call Requests', 'general') }} </p>

                <div class="row mt-4 align-items-end">
                    <div class="col-lg-6">
                        <h3 class="mb-4"><span class="counter-value text-success" data-target=" {{$orders_paid_count}}"> 0</span> {{ x_('Paid Orders', 'general') }} </h3>
                        {{-- <p class="text-success mb-0"><i class="bi bi-arrow-up me-1"></i>  </p> --}}
                    </div>
                    {{-- <div class="col-lg-6">
                        <div id="session_chart" data-colors='["--tb-primary", "--tb-secondary"]' class="apex-charts m-n3 mt-n4" dir="ltr"></div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-sm-6">
        <div class="card">
            <div class="card-body">
                {{-- <div class="dropdown float-end">
                    <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="text-muted fs-lg"><i class="mdi mdi-dots-vertical align-middle"></i></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="#">{{ x_('Today', 'general') }}</a>
                        <a class="dropdown-item" href="#">{{ x_('Last Week', 'general') }}</a>
                        <a class="dropdown-item" href="#">{{ x_('Last Month', 'general') }}</a>
                        <a class="dropdown-item" href="#">{{ x_('Current Year', 'general') }}</a>
                    </div>
                </div> --}}
                <p class="fs-md text-muted mb-0"> {{ x_('Clients', 'general') }} </p>

                <div class="row mt-4 align-items-end">
                    <div class="col-lg-6">
                        <h3 class="mb-4"><span class="counter-value" data-target=" {{($clients_count)}}"> 0</span> client </h3>
                        {{-- <p class="text-success mb-0"><i class="bi bi-arrow-up me-1"></i>  </p> --}}
                    </div>
                    {{-- <div class="col-lg-6">
                        <div id="session_chart" data-colors='["--tb-primary", "--tb-secondary"]' class="apex-charts m-n3 mt-n4" dir="ltr"></div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    <!--end col-->
    <div class="col-xl-4 col-sm-6">
        <div class="card">
            <div class="card-body">
                {{-- <div class="dropdown float-end">
                    <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="text-muted fs-lg"><i class="mdi mdi-dots-vertical align-middle"></i></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="#">{{ x_('Today', 'general') }}</a>
                        <a class="dropdown-item" href="#">{{ x_('Last Week', 'general') }}</a>
                        <a class="dropdown-item" href="#">{{ x_('Last Month', 'general') }}</a>
                        <a class="dropdown-item" href="#">{{ x_('Current Year', 'general') }}</a>
                    </div>
                </div> --}}
                <p class="fs-md text-muted mb-0">{{ x_('Category', 'general') }}</p>

                <div class="row mt-4 align-items-end">
                    <div class="col-lg-6">
                        <h3 class="mb-4"><span class="counter-value" data-target=" {{($categories_count)}}"> 0 </span> {{ x_('Category', 'general') }}  </h3>
                        {{-- <p class="text-success mb-0"><i class="bi bi-arrow-up me-1"></i> 13% Last Month</p> --}}
                    </div>
                    {{-- <div class="col-lg-6">
                        <div id="visti_duration_chart" data-colors='["--tb-primary", "--tb-secondary"]' class="apex-charts m-n3 mt-n4" dir="ltr"></div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    <!--end col-->

    <!--end col-->
    <div class="col-xl-4 col-sm-6">
        <div class="card">
            <div class="card-body">
                {{-- <div class="dropdown float-end">
                    <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="text-muted fs-lg"><i class="mdi mdi-dots-vertical align-middle"></i></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="#">{{ x_('Today', 'general') }}</a>
                        <a class="dropdown-item" href="#">{{ x_('Last Week', 'general') }}</a>
                        <a class="dropdown-item" href="#">{{ x_('Last Month', 'general') }}</a>
                        <a class="dropdown-item" href="#">{{ x_('Current Year', 'general') }}</a>
                    </div>
                </div> --}}
                <p class="fs-md text-muted mb-0"> {{ x_('Gold Product', 'general') }}</p>

                <div class="row mt-4 align-items-end">
                    <div class="col-lg-6">
                        <h3 class="mb-4"><span class="counter-value" data-target="{{($gold_products_count)}}">0</span> {{ x_('Gold Product', 'general') }}</h3>
                        {{-- <p class="text-danger mb-0"><i class="bi bi-arrow-down me-1"></i> {{ x_('07.26% Last Week', 'general') }}</p> --}}
                    </div>
                    {{-- <div class="col-lg-6">
                        <div id="impressions_chart" data-colors='["--tb-secondary"]' class="apex-charts m-n3 mt-n4" dir="ltr"></div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    <!--end col-->
    <div class="col-xl-4 col-sm-6">
        <div class="card">
            <div class="card-body">
                {{-- <div class="dropdown float-end">
                    <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="text-muted fs-lg"><i class="mdi mdi-dots-vertical align-middle"></i></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="#">{{ x_('Today', 'general') }}</a>
                        <a class="dropdown-item" href="#">{{ x_('Last Week', 'general') }}</a>
                        <a class="dropdown-item" href="#">{{ x_('Last Month', 'general') }}</a>
                        <a class="dropdown-item" href="#">{{ x_('Current Year', 'general') }}</a>
                    </div>
                </div> --}}
                <p class="fs-md text-muted mb-0">{{ x_('Diamond Product', 'general') }}</p>

                <div class="row mt-4 align-items-end">
                    <div class="col-lg-8">
                        <h3 class="mb-4"><span class="counter-value" data-target="{{$diamond_products_count}}">0</span> {{ x_('Diamond Product', 'general') }} </h3>
                        {{-- <p class="text-success mb-0"><i class="bi bi-arrow-up me-1"></i> 13% Last Month</p> --}}
                    </div>
                    {{-- <div class="col-lg-6">
                        <div id="views_chart" data-colors='["--tb-primary"]' class="apex-charts m-n3 mt-n4" dir="ltr"></div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>



</div>
