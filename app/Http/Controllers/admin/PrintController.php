<?php

namespace App\Http\Controllers\admin;

use App\Exports\PrintMachineExport;
use App\Models\Log;
use App\Models\Order;
use App\Models\Order_Laser;
use App\Models\Order_Print;
use App\Models\Order_Type;
use App\User;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Machine;
use App\Models\Order_File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Exports\PrintExport;
use Maatwebsite\Excel\Facades\Excel;


class PrintController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index($id)
    {
        $order_print = Order_Print::where('status', 1)->where('machine_id', $id)->get();
        $machine = Machine::find($id);
        $log = new Log();
        $log->user_id = Auth::User()->id;
        $log->action = 'show all print order need to start machine : ' . $machine->name;
        $log->save();
        return view('admin.order.order_print.order_print_index', compact('order_print', 'machine'));
    }

    public function showprint($id)
    {
        $order_print = Order_Print::find($id);
        $order_print_check = Order_Print::where('machine_id', $order_print->machine_id)->where('id', '<', $id)->where('status', 2)->get();
        if ($order_print_check->isEmpty()) {
            $order_print->status = 2;
            $order_print->time_start_at = Carbon::now();
            $order_print->user_start_id = Auth::User()->id;
            $machine = Machine::find($order_print->machine_id);
            $machine->work = 1;
            $machine->update();
            $order_print->update();
            $print_file = Order_File::where('order_print_id', $id)->where('kind', 2)->get();
            $log = new Log();
            $log->user_id = Auth::User()->id;
            $log->action = 'show information print order : ' . $order_print->order_id . ' machine : ' . $machine->name;
            $log->save();
            return view('admin.order.order_print.order_print_information', compact('order_print', 'print_file'));
        } else {
            return redirect()->back()->with('message_fales', 'choose anther one');
        }
    }

    public function printcodeskip($id)
    {
        $order_print = Order_Print::find($id);
        if ($order_print->status == 1) {
            return view('admin.order.order_print.order_print_code', compact('order_print'));
        } else {
            return redirect()->back()->with('message_fales', 'this code wrong');
        }
    }

    public function skipprint(Request $request, $id)
    {
        $order_print = Order_Print::find($id);
        if ($order_print->status != 1) {
            return redirect()->back()->with('message_fales', 'choose anther one');
        } else {
            $user = User::where('code_discount', $request->code)->first();
            if ($user != null) {
                $order_print->user_skip_id = $user->id;
                $order_print->status = 2;
                $order_print->time_start_at = Carbon::now();
                $order_print->user_start_id = Auth::User()->id;
                $machine = Machine::find($order_print->machine_id);
                $machine->work = 1;
                $machine->update();
                $order_print->update();
                $print_file = Order_File::where('order_print_id', $id)->where('kind', 2)->get();
                $machine = Machine::find($order_print->machine_id);
                $log = new Log();
                $log->user_id = Auth::User()->id;
                $log->action = 'skip print order : ' . $order_print->order_id . " by code user : " . $user->id . " machine :" . $machine->name;
                $log->save();
                return view('admin.order.order_print.order_print_information', compact('order_print', 'machine', 'print_file'));
            } else {
                return redirect()->back()->with('message_fales', 'this code wrong');
            }
        }
    }

    public function workprint()
    {
        $order_print = Order_Print::where('status', 2)->get();
        $log = new Log();
        $log->user_id = Auth::User()->id;
        $log->action = 'show all print order work';
        $log->save();
        return view('admin.order.order_print.order_print_work', compact('order_print'));
    }

    public function endprint($id)
    {
        $order_print = Order_Print::find($id);
        if ($order_print->status == 2) {
            $order_print->status = 3;
            $order_print->time_end_at = Carbon::now();
            $order_print->user_end_id = Auth::User()->id;
            $machine = Machine::find($order_print->machine_id);
            $machine->work = 0;
            $machine->update();
            $order_print->update();
            $order = Order::find($order_print->order_id);
            $order->count_order_done = $order->count_order_done + 1;
            $order->update();
            if ($order->count_order_done == $order->count_order) {
                $order->status = 2;
                $order->update();
            }
            $log = new Log();
            $log->user_id = Auth::User()->id;
            $log->action = 'end  print order : ' . $order_print->order_id . ' machine : ' . $machine->name;
            $log->save();
            return redirect('/admin')->with('message', 'order end');
        } else {
            return redirect('/admin/order/print/machine/' . $order_print->machine_id)->with('message_fales', 'choose anther one');
        }
    }

    public function orderprintfinishindexall()
    {
        $order_print = Order_Print::where('id', '!=', 1)->where('status', 3)->paginate(200);
        $log = new Log();
        $log->user_id = Auth::User()->id;
        $log->action = 'show all print order finish before';
        $log->save();
        return view('admin.order.order_print.order_print_finish_index', compact('order_print'));
    }

    public function orderprintfinishindexallday(Request $request)
    {
        if ($request->start != null && $request->end != null) {
            if ($request->action == 'time') {
                $start = $request->input('start');
                $end = $request->input('end');
                $order_print = Order_Print::where('status', 3)->where('time_end_at', '>=', $start)->where('time_end_at', '<=', $end)->get();
                $log = new Log();
                $log->user_id = Auth::User()->id;
                $log->action = 'show all print order finish time';
                $log->save();
                return view('admin.order.order_print.order_print_finish_day_index', compact('order_print'));
            } elseif ($request->action == 'export') {
                $start = $request->input('start');
                $end = $request->input('end');
                return Excel::download(new PrintExport($start, $end), time() . ' ' . 'Print.xlsx');
            }
        } else {
            return redirect()->back()->with('message_fales', 'must choose time');
        }
    }

    public function orderprintfinishindex($id)
    {
        $machine = Machine::find($id);
        $order_print = Order_Print::where('status', 3)->where('machine_id', $id)->paginate(200);
        $log = new Log();
        $log->user_id = Auth::User()->id;
        $log->action = 'show all print order finish before machine : ' . $machine->name;
        $log->save();
        return view('admin.order.order_print.order_print_finish_index', compact('order_print'));
    }

    public function orderprintfinishindexdaytime($id)
    {
        $machine = Machine::find($id);
        return view('admin.order.order_print.order_print_finish_day_time', compact('machine'));
    }

    public function orderprintfinishindexdayalltime()
    {
        return view('admin.order.order_print.order_print_finish_day_all_time');
    }

    public function orderprintfinishindexday(Request $request, $id)
    {
        if ($request->start != null && $request->end != null) {
            if ($request->action == 'time') {
                $start = $request->input('start');
                $end = $request->input('end');
                $machine = Machine::find($id);
                $order_print = Order_Print::where('status', 3)->where('machine_id', $id)->where('time_end_at', '>=', $start)->where('time_end_at', '<=', $end)->get();
                $log = new Log();
                $log->user_id = Auth::User()->id;
                $log->action = 'show all laser order finish before at : ' . $start . " to : " . $end . ' machine : ' . $machine->name;
                $log->save();
                return view('admin.order.order_print.order_print_finish_day_index', compact('order_print'));
            } elseif ($request->action == 'export') {
                $start = $request->input('start');
                $end = $request->input('end');
                $machine = Machine::find($id);
                return Excel::download(new PrintMachineExport($start, $end, $machine), time() . ' ' . 'Print.xlsx');
            }
        } else {
            return redirect()->back()->with('message_fales', 'must choose time');
        }
    }

    public function replyprint($id)
    {
        $order_print = Order_Print::find($id);
        $order_print_check = Order_Print::where('machine_id', $order_print->machine_id)->where('id', '<', $id)->get();
        if ($order_print_check->isEmpty()) {
            $print_file = Order_File::where('order_print_id', $id)->where('kind', 2)->get();
            $machine = Machine::find($order_print->machine_id);
            $log = new Log();
            $log->user_id = Auth::User()->id;
            $log->action = 'repled  print order : ' . $order_print->order_id . ' machine : ' . $machine->name;
            $log->save();
            return view('admin.order.order_print.order_print_information', compact('order_print', 'print_file'));
        } else {
            if ($order_print->machine->work == 1) {
                return redirect()->back()->with('message_fales', 'choose anther one');
            } else {
                $print_file = Order_File::where('order_print_id', $id)->where('kind', 2)->get();
                $machine = Machine::find($order_print->machine_id);
                $log = new Log();
                $log->user_id = Auth::User()->id;
                $log->action = 'repled  print order : ' . $order_print->order_id . ' machine : ' . $machine->name;
                $log->save();
                return view('admin.order.order_print.order_print_information', compact('order_print', 'print_file'));
            }
        }
    }

}

?>