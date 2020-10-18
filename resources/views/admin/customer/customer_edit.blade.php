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
            <div align="center"><h3>{{ __('Customer') }}</h3></div>
            <form autocomplete="off" id="edit" action="{{url('admin/customer/edit/'.$customer->id)}}"  method="post">
                {{csrf_field()}}
                {{ method_field('PATCH') }}
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : "" }}">
                        name : <input type="text" value="{{$customer->name}}" class="form-control" name="name" placeholder="Enter You name">
                    </div>
                <div class="form-group{{ $errors->has('email') ? ' has-error' : "" }}">
                    email : <input type="email" value="{{$customer->email}}" class="form-control" name="email" placeholder="Enter You email">
                </div>
                <div class="form-group{{ $errors->has('phone') ? ' has-error' : "" }}">
                    phone : <input type="number" value="{{$customer->phone}}" class="form-control" name="phone" placeholder="Enter You phone">
                </div>
                <div class="form-group{{ $errors->has('place') ? ' has-error' : "" }}">
                    place : <input type="text" value="{{$customer->place}}" class="form-control" name="place" placeholder="Enter You place">
                </div>
                <div align="center">
                    <input type="submit" class="btn btn-primary" value="Done">
                </div>
            </form>
        </div>
    </div>
    @include('includes.admin.footer')
    @include('includes.admin.scripts')

        {!! JsValidator::formRequest('App\Http\Requests\admin\Customer\CustomerEditRequest','#edit') !!}

</div>
</body>
</html>