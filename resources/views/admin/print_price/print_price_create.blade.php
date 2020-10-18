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
            <div align="center"><h3>{{ __('Add Print Price') }}</h3></div>
            <form autocomplete="off" id="create" action="{{url('admin/print_price/create')}}" method="POST">
                {{csrf_field()}}
                <div class="form-group{{ $errors->has('size_id') ? ' has-error' : "" }}">
                    size : <select id="size_id" name="size_id" type="size_id" class="form-control"  >
                        <option value="" selected disabled>Select</option>
                        @foreach($size as $key => $mysize)
                            <option value="{{$key}}"> {{$mysize}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group{{ $errors->has('type_id') ? ' has-error' : "" }}">
                    material : <select id="type_id" name="type_id" type="type_id" class="form-control"  >
                        <option value="" selected disabled>Select</option>
                        @foreach($type as $key => $mytype)
                            <option value="{{$key}}"> {{$mytype}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group{{ $errors->has('machine_id') ? ' has-error' : "" }}">
                    machine : <select id="machine_id" name="machine_id" type="machine_id" class="form-control"  >
                        <option value="" selected disabled>Select</option>
                        @foreach($machine as $key => $mymachine)
                            <option value="{{$key}}"> {{$mymachine}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group{{ $errors->has('color_id') ? ' has-error' : "" }}">
                    color : <select id="color_id" name="color_id" type="color_id" class="form-control"  >
                        <option value="" selected disabled>Select</option>
                        @foreach($color as $key => $mycolor)
                            <option value="{{$key}}"> {{$mycolor}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group{{ $errors->has('price') ? ' has-error' : "" }}">
                    price : <input type="text" value="{{Request::old('price')}}" class="form-control" name="price" placeholder="Enter You price">
                </div>

                <div align="center">
                <input type="submit" class="btn btn-primary" value="Done">
                </div>
            </form>
        </div>
    </div>
    @include('includes.admin.footer')
    @include('includes.admin.scripts')

        {!! JsValidator::formRequest('App\Http\Requests\admin\Print_Price\Print_PriceCreateRequest','#create') !!}

</div>
</body>
</html>