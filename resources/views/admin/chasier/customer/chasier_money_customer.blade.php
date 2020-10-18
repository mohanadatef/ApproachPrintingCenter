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
            <div class="col-md-1">
            </div>
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-11">
                        <h1 align="center">Information Customer</h1>
                    </div>
                    <br>
                </div>
                <div class="row">
                    <div class="col-md-11">
                        <div class="form-group">
                            name : <input type="text" disabled value="{{$customer->name}}" class="form-control" name="name">
                        </div>
                        <div class="form-group">
                            email : <input type="email" disabled value="{{$customer->email}}" class="form-control" name="email">
                        </div>
                        <div class="form-group">
                            phone : <input type="number" disabled value="{{$customer->phone}}" class="form-control" name="phone">
                        </div>
                        <div class="form-group">
                            place : <input type="text"  disabled value="{{$customer->place}}" class="form-control" name="place">
                        </div>
                        <div class="form-group">
                            wallet : <input type="text"  disabled value="{{$customer->wallet}}" class="form-control" name="wallet">
                        </div>
                        @permission('chasier-add-money')
                        <form autocomplete="off" action="{{url('/admin/chasier/customer/add/'.$customer->id)}}" method="POST">
                            {{csrf_field()}}
                            {{method_field('patch')}}
                            <div class="form-group{{ $errors->has('money') ? ' has-error' : "" }}">
                                number : <input type="text"   value="{{Request::old('money')}}" class="form-control" name="money">
                            </div>
                            <div align="center">
                            <input type="submit" class="btn btn-primary" value="Done">
                            </div>
                            <br>
                        </form>
                        @endpermission
                        <br>
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