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
            <div align="center"><h3>{{ __('Buy type') }}</h3></div>
            <form autocomplete="off" action="{{url('/admin/order/search/customer')}}" enctype="multipart/form-data" method="POST">
                {{csrf_field()}}
                <div hidden class="form-group{{ $errors->has('phone') ? ' has-error' : "" }}">
                    Phone : <input type="text" value="{{$cart->customer->phone}}" class="form-control"
                                   name="phone" placeholder="Enter You phone">
                </div>
                <div align="right">
                    <input type="submit" class="btn btn-primary" value="back">
                </div>
            </form>
            @if(count($cart_file) > 0)
                <div align="center" class="col-md-12 table-responsive">
                    <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th class="center">name</th>
                            <th class="center">Control</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cart_file as $carts)
                            <tr>
                                <td class="center">{{ $carts->filename }}</td>
                                <td class="center">
                                    @permission('order-cart-file-cansal')
                                    <a href="{{ url('/admin/order/cansal/cart/file/'.$carts->id)}}"><i class="ace-icon fa fa-remove bigger-120  edit" data-id="">cansal</i></a>
                                    @endpermission
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
            <form autocomplete="off" id="add" action="{{url('admin/order/update/cart/laser/'.$cart->id)}}" method="POST">
                {{csrf_field()}}
                <input type="file" name="filename[]" multiple='multiple' />
                <div align="center">
                <input type="submit" class="btn btn-primary" value="edit">
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