<div class="d-flex flex-1 overflow-hidden">
    <div data-simplebar class="nicescroll-bar" id="tab_1">
        <div class="container-fluid px-5 pt-5">
            <div class="d-flex justify-content-between align-items-center mb-5">
                <h5 class="mb-0">Deal Statictics</h5>
            </div>
            <div class="row">
                <div class="col-lg-9 mb-4">
                    <div class="row">
                        <div class="col-xxl-12 mb-4">
                            <div class="card card-flush rounded-8 mb-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-6 wdg-1">
                                            <div class="row gx-0">
                                                <div class="col-sm-6 p-0">
                                                    <div class="p-sm-3  pb-4 border-end border-xl-0 border-bottom border-light">
                                                        <h6>Won Deals</h6>
                                                        <div class="d-flex align-items-center">
                                                            <span class="d-block fs-3 fw-medium text-dark mb-0">{{$total_won_deals}}</span>
                                                        </div>
                                                        <span>Deals</span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 p-0">
                                                    <div class="p-sm-3  pb-4 border-end border-xl-0 border-bottom border-light">
                                                        <h6>Total Deals</h6>
                                                        <div class="d-flex align-items-center">
                                                            <span class="d-block fs-3 fw-medium text-dark mb-0">{{$total_deals}}</span>
                                                        </div>
                                                        <span>Deals</span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 p-0">
                                                    <div class="p-sm-3  pb-4 border-bottom border-light">
                                                        <h6>Lost Deals</h6>
                                                        <div class="d-flex align-items-center">
                                                            <span class="d-block fs-3 fw-medium text-dark mb-0">{{$total_lost_deals}}</span>
                                                        </div>
                                                        <span>Deals</span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 p-0">
                                                    <div class="p-sm-3  pb-4 border-bottom border-light">
                                                        <h6>Open Deals</h6>
                                                        <div class="d-flex align-items-center">
                                                            <span class="d-block fs-3 fw-medium text-dark mb-0">{{$total_pending_deals}}</span>

                                                        </div>
                                                        <span>Deals</span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 p-0">
                                                    <div class="p-sm-3  pb-4 border-end border-light">
                                                        <h6>Paid Deals</h6>
                                                        <div class="d-flex align-items-center">
                                                            <span class="d-block fs-3 fw-medium text-dark mb-0">{{$paid_deals}}</span>
                                                        </div>
                                                        <span>Deals</span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 p-0">
                                                    <div class="p-sm-3  pb-4">
                                                        <h6>Unpaid Deals</h6>
                                                        <div class="d-flex align-items-center">
                                                            <span class="d-block fs-3 fw-medium text-dark mb-0">{{$unpaid_deals}}</span>
                                                        </div>
                                                        <span>Deals</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="d-flex align-items-center justify-content-between pt-3">
                                                <h6>Overview</h6>
                                            </div>
                                            <div id="pie_chart_1"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-sm-6 mb-md-0 mb-4">
                            <div class="card card-flush rounded-8 mb-0 h-100">
                                <div class="card-body">
                                    <h3>${{$total_won_amount}}</h3>
                                    <span class="d-inline-flex">Total Won Deals</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 mb-md-0 mb-4">
                            <div class="card card-flush rounded-8 mb-0 h-100">
                                <div class="card-body">
                                    <h3>${{$total_pending_amount}}</h3>
                                    <span class="d-inline-flex">Total Open Deals</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="card card-flush rounded-8 mb-0 h-100">
                                <div class="card-body">
                                    <h3>${{$total_lost_amount}}</h3>
                                    <span class="d-inline-flex">Total Lost Deals</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 mb-4">
                    <div class="card card-flush card-simple rounded-8 mb-0 h-100">
                        <div class="card-header card-header-action">
                            <h6>Deal Statictics</h6>
                        </div>
                        <div class="card-body">
                            <div id="radial_chart_4"></div>
                            <div class="fs-2 text-center mt-2">Total</div>
                            <div class="px-xxl-3 px-2">
                                <div class="d-flex justify-content-center text-center position-relative mt-5 mb-4">
                                    @php
                                        $valid_total_deals = $paid_deals + $unpaid_deals? $paid_deals+ $unpaid_deals : 1;
                                    @endphp
                                    <div>
                                        <div>Paid</div>
                                        <div class="fs-4 text-primary fw-medium">{{ number_format($paid_deals * 100/$valid_total_deals , 2) }}%</div>
                                    </div>
                                    <div class="v-separator"></div>

                                    <div>
                                        <div>Unpaid</div>
                                        <div class="fs-4 text-dark fw-medium">{{ number_format($unpaid_deals * 100/$valid_total_deals , 2) }}%</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-md-4 mb-3">
                    <div class="card card-flush card-simple rounded-8 mb-0">
                        <div class="card-header card-header-action">
                            <h6>Latest Delas</h6>
                        </div>
                        <div class="card-body">
                            <div class="contact-list-view">
                                <table id="datable_1" class="table wrap mb-5">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th class="">Stage</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($latest_deals as $deal)
                                            <tr>
                                                <td>
                                                    <div class="text-high-em">{{$deal->name}}</div>
                                                </td>
                                                <td class="text-truncate">{{$deal->stage->name}}</td>
                                                <td>
                                                    <div id="sparkline_chart_1">${{$deal->amount}}</div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-md-4 mb-3">
                    <div class="card card-flush card-simple rounded-8 mb-0">
                        <div class="card-header card-header-action">
                            <h6>Companies</h6>
                        </div>
                        <div class="card-body">
                            <div class="contact-list-view">
                                <table  id="datable_11" class="table wrap w-100 mb-5">
                                    <thead>
                                        <tr>
                                            <th class="w-50">Name</th>
                                            <th class="w-50">Industry</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($latest_companies as $company)
                                        <tr>
                                            <td>
                                                <div class="text-high-em">{{$company->name}}</div>
                                                <div class="fs-7"><a href="#" class="table-link-text link-medium-em">{{$company->website}}</a></div>
                                            </td>
                                            <td class="text-truncate">{{$company->industry?->name}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
