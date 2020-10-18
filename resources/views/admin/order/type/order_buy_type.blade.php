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
            <div align="center"><h3>{{ __('Buy Material') }}</h3></div>
            <form autocomplete="off" action="{{url('/admin/order/search/customer')}}" method="POST">
                {{csrf_field()}}
                <div hidden class="form-group{{ $errors->has('phone') ? ' has-error' : "" }}">
                    Phone : <input type="text" value="{{$customer->phone}}" class="form-control"
                                   name="phone" placeholder="Enter You phone">
                </div>
                <div align="right">
                    <input type="submit" class="btn btn-primary" value="back">
                </div>
            </form>
            <form autocomplete="off" action="{{url('admin/order/add/cart/material/'.$customer->id)}}" method="POST">
                {{csrf_field()}}
                <div class="form-group">
                    material : <select id="type_id" name="type_id" type="type_id" class="form-control"  >
                        <option value="" selected disabled>Select</option>
                        @foreach($type as $key => $mytype)
                            <option value="{{$key}}"> {{$mytype}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    size : <select id="size_id" name="size_id" type="size_id" class="form-control"  >
                        <option value="" selected disabled>Select</option>
                        @foreach($size as $key => $mysize)
                            <option value="{{$key}}"> {{$mysize}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group{{ $errors->has('quantity') ? ' has-error' : "" }}">
                    quantity : <input type="text" value="{{Request::old('quantity')}}" class="form-control" name="quantity" placeholder="Enter You quantity">
                </div>
                <div class="form-group{{ $errors->has('meter') ? ' has-error' : "" }}">
                    meter : <input type="text" value="{{Request::old('meter')}}" class="form-control" name="meter" placeholder="Enter You meter">
                </div>
                <div align="center">
                <input type="submit" class="btn btn-primary" value="buy">
                </div>
            </form>
        </div>
    </div>
    @include('includes.admin.footer')
    @include('includes.admin.scripts')
</div>
</body>
</html>