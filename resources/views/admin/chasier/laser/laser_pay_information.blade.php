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
                                    <th class="center">notes</th>
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
                                    <td class="center">{{ $order_laser->noutes }}</td>
                                </tr>
                                </tbody>
                            </table>
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th class="center">time start</th>
                                    <th class="center">time end</th>
                                    <th class="center">total time in system</th>
                                    <th class="center">total time in user</th>
                                    <th class="center">total cost in system</th>
                                    <th class="center">total cost in user</th>
                                    <th class="center">machine</th>
                                    <th class="center">price machine</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="center">{{ $order_laser->time_start }}</td>
                                    <td class="center">{{ $order_laser->time_end }}</td>
                                    <td class="center">{{ $order_laser->total_time_system }}</td>
                                    <td class="center">{{ $order_laser->total_time_user }}</td>
                                    <td class="center">{{ $order_laser->total_cost_system }}</td>
                                    <td class="center">{{ $order_laser->total_cost_user }}</td>
                                    <td class="center">{{ $order_laser->machine->name }}</td>
                                    <td class="center">{{ $order_laser->machine->price }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <br>
                    </div>
                    <div align="center">
                        <div class="col-md-1">
                        </div>
                        <div class="col-md-10">

                            <form autocomplete="off"
                                  action="{{url('admin/chasier/laser/pay/finish/'.$order_laser->id)}}" method="POST">
                                {{csrf_field()}}
                                {{method_field('patch')}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('total_cost') ? ' has-error' : "" }}">
                                            cost : <input type="text" value="{{$order_laser->total_cost}}"
                                                          class="form-control" disabled name="total_cost"
                                                          placeholder="Enter You total cost">
                                        </div>
                                        <div class="form-group{{ $errors->has('wallet') ? ' has-error' : "" }}">
                                            wallet customer : <input type="text"
                                                                     value="{{$order_laser->order->customer->wallet}}"
                                                                     disabled class="form-control" name="paid"
                                                                     placeholder="Enter You discount">
                                        </div>
                                        <div class="form-group{{ $errors->has('total') ? ' has-error' : "" }}">
                                            @if((($order_laser->total_cost * (100 - $order_laser->discount)/100) - $order_laser->order->customer->wallet) > 0)
                                                total : <input type="text"
                                                               value="{{(($order_laser->total_cost * (100 - $order_laser->discount)/100) - $order_laser->order->customer->wallet)}}"
                                                               disabled class="form-control" name="total"
                                                               placeholder="Enter You total">
                                            @else
                                                total : <input type="text"
                                                               value="{{0}}"
                                                               disabled class="form-control" name="total"
                                                               placeholder="Enter You total">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <br>

                                        <div align="center">
                                            <a href="{{  url('/admin/chasier/laser/discount/'.$order_laser->id) }}"
                                               class="btn btn-sm btn-primary">Discount</a>
                                        </div>
                                        <br>
                                        <div class="form-group{{ $errors->has('number_visa') ? ' has-error' : "" }}">
                                            number visa : <input type="text" value="{{Request::old('number_visa')}}"
                                                                 class="form-control" name="number_visa"
                                                                 placeholder="Enter You number visa">
                                        </div>
                                        <div class="form-group{{ $errors->has('paid') ? ' has-error' : "" }}">
                                            paid : <input type="text"
                                                          value="{{Request::old('paid')}}"
                                                          class="form-control" name="paid"
                                                          placeholder="Enter You paid">

                                        </div>
                                    </div>
                                </div>
                                <button type="submit" value="pay">pay</button>
                            </form>
                            <br>
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