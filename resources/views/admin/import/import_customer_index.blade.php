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
        <div class="page-content">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-11">
                        <h1 align="center">import sheet</h1>
                    </div>
                    <div class="col-md-1">
                        <a href="{{  url('/admin/import/customer') }}" class="btn btn-sm btn-primary">import</a>
                        <a href="{{  url('/admin/import/error/customer') }}" class="btn btn-sm btn-primary">test</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    @if(count($templet_customer) > 0)
                        <div align="center" class="col-md-12 table-responsive">
                            <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th class="center">#</th>
                                    <th class="center">name</th>
                                    <th class="center">phone</th>
                                    <th class="center">email</th>
                                    <th class="center">place</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $count=1; ?>
                                @foreach($templet_customer as $templet)
                                    <tr>
                                        <td>{{ $count++ }}</td>
                                        <td class="center">{{ $templet->name }}</td>
                                        <td class="center">{{ $templet->phone }}</td>
                                        <td class="center">{{ $templet->email }}</td>
                                        <td class="center">{{ $templet->place }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="empty" align="center">There is no data to show</div>
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