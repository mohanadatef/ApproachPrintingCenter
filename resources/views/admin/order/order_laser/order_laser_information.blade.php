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
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="center">{{ $order_laser->order_id }}</td>
                                    <td class="center">{{ $order_laser->order->customer->name }}</td>
                                    <td class="center">{{ $order_laser->order->customer->phone }}</td>
                                    <td class="center">{{ $order_laser->order->user->name }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-11">
                                <h1 align="center">File Laser Information</h1>
                            </div>
                        </div>
                        @if(count($laser_file) > 0)
                            <div align="center" class="col-md-12 table-responsive">
                                <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th class="center">File Name</th>
                                        <th class="center">User Upload</th>
                                        <th class="center">Download</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($laser_file as $laserfile)
                                        <tr>
                                            <td class="center">{{ $laserfile->filename }}</td>
                                            <td class="center">{{ $laserfile->user_upload->name }}</td>
                                            <td class="center">
                                            {{-- <td ><a href="{{url('E:\order/'.Carbon\Carbon::now()->format('d-m-20y') .'/'.$order_laser->order->customer->id.'/laser',$laserfile->filename )}}"><i class="fa fa-download"></i> download</a> </td>
                                            --}}
                                            <td><a href="{{url('public/cart/laser',$laserfile->filename )}}" download><i
                                                            class="fa fa-download"></i> download</a></td>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="empty" align="center">There is no file to show</div>
                        @endif
                    </div>
                    @if($order_laser->status == 0)
                        <div align="center">
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-6">

                                <form autocomplete="off" id="start" action="{{url('admin/order/laser/start/'.$order_laser->id)}}" method="POST">
                                    {{csrf_field()}}
                                    {{method_field('patch')}}
                                    <div class="form-group">
                                        machine : <select id="machine_id" name="machine_id" type="machine_id"
                                                          class="form-control">
                                            <option value="" selected disabled>Select</option>
                                            @foreach($machine as $key => $mymachine)
                                                <option value="{{$key}}"> {{$mymachine}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <input type="submit" class="btn btn-primary" value="Start">
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
    {!! JsValidator::formRequest('App\Http\Requests\admin\Order\OrderStartLaserRequest','#start') !!}
</div>
</body>
</html>