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
        <form autocomplete="off" id="create" action="{{url('admin/role/create')}}" enctype="multipart/form-data" method="POST"
              style="width: 1000px;margin-left:50px ">
            {{csrf_field()}}
            <div class="form-group{{ $errors->has('name') ? ' has-error' : "" }}">
                name : <input type="text" value="{{Request::old('name')}}" class="form-control" name="name"
                              placeholder="Enter You name">
            </div>
            <div class="form-group{{ $errors->has('display_name') ? ' has-error' : "" }}">
                display_name : <input type="text" value="{{Request::old('display_name')}}" class="form-control"
                                      name="display_name" placeholder="Enter You display_name">
            </div>
            <div class="form-group{{ $errors->has('description') ? ' has-error' : "" }}">
                description : <textarea type="text" value="{{Request::old('description')}}" class="form-control"
                                        name="description"></textarea>
            </div>
            <div class="form-group"  style="margin-left:450px; ">
                choose Rermission :
            </div>
            <div class="form-group"  style="margin-left:250px; ">
                <select id="permission_id" multiple='multiple' name="permission[]">
                    @foreach($permission as  $mypermission)

                        <option value="{{$mypermission->id}}"> {{$mypermission->display_name}}</option>

                    @endforeach
                </select>
            </div>
            <input type="submit" class="btn btn-primary" style="margin-left:450px; " value="Done ">
            <br>
        </form>
    </div>
    @include('includes.admin.footer')

    <script src="{{ url('public/css/jquery.min.js')}}"></script>
    <script src="{{ url('public/css/bootstrap.min.js')}}"></script>
    <!-- Bootstrap JavaScript -->

    <script src="{{url('public/js/admin/jquery.multi-select.js')}}"></script>
    <script>
        $('#permission_id').multiSelect();
    </script>
    @include('includes.admin.scripts')
    {!! JsValidator::formRequest('App\Http\Requests\Role\RoleCreateRequest','#create') !!}
</div>
</body>
</html>