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
                        <h1 align="center">Order Print Information</h1>
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
                                    <td class="center">{{ $order_print->order_id }}</td>
                                    <td class="center">{{ $order_print->order->customer->name }}</td>
                                    <td class="center">{{ $order_print->order->customer->phone }}</td>
                                    <td class="center">{{ $order_print->order->user->name }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <br>
                    </div>
                    @if($order_print->status == 1)
                        <div align="center">
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-6">

                                <form autocomplete="off" id="start" action="{{url('admin/order/print/skip/'.$order_print->id)}}" method="POST">
                                    {{csrf_field()}}
                                    {{method_field('patch')}}
                                    <div class="form-group{{ $errors->has('code') ? ' has-error' : "" }}">
                                        code user : <input type="text"
                                                           value="{{Request::old('code')}}"
                                                           class="form-control" name="code"
                                                           placeholder="Enter You paid">

                                    </div>
                                    <input type="submit" class="btn btn-primary" value="Skip">
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