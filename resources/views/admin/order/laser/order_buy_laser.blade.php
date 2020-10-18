<!DOCTYPE html>
<html>
<head>
    @include('includes.admin.header')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    @include('includes.admin.main-header')
    @include('includes.admin.main-sidebar')
    <div class="content-wrapper">
        @include('includes.admin.error')
        <div class="col-md-12">
            <br>
            <div align="center"><h3>{{ __('Buy Laser') }}</h3></div>
            <form autocomplete="off" action="{{url('/admin/order/search/customer')}}" method="POST">
                {{csrf_field()}}
                <div hidden class="form-group{{ $errors->has('phone') ? ' has-error' : "" }}">
                    Phone : <input type="text" value="{{$customer->phone}}" class="form-control"
                                   name="phone" placeholder="Enter You phone">
                </div>
                <div align="right">
                    <input type="submit" class="btn btn-primary" value="back">
                </div>
            </form>
            <form autocomplete="off" id="add" action="{{url('admin/order/add/cart/laser/'.$customer->id)}}" enctype="multipart/form-data" method="POST">
                {{csrf_field()}}
                <input type="file" name="filename[]" multiple='multiple' />
                <div align="center">
                <input type="submit" class="btn btn-primary" value="buy">
                </div>
            </form>
        </div>
    </div>
    @include('includes.admin.footer')
    @include('includes.admin.scripts')
    {!! JsValidator::formRequest('App\Http\Requests\admin\Order\OrderAddLaserRequest','#add') !!}
</div>
</body>
</html>