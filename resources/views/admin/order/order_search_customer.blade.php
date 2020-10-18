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
            <div class="col-md-1">
            </div>
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-11">
                        <h1 align="center">Information Customer</h1>
                    </div>
                    <br>
                </div>
                <div class="row">
                    <div class="col-md-11">
                        <div class="form-group">
                            name : <input type="text" disabled value="{{$customer->name}}" class="form-control" name="name">
                        </div>
                        <div class="form-group">
                            email : <input type="email" disabled value="{{$customer->email}}" class="form-control" name="email">
                        </div>
                        <div class="form-group">
                            phone : <input type="number" disabled value="{{$customer->phone}}" class="form-control" name="phone">
                        </div>
                        <div class="form-group">
                            place : <input type="text"  disabled value="{{$customer->place}}" class="form-control" name="place">
                        </div>
                        <div class="form-group">
                            wallet : <input type="text"  disabled value="{{$customer->wallet}}" class="form-control" name="wallet">
                        </div>
                        @permission('customer-create')
                        <a href="{{  url('/admin/order/customer/create') }}" class="btn btn-sm btn-primary">Add customer</a>
                        @endpermission
                        @permission('customer-edit')
                        <a href="{{  url('/admin/order/customer/edit/'.$customer->id) }}" class="btn btn-sm btn-primary">Edit customer</a>
                        @endpermission
                        @permission('order-search-customer')
                        <a href="{{  url('/admin/order/start') }}" class="btn btn-sm btn-primary">search customer</a>
                        @endpermission
                        <br>
                        <br>
                        @permission('order-buy-type')
                        <a href="{{  url('/admin/order/buy/material/'.$customer->id) }}" class="btn btn-sm btn-primary">material</a>
                        @endpermission
                        @permission('order-buy-print')
                        <a href="{{  url('/admin/order/buy/print/'.$customer->id) }}" class="btn btn-sm btn-primary">print</a>
                        @endpermission
                        @permission('order-buy-laser')
                        <a href="{{  url('/admin/order/buy/laser/'.$customer->id) }}" class="btn btn-sm btn-primary">laser</a>
                        @endpermission
                        <br>
                        <br>
                        @permission('order-cart-type-check')
                        <a href="{{  url('/admin/order/show/cart/material/'.$customer->id) }}" class="btn btn-sm btn-primary">Check Cart material</a>
                        @endpermission
                        @permission('order-cart-print-check')
                        <a href="{{  url('/admin/order/show/cart/print/'.$customer->id) }}" class="btn btn-sm btn-primary">Check Cart Print</a>
                        @endpermission
                        @permission('order-cart-laser-check')
                        <a href="{{  url('/admin/order/show/cart/laser/'.$customer->id) }}" class="btn btn-sm btn-primary">Check Cart Laser</a>
                        @endpermission
                        <br>
                        <br>
                        @permission('order-finish')
                        <form action="{{url('/admin/order/finish/'.$customer->id)}}" method="get">
                                <input type="submit" class="btn btn-primary" value="Finish Order">
                        </form>
                        @endpermission
                        <br>
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