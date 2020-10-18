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
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    name : <input type="text" disabled value="{{$customer->name}}" class="form-control"
                                                  name="name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    email : <input type="email" disabled value="{{$customer->email}}"
                                                   class="form-control" name="email">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    phone : <input type="number" disabled value="{{$customer->phone}}"
                                                   class="form-control" name="phone">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    place : <input type="text" disabled value="{{$customer->place}}"
                                                   class="form-control" name="place">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            wallet : <input type="text" disabled value="{{$customer->wallet}}" class="form-control"
                                            name="wallet">
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-11">
                                    <h1 align="center">Order</h1>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    @if(count($order) > 0)
                                        <div align="center" class="col-md-12 table-responsive">
                                            <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                                <thead>
                                                <tr>
                                                    <th class="center">Order number</th>
                                                    <th class="center">user create</th>
                                                    <th class="center">Total Cost</th>
                                                    <th class="center">Information</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($order as $myorder)
                                                    <tr>
                                                        <td class="center">{{ $myorder->id }}</td>
                                                        <td class="center">{{ $myorder->user->name }}</td>
                                                        <td class="center">{{ $myorder->total_cost }}</td>
                                                        @permission('order-information')
                                                        <td class="center">
                                                            <a href="{{ url('/admin/order/information/customer/'.$myorder->id)}}"><i class="ace-icon fa fa-remove bigger-120  edit" data-id="">information</i></a>
                                                        </td>
                                                        @endpermission
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                            {{ $order->links() }}
                                        </div>
                                    @else
                                        <div class="empty" align="center">There is no Order to show</div>
                                    @endif
                                </div>
                            </div>
                        </div>
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