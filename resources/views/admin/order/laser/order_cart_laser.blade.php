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
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-11">
                        <h1 align="center">Your order</h1>
                        <form action="{{url('/admin/order/search/customer')}}" method="POST">
                            {{csrf_field()}}
                            <div hidden class="form-group{{ $errors->has('phone') ? ' has-error' : "" }}">
                                Phone : <input type="text" value="{{$customer->phone}}" class="form-control"
                                               name="phone" placeholder="Enter You phone">
                            </div>
                            <div align="right">
                                <input type="submit" class="btn btn-primary" value="back">
                            </div>
                        </form>
                    </div>
                </div>
            <div class="row">
                <div class="col-md-12">
                    @if(count($cart) > 0)
                        <div align="center" class="col-md-12 table-responsive">
                            <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th class="center">file</th>
                                    <th class="center">Control</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($cart as $carts)
                                    <tr>
                                        <td class="center">{{ $carts->count_file }}</td>
                                        <td class="center">
                                            @permission('order-cart-laser-edit')
                                            <a href="{{ url('/admin/order/edit/cart/laser/'.$carts->id)}}"><i class="ace-icon fa fa-edit bigger-120  edit" data-id="">edit</i></a>
                                            @endpermission
                                            @permission('order-cart-laser-cansal')
                                            <a href="{{ url('/admin/order/cansal/cart/laser/'.$carts->id)}}"><i class="ace-icon fa fa-remove bigger-120  edit" data-id="">cansal</i></a>
                                            @endpermission
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="empty" align="center">There is no Data to show</div>
                    @endif
                </div>
                </div>
                </div>
            </div>
    </div>
    @include('includes.admin.footer')
    @include('includes.admin.scripts')
</div>
</body>
</html>