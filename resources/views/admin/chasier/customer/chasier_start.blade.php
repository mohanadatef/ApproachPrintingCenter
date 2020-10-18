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
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <h1 align="center">Search For customer</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <form autocomplete="off" action="{{url('/admin/chasier/search/customer')}}" method="POST">
                        {{csrf_field()}}
                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : "" }}">
                            Phone : <input type="text" value="{{Request::old('phone')}}" class="form-control"
                                           name="phone" placeholder="Enter You phone">
                        </div>
                        <div align="center">
                            <input type="submit" class="btn btn-primary" value="search">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('includes.admin.footer')
    @include('includes.admin.scripts')
</div>
</body>
</html>