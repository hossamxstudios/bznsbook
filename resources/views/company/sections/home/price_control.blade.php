<div class="row">
    <div class="col-xl-6 col-sm-6">
        <div class="card  ribbon-box">
            <div class="card-body pl-3 pr-3 pt-2 pb-2">
                <div class="ribbon ribbon-warning ribbon-shape">سعر الذهب</div>
                <form action="{{ route('owner.goldPrice.update') }} " method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row align-items-center">
                        <div class="col-sm-12 col-xs-12" style="padding-left:23%;">
                            <div class="input-group">

                                <input type="number" step="0.001" name="price" class="form-control" placeholder="Enter gold price " required value="{{ $carat?->price }}">
                                <input type="hidden" class="form-control" name="id" value="{{$carat?->id}}">
                                <button type="submit" class="btn btn-warning"> تغيير</button>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-xl-6 col-sm-6">
        <div class="card  ribbon-box">
            <div class="card-body pl-3 pr-3 pt-2 pb-2">
                <div class="ribbon ribbon-success ribbon-shape">سعر الدولار</div>
                <form action="{{ route('owner.dollarPrice.update') }} " method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row align-items-center ribbon-content ">
                        <div class="col-sm-12 col-xs-12" style="padding-left:23%;">
                            <div class="input-group">
                                <input type="hidden" class="form-control" name="id" value="{{$currency?->id}}">
                                <input type="number" step="0.001" name="price" class="form-control" placeholder="Enter currency name" required value="{{ $currency?->price }}">
                                <button class="btn btn-success" type="button" id="inputGroupFileAddon04">تغيير </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

