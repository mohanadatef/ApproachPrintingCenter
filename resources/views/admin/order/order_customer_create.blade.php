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
            <div align="center"><h3>{{ __('Create Customer') }}</h3></div>
            <div align="right">
            <a href="{{  url('/admin/order/start') }}"  class="btn btn-sm btn-primary">search
                customer</a>
            </div>
            <form autocomplete="off" action="{{url('/admin/order/customer/create')}}" method="POST">
                {{csrf_field()}}
                <div class="form-group{{ $errors->has('name') ? ' has-error' : "" }}">
                    name : <input type="text" value="{{Request::old('name')}}" class="form-control" name="name" placeholder="Enter You name">
                </div>
                <div class="form-group{{ $errors->has('email') ? ' has-error' : "" }}">
                    email : <input type="email" value="{{Request::old('email')}}" class="form-control" name="email" placeholder="Enter You email">
                </div>
                @if($phone != null)
                    <div class="form-group{{ $errors->has('phone') ? ' has-error' : "" }}">
                        phone : <input type="text" value="{{$phone}}" class="form-control" name="phone" placeholder="Enter You phone">
                    </div>
                    @else
                <div class="form-group{{ $errors->has('phone') ? ' has-error' : "" }}">
                    phone : <input type="text" value="{{Request::old('phone')}}" class="form-control" name="phone" placeholder="Enter You phone">
                </div>
                @endif
                <div class="form-group{{ $errors->has('place') ? ' has-error' : "" }}">
                    place : <input type="text" value="{{Request::old('place')}}" class="form-control" name="place" placeholder="Enter You place">
                </div>
                <div align="center">
                <input type="submit" class="btn btn-primary" value="Done">
                </div>
            </form>
        </div>
    </div>
    @include('includes.admin.footer')
    @include('includes.admin.scripts')

</div>
</body>
</html>