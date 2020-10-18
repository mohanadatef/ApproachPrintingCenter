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
            <div align="center"><h3>{{ __('Add new quantity') }}</h3></div>
            <form autocomplete="off" id="shop" action="{{url('admin/store/shop/'.$store->id)}}" method="POST">
                {{csrf_field()}}
                {{ method_field('PATCH') }}
                <div class="form-group">
                    size : <input type="text" DISABLED value="{{$store->size->name}}" class="form-control" name="size" >
                </div>
                <div class="form-group">
                    material : <input type="text" DISABLED value="{{$store->type->name}}" class="form-control" name="type" >
                </div>
                <div class="form-group{{ $errors->has('quantity') ? ' has-error' : "" }}">
                    quantity : <input type="text" value="{{Request::old('quantity')}}" class="form-control" name="quantity" placeholder="Enter You quantity">
                </div>
                <div class="form-group{{ $errors->has('width') ? ' has-error' : "" }}">
                    width : <input type="text" value="{{Request::old('width')}}" class="form-control" name="width" placeholder="Enter You width">
                </div>
                <div class="form-group{{ $errors->has('roll_size') ? ' has-error' : "" }}">
                    roll_size : <input type="text" value="{{Request::old('roll_size')}}" class="form-control" name="roll_size" placeholder="Enter You roll_size">
                </div>
                <div class="form-group{{ $errors->has('price') ? ' has-error' : "" }}">
                 store price : <input type="text" value="{{Request::old('price')}}" class="form-control" name="price" placeholder="Enter You price">
                </div>
                <div align="center">
                <input type="submit" class="btn btn-primary" value="Done">
                </div>
            </form>
        </div>
    </div>
    @include('includes.admin.footer')
    @include('includes.admin.scripts')

        {!! JsValidator::formRequest('App\Http\Requests\admin\Store\StoreShopRequest','#shop') !!}

</div>
</body>
</html>