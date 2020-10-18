<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\Machine\MachineEditRequest;
use App\Http\Requests\admin\Machine\MachineCreateRequest;
use App\Models\Log;
use App\Models\Machine;
use Illuminate\Support\Facades\Auth;


class MachineController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index()
    {
        $machine = Machine::all();
        return view('admin.machine.machine_index', compact('machine'));
    }

    public function createget()
    {
        $order = Machine::all()->last();
        return view('admin.machine.machine_create',compact('order'));
    }

    public function createpost(MachineCreateRequest $request)
    {
        $newmachine = new Machine();
        $data['work']=0;
        $newmachine->create(array_merge($request->all(),$data));
        $log = new Log();
        $log->user_id=Auth::User()->id;
        $log->action='create Machine' ;
        $log->save();
        return redirect('/admin/machine')->with('message', 'Add Machine Is Done!');
    }

    public function editget($id)
    {
        $machine = Machine::find($id);
        return view('admin.machine.machine_edit', compact('machine'));
    }

    public function editpost(MachineEditRequest $request, $id)
    {
        $newmachine = Machine::find($id);
        $newmachine->update($request->all());
        $log = new Log();
        $log->user_id=Auth::User()->id;
        $log->action='edit Machine :'.$newmachine->name ;
        $log->save();
        return redirect('/admin/machine')->with('message', 'Edit Machine Is Done!');
    }

}

?>