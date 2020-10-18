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
                                    <th class="center">Order</th>
                                    <th class="center">Customer name</th>
                                    <th class="center">Customer number</th>
                                    <th class="center">create by</th>
                                    <th class="center">start by</th>
                                    <th class="center">end by</th>
                                    <th class="center">pay by</th>
                                    <th class="center">Machine</th>
                                    <th class="center">Total Cost</th>
                                    <th class="center">discount</th>
                                    <th class="center">paid</th>
                                    <th class="center">rest</th>
                                    <th class="center">kind</th>
                                    <th class="center">Notes</th>
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
                                        <td class="center">{{ $orderlaser->user_end->name }}</td>
                                        <td class="center">{{ $orderlaser->user_pay->name }}</td>
                                        <td class="center">{{ $orderlaser->machine->name }}</td>
                                        <td class="center">{{ $orderlaser->total_cost }}</td>
                                        <td class="center">{{ $orderlaser->discount }}</td>
                                        <td class="center">{{ $orderlaser->paid }}</td>
                                        <td class="center">{{ $orderlaser->rest }}</td>
                                        @if($orderlaser->kind_pay == 1)
                                        <td class="center">visa</td>
                                        @elseif($orderlaser->kind_pay == 0)
                                        <td class="center">chas</td>
                                        @endif
                                        <td class="center">{{ $orderlaser->notes }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $order_laser->links() }}
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