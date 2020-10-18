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
                        <h1 align="center">Store</h1>
                    </div>
                    @permission('store-create')
                    <div class="col-md-1" align="center">
                        <a href="{{  url('/admin/store/create') }}" class="btn btn-sm btn-primary">Add</a>
                    </div>
                    <br>
                    @endpermission
                </div>
            <div class="row">
                <div class="col-md-12">
                    @if(count($store) > 0)
                        <div align="center" class="col-md-12 table-responsive">
                            <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th class="center">kind</th>
                                    <th class="center">size</th>
                                    <th class="center">material</th>
                                    <th class="center">roll size</th>
                                    <th class="center">quantity</th>
                                    <th class="center">quantity min</th>
                                    <th class="center">meter</th>
                                    <th class="center">width</th>
                                    <th class="center">chasier price</th>
                                    <th class="center">Control</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($store as $stores)
                                    <tr>
                                        @if($stores->quantity_min>$stores->quantity)
                                        <td class="center"  style="background-color: red">Not Safe</td>
                                        @else
                                            <td class="center" style="background-color: green">Safe</td>
                                        @endif
                                        <td class="center">{{ $stores->size->name }}</td>
                                        <td class="center">{{ $stores->type->name }}</td>
                                        <td class="center">{{ $stores->roll_size }}</td>
                                        <td class="center">{{ $stores->quantity }}</td>
                                        <td class="center">{{ $stores->quantity_min }}</td>
                                        <td class="center">{{ $stores->meter }}</td>
                                        <td class="center">{{ $stores->width }}</td>
                                        <td class="center">{{ $stores->price }}</td>
                                        <td class="center">
                                            @permission('store-edit')
                                            <a href="{{ url('/admin/store/edit/'.$stores->id)}}"><i class="ace-icon fa fa-edit bigger-120  edit" data-id="">edit</i></a>
                                            @endpermission
                                            @permission('store-shop')
                                            <a href="{{ url('/admin/store/shop/'.$stores->id)}}"><i class="ace-icon fa fa-edit bigger-120  edit" data-id="">add new quantity</i></a>
                                            @endpermission
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="empty" align="center">There is no Store to show</div>
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