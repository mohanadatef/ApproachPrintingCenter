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
                        <h1 align="center">Order Information</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div align="center" class="col-md-12 table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th class="center">Order number</th>
                                    <th class="center">Customer name</th>
                                    <th class="center">Customer number</th>
                                    <th class="center">user create</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="center">{{ $order->id }}</td>
                                    <td class="center">{{ $order->customer->name }}</td>
                                    <td class="center">{{ $order->customer->phone }}</td>
                                    <td class="center">{{ $order->user->name }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-11">
                                <h1 align="center">Laser Information</h1>
                            </div>
                        </div>
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
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-md-11">
                                <h1 align="center">Print Information</h1>
                            </div>
                        </div>
                        @if(count($order_print) > 0)
                            <div align="center" class="col-md-12 table-responsive">
                                <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th class="center">Order</th>
                                        <th class="center">Customer name</th>
                                        <th class="center">Customer number</th>
                                        <th class="center">create by</th>
                                        <th class="center">pay by</th>
                                        <th class="center">Machine</th>
                                        <th class="center">Size</th>
                                        <th class="center">Material</th>
                                        <th class="center">Color</th>
                                        <th class="center">Total Cost</th>
                                        <th class="center">discount</th>
                                        <th class="center">paid</th>
                                        <th class="center">rest</th>
                                        <th class="center">kind</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($order_print as $orderprint)
                                        <tr>
                                            <td class="center">{{ $orderprint->order_id }}</td>
                                            <td class="center">{{ $orderprint->order->customer->name }}</td>
                                            <td class="center">{{ $orderprint->order->customer->phone }}</td>
                                            <td class="center">{{ $orderprint->order->user->name }}</td>
                                            <td class="center">{{ $orderprint->user_pay->name }}</td>
                                            <td class="center">{{ $orderprint->machine->name }}</td>
                                            <td class="center">{{ $orderprint->size->name }}</td>
                                            <td class="center">{{ $orderprint->type->name }}</td>
                                            <td class="center">{{ $orderprint->color->name }}</td>
                                            <td class="center">{{ $orderprint->total_cost }}</td>
                                            <td class="center">{{ $orderprint->discount }}</td>
                                            <td class="center">{{ $orderprint->paid }}</td>
                                            <td class="center">{{ $orderprint->rest }}</td>
                                            @if($orderprint->kind_pay == 1)
                                                <td class="center">visa</td>
                                            @elseif($orderprint->kind_pay == 0)
                                                <td class="center">chas</td>
                                            @endif
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-md-11">
                                <h1 align="center">Type Information</h1>
                            </div>
                        </div>
                        @if(count($order_type) > 0)
                            <div align="center" class="col-md-12 table-responsive">
                                <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th class="center">Order</th>
                                        <th class="center">Customer name</th>
                                        <th class="center">Customer number</th>
                                        <th class="center">create by</th>
                                        <th class="center">pay by</th>
                                        <th class="center">Size</th>
                                        <th class="center">Material</th>
                                        <th class="center">Total Cost</th>
                                        <th class="center">discount</th>
                                        <th class="center">paid</th>
                                        <th class="center">rest</th>
                                        <th class="center">kind</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($order_type as $ordertype)
                                        <tr>
                                            <td class="center">{{ $ordertype->order_id }}</td>
                                            <td class="center">{{ $ordertype->order->customer->name }}</td>
                                            <td class="center">{{ $ordertype->order->customer->phone }}</td>
                                            <td class="center">{{ $ordertype->order->user->name }}</td>
                                            <td class="center">{{ $ordertype->user_pay->name }}</td>
                                            <td class="center">{{ $ordertype->size->name }}</td>
                                            <td class="center">{{ $ordertype->type->name }}</td>
                                            <td class="center">{{ $ordertype->total_cost }}</td>
                                            <td class="center">{{ $ordertype->discount }}</td>
                                            <td class="center">{{ $ordertype->paid }}</td>
                                            <td class="center">{{ $ordertype->rest }}</td>
                                            @if($ordertype->kind_pay == 1)
                                                <td class="center">visa</td>
                                            @elseif($ordertype->kind_pay == 0)
                                                <td class="center">chas</td>
                                            @endif
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('includes.admin.footer')
    @include('includes.admin.scripts')
    {!! JsValidator::formRequest('App\Http\Requests\admin\Order\OrderStartLaserRequest','#start') !!}
</div>
</body>
</html>