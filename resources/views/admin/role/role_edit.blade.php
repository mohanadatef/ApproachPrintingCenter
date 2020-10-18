<!DOCTYPE html>
<html>
<head>
    @include('includes.admin.header')

    <link src="{{ asset('public/css/bootstrap.min.css')}}" >
    <link rel="stylesheet" type="text/css" href="{{url('public/css/admin/multi-select.css')}}">
    <style>

        .ms-container {
            width: 70%;
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
            <div align="center">{{ __('Roles') }}</div>
            <form autocomplete="off" id="edit" action="{{url('admin/role/edit/'.$role->id)}}"  method="POST" style="margin-right: 30px;margin-left: 30px;">
                {{csrf_field()}}
                <table class="table">
                    <tr>
                        <td>
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : "" }}">
                                name : <input type="text" value="{{$role->name}}" class="form-control" name="name" placeholder="Enter You name">
                            </div>
                            <div class="form-group{{ $errors->has('display_name') ? ' has-error' : "" }}">
                                display_name : <input type="text" value="{{$role->display_name}}" class="form-control" name="display_name" placeholder="Enter You display_name">
                            </div>
                            <div class="form-group{{ $errors->has('description') ? ' has-error' : "" }}">
                                description : <textarea type="text" id="description" class="form-control" name="description" placeholder="enter you description">{{$role->description}}</textarea>
                            </div>
                            <div class="form-group"  style="margin-left:450px; ">
                                choose Roles :
                            </div>
                            <div class="form-group"  style="margin-left:300px; ">
                                <select  id="permission_id"  multiple='multiple' name="permission[]">
                                        @foreach($permission as  $mypermission)
                                                <option value="{{$mypermission->id}}" @foreach($permission_role as  $mypermission_role) @if($mypermission_role->permission_id ==$mypermission->id)){ selected  } @else{   }@endif @endforeach > {{$mypermission->display_name}}</option>

                                    @endforeach
                                </select>
                            </div>
                        </td>
                    </tr>
                </table>
                <div align="center">
                    <input type="submit" class="btn btn-primary" value="Done">
                </div>
            </form>

    </div>
    @include('includes.admin.footer')

    <script src="{{ url('public/css/jquery.min.js')}}"></script>
    <script src="{{ url('public/css/bootstrap.min.js')}}"></script>
    <script src="{{url('public/js/admin/jquery.multi-select.js')}}"></script>
    <script>
        $('#permission_id').multiSelect();
    </script>
    @include('includes.admin.scripts')
    {!! JsValidator::formRequest('App\Http\Requests\Role\RoleEditRequest','#edit') !!}
</div>
</body>
</html>