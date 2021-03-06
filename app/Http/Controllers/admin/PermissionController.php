<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\Permission\PermissionCreateRequest;
use App\Http\Requests\Permission\PermissionEditRequest;
use App\Models\Log;
use App\Permission;
use Illuminate\Support\Facades\Auth;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }
    public function indexpermission()
    {
        $permission = Permission::all();
        $log = new Log();
        $log->user_id=Auth::User()->id;
        $log->action='show all permission ';
        $log->save();
        return view('admin.permission.permission_index',compact('permission'));
    }
    public function createpermissionpost(PermissionCreateRequest $request)
    {
        $newpermission=new Permission();
        $newpermission->name = $request->input('name');
        $newpermission->display_name = $request->input('display_name');
        $newpermission->description = $request->input('description');
        $newpermission->save();
        $log = new Log();
        $log->user_id=Auth::User()->id;
        $log->action='create permission ';
        $log->save();
        return redirect('/admin/permission')->with('message', 'Add Permission Is Done!');
    }
    public function createpermissionget()
    {
        return view('admin.permission.permission_create');
    }
    public function editpermissionpost(PermissionEditRequest $request,$id)
    {
        $newpermission = Permission::find($id);
        $newpermission->name = $request->input('name');
        $newpermission->display_name = $request->input('display_name');
        $newpermission->description = $request->input('description');
        $newpermission->save();
        $log = new Log();
        $log->user_id=Auth::User()->id;
        $log->action='edit permission : '.$newpermission->display_name;
        $log->save();
        return redirect('/admin/permission')->with('message', 'Edit Permission Is Done!');
    }
    public function editpermissionget($id)
    {
        $permission = Permission::find($id);
        return view('admin.permission.permission_edit',compact('permission'));
    }

}

?>