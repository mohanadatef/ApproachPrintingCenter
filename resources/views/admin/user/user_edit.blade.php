<!DOCTYPE html>
<html>
<head>
    @include('includes.admin.header')

    <link src="{{ asset('public/css/bootstrap.min.css')}}" >
    <link rel="stylesheet" type="text/css" href="{{url('public/css/admin/multi-select.css')}}">
    <style>

        .ms-container {
            width: 50%;
        }

        li.ms-elem-selectable, .ms-selected {
            padding: 5px !important;
        }

        .ms-list {
            height: 310px !important;
        }
    </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    @include('includes.admin.main-header')
    @include('includes.admin.main-sidebar')
    <div class="content-wrapper">
        @include('includes.admin.error')
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="margin-left:450px;">{{ __('Edit User') }}</div>
                <div class="card-body">
                    <form autocomplete="off" id="edit" action="{{url('admin/user/edit/'.$user->id)}}"  method="POST">
                        {{csrf_field()}}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : "" }}">
                            name : <input type="text"  class="form-control" name="name" value="{{$user->name}}" placeholder="enter you name">
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : "" }}">
                            email : <input type="email" class="form-control" name="email" value="{{$user->email}}" placeholder="enter you email">
                        </div>
                        <div class="form-group"  style="margin-left:450px; ">
                            choose Permission :
                        </div>
                        @permission('user-role')
                        <div class="form-group"  style="margin-left:300px; ">
                            <select  id="role_id"  multiple='multiple' name="role_id[]">
                                @foreach($role as  $myrole)
                                        <option value="{{$myrole->id}}" @foreach($role_user as  $myrole_user) @if($myrole_user->role_id ==$myrole->id)){ selected  } @else{   }@endif @endforeach > {{$myrole->display_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        @endpermission
                        <input type="submit" class="btn btn-primary" style="margin-left:450px;" value="Edit member">
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('includes.admin.footer')
    <script src="{{ url('public/css/jquery.min.js')}}"></script>
    <script src="{{ url('public/css/bootstrap.min.js')}}"></script>
    <script src="{{url('public/js/admin/jquery.multi-select.js')}}"></script>
    <script>
        $('#role_id').multiSelect();
    </script>
    @include('includes.admin.scripts')

    {!! JsValidator::formRequest('App\Http\Requests\User\UserEditRequest','#edit') !!}
</div>
</body>
</html>