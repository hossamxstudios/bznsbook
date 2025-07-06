<!doctype html>
@include('owner.main.html')
<head>
    <meta content="Minimal Admin & Dashboard Template" name="description">
    <title>Kenooz - Owners</title>
    @include('owner.main.meta')
</head>
<style>
    .page-content{
           padding: 0px !important;
           margin: 0px !important;
    }
    @media print{
    }
</style>
<body>
    <div id="layout-wrapper">
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">

                    <div class="row justify-content-center">
                        <div class="col-xxl-9">
                            <div class="card overflow-hidden" id="invoice">
                                <div class="invoice-effect-top position-absolute start-0">
                                    {{-- <svg version="1.2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 764 182" width="764" height="182">
                                        <title>&lt;Group&gt;</title>
                                        <g id="&lt;Group&gt;">
                                            <g id="&lt;Group&gt;">
                                                <path id="&lt;Path&gt;" style="fill: var(--tb-light);" d="m-6.6 177.4c17.5 0.1 35.1 0 52.8-0.4 286.8-6.6 537.6-77.8 700.3-184.6h-753.1z" />
                                            </g>
                                            <g id="&lt;Group&gt;">
                                                <path id="&lt;Path&gt;" style="fill: var(--tb-secondary);" d="m-6.6 132.8c43.5 2.1 87.9 2.7 132.9 1.7 246.9-5.6 467.1-59.2 627.4-142.1h-760.3z" />
                                            </g>
                                            <g id="&lt;Group&gt;" style="opacity: .5">
                                                <path id="&lt;Path&gt;" style="fill: var(--tb-primary);" d="m-6.6 87.2c73.2 7.4 149.3 10.6 227.3 8.8 206.2-4.7 393.8-42.8 543.5-103.6h-770.8z" />
                                            </g>
                                        </g>
                                    </svg> --}}
                                </div>
                                <div class="card-body z-1 position-relative">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <img src="{{ URL::asset('/logo.png') }}" class="card-logo" alt="logo light" height="50" role="img">
                                        </div>
                                        <div class="flex-shrink-0 mt-sm-0 mt-3">
                                            {{-- <h6><span class="text-muted fw-normal">Legal Registration No:</span> <span id="legal-register-no">32654 9851</span></h6> --}}
                                            <h6><span class="text-muted fw-normal">Email:</span> <span id="email">info@kenooz.co</span></h6>
                                            <h6><span class="text-muted fw-normal">Website:</span> <a href="https://kenooz.co" class="link-primary" target="_blank" id="website">www.kenooz.co</a></h6>
                                            <h6 class="mb-0"><span class="text-muted fw-normal">Contact No: </span><span id="contact-no"> +(01) 234 6789</span></h6>
                                        </div>
                                    </div>
                                    <div class="mt-5 pt-4">
                                        <div class="row g-3">
                                            <div class="col-md-12">
                                                <p class="text-muted mb-2 text-uppercase">Client Name</p>
                                                <h5 class="fs-md mb-0">#<span id="invoice-no">{{ $sell->client?->name }} - {{ $sell->client?->email }}</span></h5>
                                            </div>
                                            <div class="col-lg col-6">
                                                <p class="text-muted mb-2 text-uppercase">Invoice No</p>
                                                <h5 class="fs-md mb-0">#<span id="invoice-no">{{ $sell->id }}</span></h5>
                                            </div>
                                            <div class="col-lg col-6">
                                                <p class="text-muted mb-2 text-uppercase">Date</p>
                                                <h5 class="fs-md mb-0"><span id="invoice-date">{{ date('Y-m-d',strtotime($sell->created_at)) }}</span></h5>
                                            </div>
                                            {{-- <div class="col-lg col-6">
                                                <p class="text-muted mb-2 text-uppercase">Payment Status</p>
                                                @if ($sell->is_paid)
                                                    <span class="badge bg-success-subtle text-success fs-xxs" id="payment-status">Paid</span>
                                                @else
                                                    <span class="badge bg-danger-subtle text-danger fs-xxs" id="payment-status">Unpaid</span>
                                                @endif
                                            </div> --}}
                                            {{-- <div class="col-lg col-6">
                                                <p class="text-muted mb-2 text-uppercase">Pyament Method</p>
                                                <h5 class="fs-md mb-0"><span id="total-amount">{{ $sell->account?->method?->name }}</span></h5>
                                            </div> --}}
                                        </div>
                                    </div>

                                    <div class="table-responsive mt-4">
                                        <table class="table table-borderless text-center table-nowrap align-middle mb-0">
                                            <thead>
                                                <tr class="table-light">
                                                    <th scope="col" style="width: 50px;">#</th>
                                                    <th scope="col" class="text-start">Product Details</th>
                                                    <th scope="col" class="text-start">Category</th>
                                                    <th scope="col" class="text-start">Karat</th>
                                                    <th scope="col" class="text-start">Weight</th>
                                                    <th scope="col" class="text-end">Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody id="products-list">
                                                @if ($sell->gold_sell_items->count() == 0)
                                                    <tr>
                                                        <td colspan="5">No Items</td>
                                                    </tr>
                                                @else
                                                    @php $total = 0; @endphp
                                                    @foreach ($sell->gold_sell_items->where('is_returned',0) as $item)
                                                        <tr>
                                                            <th scope="row">{{ $item->id }}</th>
                                                            <td class="text-start fw-semibold">{{ $item->gold ? $item->gold?->name :( $item->kind?->name .' ('. $item->carat?->carat. 'K)' ) }}</td>
                                                            <td class="text-start fw-semibold">{{ $item->kind?->name }}</td>
                                                            <td class="text-start fw-semibold">{{ $item->carat?->carat }} K</td>
                                                            <td class="text-start"> <span class="text-muted fs-13">({{ $item->grams }}g)</span></td>
                                                            <td class="text-end">{{ $item->price }} LE</td>
                                                        </tr>
                                                        @php $total += $item->price; @endphp
                                                    @endforeach
                                                @endif
                                            </tbody>
                                        </table><!--end table-->
                                    </div>
                                    <div class="border-top border-top-dashed mt-2" id="products-list-total">
                                        <table class="table table-borderless table-nowrap align-middle mb-0 ms-auto" style="width:250px">
                                            <tbody>
                                                <tr>
                                                    <td>Sub Total</td>
                                                    <td class="text-end">{{ $total }} LE</td>
                                                </tr>
                                                {{-- <tr>
                                                    <td>Estimated Tax <small class="text-muted">({{ (round(($sell->cash - $total)/$sell->cash,2) + 0.02  ) *100  }}%)</small></td>
                                                    <td class="text-end">{{ ($sell->cash - $total)    }} LE</td>
                                                </tr>
                                                <tr class="border-top border-top-dashed fs-15">
                                                    <th scope="row">Total Amount</th>
                                                    <th class="text-end">{{ $sell->cash }} LE</th>
                                                </tr> --}}
                                            </tbody>
                                        </table>
                                    </div>
                                    {{-- <div class="mt-3">
                                        <h6 class="text-muted text-uppercase fw-semibold mb-3">Payment Details:</h6>
                                        <p class="text-muted mb-1">Payment Method: <span class="fw-medium" id="payment-method">Mastercard</span></p>
                                        <p class="text-muted mb-1">Card Holder: <span class="fw-medium" id="card-holder-name">Jennifer Mayert</span></p>
                                        <p class="text-muted mb-1">Card Number: <span class="fw-medium" id="card-number">xxx xxxx xxxx 1234</span></p>
                                        <p class="text-muted mb-0">Total Amount: <span class="fw-medium">$</span><span id="card-total-amount">2,050.18</span></p>
                                    </div> --}}
                                    {{-- <div class="mt-4 mb-4">
                                        <div class="alert alert-danger mb-0">
                                            <span class="fw-semibold">NOTES:</span>
                                            <span id="note">All accounts are to be paid within 7 days from receipt of invoice. To be paid by cheque or
                                                credit card or direct payment online. If account is not paid within 7
                                                days the credits details supplied as confirmation of work undertaken
                                                will be charged the agreed quoted fee noted above.
                                            </span>
                                        </div>
                                    </div> --}}
                                    <div>
                                        <p class="mb-4 pt-4 pb-2"><b>Congratulations on your recent purchase!</b> It has been our pleasure to serve you, and we hope we see you again soon.</p>

                                        <div class="invoice-signature text-center">
                                            <img src="assets/images/invoice-signature.svg" alt="" id="sign-img" height="30">
                                            <h6 class="mb-0 mt-3">Authorized Sign</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="invoice-effect-top position-absolute end-0" style="transform: rotate(180deg); bottom: -80px;">
                                    {{-- <svg version="1.2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 764 182" width="764" height="182">
                                        <title>&lt;Group&gt;</title>
                                        <g id="&lt;Group&gt;">
                                            <g id="&lt;Group&gt;">
                                                <path id="&lt;Path&gt;" style="fill: var(--tb-light);" d="m-6.6 177.4c17.5 0.1 35.1 0 52.8-0.4 286.8-6.6 537.6-77.8 700.3-184.6h-753.1z" />
                                            </g>
                                            <g id="&lt;Group&gt;">
                                                <path id="&lt;Path&gt;" style="fill: var(--tb-secondary);" d="m-6.6 132.8c43.5 2.1 87.9 2.7 132.9 1.7 246.9-5.6 467.1-59.2 627.4-142.1h-760.3z" />
                                            </g>
                                            <g id="&lt;Group&gt;" style="opacity: .5">
                                                <path id="&lt;Path&gt;" style="fill: var(--tb-primary);" d="m-6.6 87.2c73.2 7.4 149.3 10.6 227.3 8.8 206.2-4.7 393.8-42.8 543.5-103.6h-770.8z" />
                                            </g>
                                        </g>
                                    </svg> --}}
                                </div>
                            </div>
                            <!--end card-->
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>
    @include('owner.main.scripts')
</body>
</html>
