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
                        <h1 align="center">Order Laser Finish</h1>
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
                                    <th class="center">Machine</th>
                                    <th class="center">Total Cost</th>
                                    <th class="center">Notes</th>
                                    @permission('chasier-laser-discarded')
                                    @foreach($order_laser as $orderlaser)
                                        @if($orderlaser->status==5)
                                            <th class="center">Controll</th>
                                        @endif
                                    @endforeach
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
                                        <td class="center">{{ $orderlaser->machine->name }}</td>
                                        <td class="center">{{ $orderlaser->total_cost }}</td>
                                        <td class="center">{{ $orderlaser->notes }}</td>
                                        @permission('chasier-laser-discarded')
                                        @if($orderlaser->status==5)
                                            <td class="center">
                                                <a href="{{ url('/admin/chasier/laser/discarded/'.$orderlaser->id)}}"><i class="ace-icon fa fa-remove bigger-120  edit" data-id="">discarded</i></a>
                                            </td>
                                        @endif
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