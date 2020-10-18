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
                        <h1 align="center">Order Laser</h1>
                    </div>
                </div>
            <div class="row">
                <div class="col-md-12">
                    @if(count($order_laser) > 0)
                        <div align="center" class="col-md-12 table-responsive">
                            <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th class="center">Order number</th>
                                    <th class="center">Customer name</th>
                                    <th class="center">Customer number</th>
                                    <th class="center">user create</th>
                                    <th class="center">user start</th>
                                    @permission('laser-information')
                                    <th class="center">information</th>
                                    @endpermission
                                    @permission('laser-end')
                                    <th class="center">end</th>
                                    @endpermission
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($order_laser as $orderlaser)
                                    <tr>
                                        <td class="center">{{ $orderlaser->order_id }}</td>
                                        <td class="center">{{ $orderlaser->order->customer->name }}</td>
                                        <td class="center">{{ $orderlaser->order->customer->phone }}</td>
                                        <td class="center">{{ $orderlaser->order->user->name }}</td>
                                        <td class="center">{{ $orderlaser->user_start->name }}</td>
                                        @permission('laser-information')
                                        <td class="center">
                                            <a href="{{ url('/admin/order/laser/information/'.$orderlaser->id)}}"><i class="ace-icon fa fa-edit bigger-120  edit" data-id="">information</i></a>
                                        </td>
                                        @endpermission
                                        @permission('laser-end')
                                        <td class="center">
                                            <a href="{{ url('/admin/order/laser/end/'.$orderlaser->id)}}"><i class="ace-icon fa fa-edit bigger-120  edit" data-id="">end</i></a>
                                        </td>
                                        @endpermission
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