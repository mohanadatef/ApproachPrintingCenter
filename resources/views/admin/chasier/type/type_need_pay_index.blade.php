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
                        <h1 align="center">Order Material Finish</h1>
                    </div>
                </div>
            <div class="row">
                <div class="col-md-12">
                    @if(count($order_type) > 0)
                        <div align="center" class="col-md-12 table-responsive">
                            <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th class="center">Order number</th>
                                    <th class="center">Customer name</th>
                                    <th class="center">Customer number</th>
                                    <th class="center">user create</th>
                                    <th class="center">Total Cost</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($order_type as $ordertype)
                                    <tr>
                                        <td class="center">{{ $ordertype->order_id }}</td>
                                        <td class="center">{{ $ordertype->order->customer->name }}</td>
                                        <td class="center">{{ $ordertype->order->customer->phone }}</td>
                                        <td class="center">{{ $ordertype->order->user->name }}</td>
                                        <td class="center">{{ $ordertype->total_cost }}</td>
                                        <td class="center">
                                            @permission('chasier-pay')
                                        <td class="center">
                                            <a href="{{ url('/admin/chasier/material/pay/'.$ordertype->id)}}"><i class="ace-icon fa fa-edit bigger-120  edit" data-id="">pay</i></a>
                                        </td>
                                        @endpermission
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="empty" align="center">There is no Order to show</div>
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