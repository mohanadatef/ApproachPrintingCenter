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
        <div class="col-md-12">
            <br>
            <div align="center"><h3>{{ __('customer') }}</h3></div>
            <form id="import" action="{{url('admin/import/customer')}}" enctype="multipart/form-data" method="POST">
                {{csrf_field()}}
                <div align="center>">
                <input type="file" name="file" class="form-control">
                <br>
                <span class="text-muted">file must .xlsx</span>
                <br>
                <br>
                <button class="btn btn-primary">Import Data</button>
                </div>
            </form>
        </div>
    </div>
    @include('includes.admin.footer')
    @include('includes.admin.scripts')

        {!! JsValidator::formRequest('App\Http\Requests\admin\import\ImportCreateRequest','#import') !!}

</div>
</body>
</html>