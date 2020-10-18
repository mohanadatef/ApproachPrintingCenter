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
        <div class="col-md-12">
            @include('includes.admin.error')
            <br>
            <div align="center"><h3>{{ __('Edit Store') }}</h3></div>
            <form autocomplete="off" id="edit" action="{{url('admin/store/edit/'.$store->id)}}"  method="post">
                {{csrf_field()}}
                {{ method_field('PATCH') }}
                <div class="form-group">
                    size :  <select id="size_id" type="size_id" class="form-control" name="size_id"  >
                        @foreach($size as $key => $mysize)
                            <option value="{{$key}}"  @if($store->size_id == $key)){ selected  } @else{   }@endif  > {{$mysize}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    material :  <select id="type_id" type="type_id" class="form-control" name="type_id"  >
                        @foreach($type as $key => $mytype)
                            <option value="{{$key}}"  @if($store->type_id == $key)){ selected  } @else{   }@endif  > {{$mytype}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group{{ $errors->has('quantity') ? ' has-error' : "" }}">
                    quantity : <input type="text" value="{{$store->quantity}}" class="form-control" name="quantity" placeholder="Enter You quantity">
                </div>
                <div class="form-group{{ $errors->has('quantity_min') ? ' has-error' : "" }}">
                    quantity_min : <input type="text" value="{{$store->quantity_min}}" class="form-control" name="quantity_min" placeholder="Enter You quantity min">
                </div>
                <div class="form-group{{ $errors->has('width') ? ' has-error' : "" }}">
                    width : <input type="text" value="{{$store->width}}" class="form-control" name="width" placeholder="Enter You width">
                </div>
                <div class="form-group{{ $errors->has('price') ? ' has-error' : "" }}">
                    chasier price : <input type="text" value="{{$store->price}}" class="form-control" name="price" placeholder="Enter You price">
                </div>
                <div class="form-group{{ $errors->has('roll_size') ? ' has-error' : "" }}">
                    roll_size : <input type="text" value="{{$store->roll_size}}" class="form-control" name="roll_size" placeholder="Enter You roll_size">
                </div>
                <div align="center">
                    <input type="submit" class="btn btn-primary" value="Done">
                </div>
            </form>
        </div>
    </div>
    @include('includes.admin.footer')
    @include('includes.admin.scripts')

        {!! JsValidator::formRequest('App\Http\Requests\admin\Store\StoreEditRequest','#edit') !!}

</div>
</body>
</html>