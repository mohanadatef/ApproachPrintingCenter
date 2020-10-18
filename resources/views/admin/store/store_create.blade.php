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
            <div align="center"><h3>{{ __('Add Store') }}</h3></div>
            <form autocomplete="off" id="create" action="{{url('admin/store/create')}}" method="POST">
                {{csrf_field()}}
                <div class="form-group">
                    size : <select id="size_id" name="size_id" type="size_id" class="form-control"  >
                        <option value="" selected disabled>Select</option>
                        @foreach($size as $key => $mysize)
                            <option value="{{$key}}"> {{$mysize}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    material : <select id="type_id" name="type_id" type="type_id" class="form-control"  >
                        <option value="" selected disabled>Select</option>
                        @foreach($type as $key => $mytype)
                            <option value="{{$key}}"> {{$mytype}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group{{ $errors->has('quantity') ? ' has-error' : "" }}">
                    quantity : <input type="text" value="{{Request::old('quantity')}}" class="form-control" name="quantity" placeholder="Enter You quantity">
                </div>
                <div class="form-group{{ $errors->has('quantity_min') ? ' has-error' : "" }}">
                    quantity_min : <input type="text" value="{{Request::old('quantity_min')}}" class="form-control" name="quantity_min" placeholder="Enter You quantity min">
                </div>
                <div class="form-group{{ $errors->has('width') ? ' has-error' : "" }}">
                    width : <input type="text" value="{{Request::old('width')}}" class="form-control" name="width" placeholder="Enter You width">
                </div>
                <div class="form-group{{ $errors->has('price') ? ' has-error' : "" }}">
                    chasier price : <input type="text" value="{{Request::old('price')}}" class="form-control" name="price" placeholder="Enter You price">
                </div>
                <div class="form-group{{ $errors->has('roll_size') ? ' has-error' : "" }}">
                    roll_size : <input type="text" value="{{Request::old('roll_size')}}" class="form-control" name="roll_size" placeholder="Enter You roll_size">
                </div>
                <div align="center">
                <input type="submit" class="btn btn-primary" value="Done">
                </div>
            </form>
        </div>
    </div>
    @include('includes.admin.footer')
    @include('includes.admin.scripts')

        {!! JsValidator::formRequest('App\Http\Requests\admin\Store\StoreCreateRequest','#create') !!}

</div>
</body>
</html>