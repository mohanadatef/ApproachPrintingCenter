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
                        <h1 align="center">Customer</h1>
                    </div>
                    @permission('customer-create')
                    <div class="col-md-1" align="center">
                        <a href="{{  url('admin/customer/create') }}" class="btn btn-sm btn-primary">Add</a>
                    </div>
                    <br>
                    @endpermission
                </div>
            <div class="row">
                <div class="col-md-12">
                    @if(count($customer) > 0)
                        <div align="center" class="col-md-12 table-responsive">
                            <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th class="center">Name</th>
                                    <th class="center">Email</th>
                                    <th class="center">phone</th>
                                    <th class="center">place</th>
                                    <th class="center">wallet</th>
                                    @permission('customer-status')
                                    <th class="center">status</th>
                                    @endpermission
                                    <th class="center">Control</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($customer as $customers)
                                    <tr>
                                        <td class="center">{{ $customers->name }}</td>
                                        <td class="center">{{ $customers->email }}</td>
                                        <td class="center">{{ $customers->phone }}</td>
                                        <td class="center">{{ $customers->place }}</td>
                                        <td class="center">{{ $customers->wallet }}</td>
                                        @permission('customer-status')
                                        <td class="center">
                                            @if($customers->status ==1)
                                                <h7>Active</h7><a href="{{ url('/admin/customer/statues/'.$customers->id)}}"><i
                                                            class="ace-icon fa fa-close"></i></a>
                                            @elseif($customers->status ==0)
                                                <h7>Dactive</h7><a
                                                        href="{{ url('/admin/customer/statues/'.$customers->id)}}"><i
                                                            class="ace-icon fa fa-check-circle"></i></a>
                                            @endif
                                        </td>
                                        @endpermission
                                        <td class="center">
                                            @permission('customer-edit')
                                            <a href="{{ url('admin/customer/edit/'.$customers->id)}}"><i class="ace-icon fa fa-edit bigger-120  edit" data-id="">edit</i></a>
                                            @endpermission
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $customer->links() }}
                        </div>
                    @else
                        <div class="empty" align="center">There is no Customer to show</div>
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