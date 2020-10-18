<!DOCTYPE html>
<html>
<head>
    @include('includes.admin.header')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    @include('includes.admin.main-header')
    @include('includes.admin.main-sidebar')
    @include('includes.admin.error')
    <div class="col-md-12">
        <div align="center"><h3>{{ __('Buy Material') }}</h3></div>
        <form autocomplete="off" action="{{url('/admin/order/search/customer')}}" method="POST">
            {{csrf_field()}}
            <div hidden class="form-group{{ $errors->has('phone') ? ' has-error' : "" }}">
                Phone : <input type="text" value="{{$cart->customer->phone}}" class="form-control"
                               name="phone" placeholder="Enter You phone">
            </div>
            <div align="right">
                <input type="submit" class="btn btn-primary" value="back">
            </div>
        </form>
        <form autocomplete="off" action="{{url('admin/order/update/cart/material/'.$cart->id)}}" method="POST">
            {{csrf_field()}}
            {{method_field('PATCH')}}
            <div class="form-group">
                material :  <select id="type_id" type="type_id" class="form-control" name="type_id"  >
                    @foreach($type as $key => $mytype)
                        <option value="{{$key}}"  @if($cart->type_id == $key)){ selected  } @else{   }@endif  > {{$mytype}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                size :  <select id="size_id" type="size_id" class="form-control" name="size_id"  >
                    @foreach($size as $key => $mysize)
                        <option value="{{$key}}"  @if($cart->size_id == $key)){ selected  } @else{   }@endif  > {{$mysize}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group{{ $errors->has('quantity') ? ' has-error' : "" }}">
                quantity : <input type="text" value="{{$cart->quantity}}" class="form-control" name="quantity" placeholder="Enter You quantity">
            </div>
            <div class="form-group{{ $errors->has('meter') ? ' has-error' : "" }}">
                meter : <input type="text" value="{{$cart->meter}}" class="form-control" name="meter" placeholder="Enter You meter">
            </div>
            <div align="center">
                <input type="submit" class="btn btn-primary" value="edit">
            </div>
        </form>
    </div>
    @include('includes.admin.footer')
    @include('includes.admin.scripts')
</div>
</body>
</html>