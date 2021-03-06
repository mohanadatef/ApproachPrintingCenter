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
            <div align="center"><h3>{{ __('Add Machine') }}</h3></div>
            <form autocomplete="off" id="create" action="{{url('admin/machine/create')}}" method="POST">
                {{csrf_field()}}
                <div class="form-group{{ $errors->has('name') ? ' has-error' : "" }}">
                    name : <input type="text" value="{{Request::old('name')}}" class="form-control" name="name" placeholder="Enter You name">
                </div>
                <div class="form-group">
                kind :    <select id="kind" name="kind" class="form-control" style="width:350px" >
                        <option value="" selected disabled>selected</option>
                        <option value="1"> Laser</option>
                        <option value="2"> Print</option>
                    </select>
                </div>
                <div class="form-group{{ $errors->has('price') ? ' has-error' : "" }}">
                    price : <input type="text" value="{{Request::old('price')}}" class="form-control" name="price" placeholder="Enter You price">
                </div>
                <div class="form-group{{ $errors->has('order') ? ' has-error' : "" }}">
                    order : <input type="text" value="{{$order->order+1}}" class="form-control" name="order" placeholder="Enter You order">
                </div>
                <div align="center">
                <input type="submit" class="btn btn-primary" value="Done">
                </div>
            </form>
        </div>
    </div>
    @include('includes.admin.footer')
    @include('includes.admin.scripts')

        {!! JsValidator::formRequest('App\Http\Requests\admin\Machine\MachineCreateRequest','#create') !!}

</div>
</body>
</html>