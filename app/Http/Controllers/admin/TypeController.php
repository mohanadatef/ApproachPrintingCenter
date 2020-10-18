<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\Type\TypeCreateRequest;
use App\Http\Requests\admin\Type\TypeEditRequest;
use App\Models\Log;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }
    public function index()
    {
        $type = Type::all();
        $log = new Log();
        $log->user_id=Auth::User()->id;
        $log->action='show type ' ;
        $log->save();
        return view('admin.type.type_index', compact('type'));
    }

    public function createget()
    {
        $order = Type::all()->last();
        return view('admin.type.type_create',compact('order'));
    }

    public function createpost(TypeCreateRequest $request)
    {
        $newtype = new Type();
        $newtype->create($request->all());
        $log = new Log();
        $log->user_id=Auth::User()->id;
        $log->action='create type ' ;
        $log->save();
        return redirect('admin/material')->with('message', 'Add Type Is Done!');
    }

    public function editget($id)
    {
        $type = Type::find($id);
        return view('admin.type.type_edit', compact( 'type'));
    }

    public function editpost(TypeEditRequest $request, $id)
    {

        $newtypees = Type::find($id);
        $newtypees->update($request->all());
        $log = new Log();
        $log->user_id=Auth::User()->id;
        $log->action='edit type :'.$newtypees->name ;
        $log->save();
        return redirect('admin/material')->with('message', 'Edit Type Is Done!');
    }


}

?>