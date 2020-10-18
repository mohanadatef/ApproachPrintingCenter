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
            <div align="center"><h3>{{ __('User Transation') }}</h3></div>
            <form autocomplete="off" id="create" action="{{url('admin/user_transaction/create')}}" method="POST">
                {{csrf_field()}}
                <div class="form-group{{ $errors->has('user_id_take') ? ' has-error' : "" }}">
                    user take : <select id="user_id_take" name="user_id_take" type="user_id_take" class="form-control"  >
                        <option value="" selected disabled>Select</option>
                        @foreach($user as $key => $myuser)
                            <option value="{{$key}}"> {{$myuser}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    kind :    <select id="kind" name="kind" class="form-control" style="width:350px" >
                        <option value="" selected disabled>selected</option>
                        <option value="1"> input</option>
                        <option value="2"> out</option>
                    </select>
                </div>
                <div class="form-group{{ $errors->has('total') ? ' has-error' : "" }}">
                    total : <input type="text" value="{{Request::old('total')}}" class="form-control" name="total" placeholder="Enter You total">
                </div>
                <div class="form-group{{ $errors->has('notes') ? ' has-error' : "" }}">
                    notes : <textarea type="text"  class="form-control" name="notes" placeholder="Enter You notes">{{Request::old('notes')}}</textarea>
                </div>
                <div align="center">
                    <input type="submit" class="btn btn-primary" value="Done">
                </div>
            </form>
        </div>
    </div>
    @include('includes.admin.footer')
    @include('includes.admin.scripts')

    {!! JsValidator::formRequest('App\Http\Requests\User\UserTransactionRequest','#create') !!}

</div>
</body>
</html>