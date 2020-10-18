<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\Color\ColorEditRequest;
use App\Http\Requests\admin\Color\ColorCreateRequest;
use App\Models\Color;
use App\Models\Log;
use Illuminate\Support\Facades\Auth;


class ColorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index()
    {
        $color = Color::paginate(100);
        $log = new Log();
        $log->user_id=Auth::User()->id;
        $log->action='show color' ;
        $log->save();
        return view('admin.color.color_index', compact('color'));
    }

    public function createget()
    {
        $order = Color::all()->last();
        return view('admin.color.color_create',compact('order'));
    }

    public function createpost(ColorCreateRequest $request)
    {
        $newcolor = new Color();
        $newcolor->create($request->all());
        $log = new Log();
        $log->user_id=Auth::User()->id;
        $log->action='add color' ;
        $log->save();
        return redirect('/admin/color')->with('message', 'Add Color Is Done!');
    }

    public function editget($id)
    {
        $color = Color::find($id);
        return view('admin.color.color_edit', compact('color'));
    }

    public function editpost(ColorEditRequest $request, $id)
    {
        $newcolor = Color::find($id);
        $newcolor->update($request->all());
        $log = new Log();
        $log->user_id=Auth::User()->id;
        $log->action='edit color :'.$newcolor->name ;
        $log->save();
        return redirect('/admin/color')->with('message', 'Edit Color Is Done!');
    }

}

?>