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
        <div class="row">
            <div class="col-md-1">
            </div>
            <div class="col-md-10">
                <br>
                <div align="center"><h3>{{ __('Buy Print') }}</h3></div>
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
                                <th class="center">file name</th>
                                <th class="center">Control</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cart_file as $carts)
                                <tr>
                                    <td class="center">{{ $carts->filename }}</td>
                                    <td class="center">
                                        @permission('order-cart-file-cansal')
                                        <a href="{{ url('/admin/order/cansal/cart/file/'.$carts->id)}}"><i
                                                    class="ace-icon fa fa-remove bigger-120  edit" data-id="">cansal</i></a>
                                        @endpermission
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
                <form autocomplete="off" id="add" action="{{url('admin/order/update/cart/print/'.$cart->id)}}" enctype="multipart/form-data"
                      method="POST">
                    {{csrf_field()}}
                    {{method_field('PATCH')}}
                    <div class="form-group">
                        type : <select id="type_id" type="type_id" class="form-control" name="type_id">
                            @foreach($type as $key => $mytype)
                                <option value="{{$key}}" @if($cart->type_id == $key)){ selected } @else{
                                        }@endif > {{$mytype}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        size : <select id="size_id" type="size_id" class="form-control" name="size_id">
                            @foreach($size as $key => $mysize)
                                <option value="{{$key}}" @if($cart->size_id == $key)){ selected } @else{
                                        }@endif > {{$mysize}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        color : <select id="color_id" type="color_id" class="form-control" name="color_id">
                            @foreach($color as $key => $mycolor)
                                <option value="{{$key}}" @if($cart->color_id == $key)){ selected } @else{
                                        }@endif > {{$mycolor}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        machine : <select id="machine_id" type="machine_id" class="form-control" name="machine_id">
                            @foreach($machine as $key => $mymachine)
                                <option value="{{$key}}" @if($cart->machine_id == $key)){ selected } @else{
                                        }@endif > {{$mymachine}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group{{ $errors->has('quantity') ? ' has-error' : "" }}">
                        quantity : <input type="text" value="{{$cart->quantity}}" class="form-control" name="quantity"
                                          placeholder="Enter You quantity">
                    </div>
                    <input type="file" name="filename[]" multiple='multiple'/>
                    <div align="center">
                        <input type="submit" class="btn btn-primary" value="edit">
                    </div>
                </form>
            </div>
            <div class="col-md-1">
            </div>
        </div>
    </div>
    @include('includes.admin.footer')
    @include('includes.admin.scripts')

    {!! JsValidator::formRequest('App\Http\Requests\admin\Order\OrderAddPrintRequest','#add') !!}
</div>
</body>
</html>