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
            <div align="center"><h3>{{ __('Edit Print Price') }}</h3></div>
            <form autocomplete="off" id="edit" action="{{url('admin/print_price/edit/'.$print_price->id)}}"  method="post">
                {{csrf_field()}}
                {{ method_field('PATCH') }}
                <div class="form-group">
                    size :  <select id="size_id" disabled type="size_id" class="form-control" name="size_id"  >
                        @foreach($size as $key => $mysize)
                            <option value="{{$key}}"  @if($print_price->size_id == $key)){ selected  } @else{   }@endif  > {{$mysize}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    material :  <select id="type_id" disabled type="type_id" class="form-control" name="type_id"  >
                        @foreach($type as $key => $mytype)
                            <option value="{{$key}}"  @if($print_price->type_id == $key)){ selected  } @else{   }@endif  > {{$mytype}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    mahine :  <select id="machine_id" disabled type="machine_id" class="form-control" name="machine_id"  >
                        @foreach($machine as $key => $mymachine)
                            <option value="{{$key}}"  @if($print_price->machine_id == $key)){ selected  } @else{   }@endif  > {{$mymachine}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    color :  <select id="color_id" disabled type="color_id" class="form-control" name="color_id"  >
                        @foreach($color as $key => $mycolor)
                            <option value="{{$key}}"  @if($print_price->color_id == $key)){ selected  } @else{   }@endif  > {{$mycolor}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group{{ $errors->has('price') ? ' has-error' : "" }}">
                    price : <input type="text" value="{{$print_price->price}}" class="form-control" name="price" placeholder="Enter You price">
                </div>
                <div align="center">
                    <input type="submit" class="btn btn-primary" value="Done">
                </div>
            </form>
        </div>
    </div>
    @include('includes.admin.footer')
    @include('includes.admin.scripts')

        {!! JsValidator::formRequest('App\Http\Requests\admin\Print_Price\Print_PriceEditRequest','#edit') !!}

</div>
</body>
</html>