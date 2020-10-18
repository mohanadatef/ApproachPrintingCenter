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
                        <h1 align="center">Order Laser Information</h1>
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
                                    <th class="center">user start</th>
                                    <th class="center">user end</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="center">{{ $order_laser->order_id }}</td>
                                    <td class="center">{{ $order_laser->order->customer->name }}</td>
                                    <td class="center">{{ $order_laser->order->customer->phone }}</td>
                                    <td class="center">{{ $order_laser->order->user->name }}</td>
                                    <td class="center">{{ $order_laser->user_start->name }}</td>
                                    <td class="center">{{ $order_laser->user_end->name }}</td>
                                </tr>
                                </tbody>
                            </table>
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th class="center">time start</th>
                                    <th class="center">time end</th>
                                    <th class="center">total time in  system</th>
                                    <th class="center">total cost in system</th>
                                    <th class="center">price machine</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="center">{{ $order_laser->time_start }}</td>
                                    <td class="center">{{ $order_laser->time_end }}</td>
                                    <td class="center">{{ $order_laser->total_time_system }}</td>
                                    <td class="center">{{ $order_laser->total_cost_system }}</td>
                                    <td class="center">{{ $order_laser->machine->price }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <br>
                    </div>
                    @if($order_laser->status == 2)
                        <div align="center">
                            <div class="col-md-1">
                            </div>
                            <div class="col-md-10">

                                <form autocomplete="off" action="{{url('admin/order/laser/cashier/'.$order_laser->id)}}" method="POST">
                                    {{csrf_field()}}
                                    {{method_field('patch')}}
                                    <div class="row">
                                    <div class="col-md-6">
                                    <div class="form-group{{ $errors->has('total_time_user') ? ' has-error' : "" }}">
                                        total time user : <input type="text" value="{{$order_laser->total_time_user}}" class="form-control" name="total_time_user" placeholder="Enter You total time user">
                                    </div>
                                    <div class="form-group{{ $errors->has('total_cost_user') ? ' has-error' : "" }}">
                                        total cost user : <input type="text" value="{{$order_laser->total_cost_user}}" class="form-control" name="total_cost_user" placeholder="Enter You total time user">
                                    </div>
                                    </div>
                                        <div class="col-md-6">
                                    <div class="form-group{{ $errors->has('notes') ? ' has-error' : "" }}">
                                        notes : <textarea type="text"  class="form-control" name="notes" placeholder="Enter You notes">{{$order_laser->notes}}</textarea>
                                    </div>
                                        </div>
                                    </div>
                                    <input type="submit" class="btn btn-primary" value="finish">
                                </form>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @include('includes.admin.footer')
    @include('includes.admin.scripts')
</div>
</body>
</html>