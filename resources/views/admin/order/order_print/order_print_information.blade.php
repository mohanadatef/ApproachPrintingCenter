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
                        <div class="row">
                            <div class="col-md-11">
                                <h1 align="center">File Print Information</h1>
                            </div>
                        </div>
                        @if(count($print_file) > 0)
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
                                    @foreach($print_file as $printfile)
                                        <tr>
                                            <td class="center">{{ $printfile->filename }}</td>
                                            <td class="center">{{ $printfile->user_upload->name }}</td>
                                            <td class="center">
                                            {{-- <td ><a href="{{url('E:\order/'.Carbon\Carbon::now()->format('d-m-20y') .'/'.$order_print->order->customer->id.'/print',$printfile->filename )}}"><i class="fa fa-download"></i> download</a> </td>
                                            --}}
                                          <a href="{{url('public/cart/print',$printfile->filename )}}" download><i
                                                            class="fa fa-download"></i> download</a>
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
                    @if($order_print->status == 2)
                        <div align="center">
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-6">

                                <form autocomplete="off" action="{{url('admin/order/print/end/'.$order_print->id)}}" method="POST">
                                    {{csrf_field()}}
                                    {{method_field('patch')}}
                                    <input type="submit" class="btn btn-primary" value="end">
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