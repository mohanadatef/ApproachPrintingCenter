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
            <div align="center"><h3>{{ __('Edit Machine') }}</h3></div>
            <form autocomplete="off" id="edit" action="{{url('admin/machine/edit/'.$machine->id)}}"  method="post">
                {{csrf_field()}}
                {{ method_field('PATCH') }}
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : "" }}">
                        name : <input type="text" value="{{$machine->name}}" class="form-control" name="name" placeholder="Enter You name">
                    </div>
                <div class="form-group">
                    kind :  <select id="kind" type="kind" class="form-control" name="kind"  >
                            <option value="1"  @if($machine->kind == 1)){ selected  } @else{   }@endif  > laser</option>
                            <option value="2"  @if($machine->kind == 2)){ selected  } @else{   }@endif  > print</option>
                    </select>
                </div>
                <div class="form-group{{ $errors->has('price') ? ' has-error' : "" }}">
                    price : <input type="text" value="{{$machine->price}}" class="form-control" name="price" placeholder="Enter You price">
                </div>
                <div class="form-group{{ $errors->has('order') ? ' has-error' : "" }}">
                    order : <input type="text" value="{{$machine->order}}" class="form-control" name="order" placeholder="Enter You order">
                </div>
                <div align="center">
                    <input type="submit" class="btn btn-primary" value="Done">
                </div>
            </form>
        </div>
    </div>
    @include('includes.admin.footer')
    @include('includes.admin.scripts')

        {!! JsValidator::formRequest('App\Http\Requests\admin\Customer\CustomerEditRequest','#edit') !!}

</div>
</body>
</html>