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
                        <h1 align="center">Order Print Finish</h1>
                    </div>
                </div>
            <div class="row">
                <div class="col-md-12">
                    @if(count($order_print) > 0)
                        <div align="center" class="col-md-12 table-responsive">
                            <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th class="center">Order number</th>
                                    <th class="center">Customer name</th>
                                    <th class="center">Customer number</th>
                                    <th class="center">user create</th>
                                    <th class="center">user start</th>
                                    <th class="center">user end</th>
                                    <th class="center">Machine</th>
                                    <th class="center">Total Cost</th>
                                    @permission('chasier-print-discarded')
                                    @foreach($order_print as $orderprint)
                                        @if($orderprint->status==4)
                                            <th class="center">Controll</th>
                                        @endif
                                    @endforeach
                                    @endpermission
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($order_print as $orderprint)
                                    <tr>
                                        <td class="center">{{ $orderprint->order_id }}</td>
                                        <td class="center">{{ $orderprint->order->customer->name }}</td>
                                        <td class="center">{{ $orderprint->order->customer->phone }}</td>
                                        <td class="center">{{ $orderprint->order->user->name }}</td>
                                        <td class="center">{{ $orderprint->user_start->name }}</td>
                                        <td class="center">{{ $orderprint->user_end->name }}</td>
                                        <td class="center">{{ $orderprint->machine->name }}</td>
                                        <td class="center">{{ $orderprint->total_cost }}</td>
                                        @permission('chasier-print-discarded')
                                        @if($orderprint->status==4)
                                            <td class="center">
                                                <a href="{{ url('/admin/chasier/print/discarded/'.$orderprint->id)}}"><i class="ace-icon fa fa-remove bigger-120  edit" data-id="">discarded</i></a>
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