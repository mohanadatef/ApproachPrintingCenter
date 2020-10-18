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
            <div class="card">
                <h1 align="center">Reset Code</h1>
                <div class="card-body">
                    <form autocomplete="off" id='code' action="{{url('admin/user/reset/code/'.$user->id)}}" method="POST">
                        {{csrf_field()}}
                        <div class="form-group{{ $errors->has('code_discount') ? ' has-error' : "" }}">
                            code : <input type="text" value="{{Request::old('code_discount')}}" class="form-control" name="code_discount" placeholder="Enter You code">
                        </div>
                        <div align="center">
                            <input type="submit" class="btn btn-primary" value="Reset">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('includes.admin.footer')
    @include('includes.admin.scripts')
        {!! JsValidator::formRequest('App\Http\Requests\User\UserResetCodeCreateRequest','#code') !!}
</div>
</body>
</html>