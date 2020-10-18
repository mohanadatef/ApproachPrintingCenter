<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\Size\SizeEditRequest;
use App\Http\Requests\admin\Size\SizeCreateRequest;
use App\Models\Log;
use App\Models\Size;
use Illuminate\Support\Facades\Auth;


class SizeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index()
    {
        $size = Size::paginate(100);
        $log = new Log();
        $log->user_id=Auth::User()->id;
        $log->action='show size ' ;
        $log->save();
        return view('admin.size.size_index', compact('size'));
    }

    public function createget()
    {
        $order = Size::all()->last();
        return view('admin.size.size_create',compact('order'));

    }

    public function createpost(SizeCreateRequest $request)
    {
        $newsize = new Size();
        $newsize->create($request->all());
        $log = new Log();
        $log->user_id=Auth::User()->id;
        $log->action='create size ' ;
        $log->save();
        return redirect('/admin/size')->with('message', 'Add Size Is Done!');
    }

    public function editget($id)
    {
        $size = Size::find($id);
        return view('admin.size.size_edit', compact('size'));
    }

    public function editpost(SizeEditRequest $request, $id)
    {
        $newsize = Size::find($id);
        $newsize->update($request->all());
        $log = new Log();
        $log->user_id=Auth::User()->id;
        $log->action='edit size :'.$newsize->name ;
        $log->save();
        return redirect('/admin/size')->with('message', 'Edit Size Is Done!');
    }

}

?>