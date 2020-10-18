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
            <div align="center"><h3>{{ __('Buy Print') }}</h3></div>
            <form autocomplete="off" action="{{url('/admin/order/search/customer')}}"   method="POST">
                {{csrf_field()}}
                <div hidden class="form-group{{ $errors->has('phone') ? ' has-error' : "" }}">
                    Phone : <input type="text" value="{{$customer->phone}}" class="form-control"
                                   name="phone" placeholder="Enter You phone">
                </div>
                <div align="right">
                    <input type="submit" class="btn btn-primary" value="back">
                </div>
            </form>
            <form autocomplete="off" id="add" action="{{url('admin/order/add/cart/print/'.$customer->id)}}" enctype="multipart/form-data" method="POST">
                {{csrf_field()}}
               {{-- <div class="form-group">
                    type : <select id="type_id" name="type_id" type="type_id" class="form-control"  >
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
                <div class="form-group">
                    color : <select id="color_id" name="color_id" type="color_id" class="form-control"  >
                        <option value="" selected disabled>Select</option>
                        @foreach($color as $key => $mycolor)
                            <option value="{{$key}}"> {{$mycolor}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    machine : <select id="machine_id" name="machine_id" type="machine_id" class="form-control"  >
                        <option value="" selected disabled>Select</option>
                        @foreach($machine as $key => $mymachine)
                            <option value="{{$key}}"> {{$mymachine}}</option>
                        @endforeach
                    </select>
                </div>--}}
                <div class="form-group">
                    machine : <select id="machine_id"  type="machine_id"  name="machine_id"
                                   class="form-control selection" onchange="my_machine_id('machine_id')" >
                        <option value="" selected disabled>Select</option>
                        @foreach($machine as $key => $mymachine)
                            <option value="{{$key}}"> {{$mymachine}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    type : <select id="type_id"
                                   name="type_id"
                                   class="form-control selection" onchange="my_type_id('type_id')">
                        <option value="0" selected>select type</option>
                    </select>
                </div>
                <div class="form-group">
                    size : <select id="size_id"
                                   name="size_id"
                                   class="form-control selection" onchange="my_size_id('size_id')">
                        <option value="0" selected>select size</option>
                    </select>
                </div>
                <div class="form-group">
                    color : <select id="color_id"
                                   name="color_id"
                                   class="form-control selection" onchange="my_color_id('color_id')">
                        <option value="0" selected>select color</option>
                    </select>
                </div>
                <div class="row">
                <div class="col-md-6">
                <div class="form-group{{ $errors->has('width') ? ' has-error' : "" }}" >
                    width : <input type="text" value="{{Request::old('width')}}" class="form-control" name="width" placeholder="Enter You width">
                </div>
                </div>
                    <div class="col-md-6">
                <div class="form-group{{ $errors->has('height') ? ' has-error' : "" }}">
                    height : <input type="text" value="{{Request::old('height')}}" class="form-control" name="height" placeholder="Enter You quantity">
                </div>
                </div>
                </div>
                <div class="form-group{{ $errors->has('quantity') ? ' has-error' : "" }}">
                    quantity : <input type="text" value="{{Request::old('quantity')}}" class="form-control" name="quantity" placeholder="Enter You quantity">
                </div>
                <input type="file" name="filename[]" multiple='multiple' />
                <div align="center">
                <input type="submit" class="btn btn-primary" value="buy">
                </div>
            </form>
        </div>
    </div>
    @include('includes.admin.footer')
    @include('includes.admin.scripts')
<script>
    $('#machine_id').change(function () {
        var machineID = $(this).val();
        if (machineID) {
            $.ajax({
                type: "GET",
                url: "{{url('get-type-list')}}?machine_id=" + machineID,
                success: function (res) {
                    if (res) {
                        $("#type_id").empty();
                        $("#type_id").append('<option value="0"> select Area</option>');
                        $.each(res, function (key, value) {
                            if(value == "غير محدد")
                            {
                            }
                            else {
                                $("#type_id").append('<option value="' + key + '">' + value + '</option>');
                            }                            });
                    } else {
                        $("#type_id").empty();
                    }
                }
            });
        } else {
            $("#type_id").empty();
        }
    });
    $('#type_id').change(function () {
        var typeID = $(this).val();
        var machineID = document.getElementById("machine_id").value;
        if (typeID) {
            $.ajax({
                type: "GET",
                url: "{{url('get-size-list')}}",
                data: {
                    'type_id': typeID,
                    'machine_id': machineID,
                },
                success: function (res) {
                    if (res) {
                        $("#size_id").empty();
                        $("#size_id").append('<option value="0"> select Area</option>');
                        $.each(res, function (key, value) {
                            if(value == "غير محدد")
                            {
                            }
                            else {
                                $("#size_id").append('<option value="' + key + '">' + value + '</option>');
                            }                            });
                    } else {
                        $("#size_id").empty();
                    }
                }
            });
        } else {
            $("#size_id").empty();
        }
    });
    $('#size_id').change(function () {
        var sizeID = $(this).val();
        var typeID = document.getElementById("type_id").value;
        var machineID = document.getElementById("machine_id").value;
        if (sizeID) {
            $.ajax({
                size: "GET",
                url: "{{url('get-color-list')}}",
                data: {
                    'type_id': typeID,
                    'machine_id': machineID,
                    'size_id': sizeID,
                },
                success: function (res) {
                    if (res) {
                        $("#color_id").empty();
                        $("#color_id").append('<option value="0"> select color</option>');
                        $.each(res, function (key, value) {
                            if(value == "غير محدد")
                            {
                            }
                            else {
                                $("#color_id").append('<option value="' + key + '">' + value + '</option>');
                            }                            });
                    } else {
                        $("#color_id").empty();
                    }
                }
            });
        } else {
            $("#color_id").empty();
        }
    });
</script>
    {!! JsValidator::formRequest('App\Http\Requests\admin\Order\OrderAddPrintRequest','#add') !!}
</div>
</body>
</html>