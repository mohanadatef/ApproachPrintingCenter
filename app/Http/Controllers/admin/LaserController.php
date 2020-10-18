<?php

namespace App\Http\Controllers\admin;

use App\Exports\LaserExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Customer;
use App\Models\Log;
use App\Models\Order;
use App\User;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Machine;
use App\Models\Order_File;
use App\Models\Order_Laser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class LaserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index()
    {
        $order_laser = Order_Laser::where('status', 0)->get();
        $machine = Machine::where('kind', 1)->where('work', 0)->get();
        $log = new Log();
        $log->user_id = Auth::User()->id;
        $log->action = 'show all laser order need to start';
        $log->save();
        return view('admin.order.order_laser.order_laser_index', compact('order_laser', 'machine'));
    }

    public function showlaser($id)
    {
        $order_laser_check = Order_Laser::where('id', '<', $id)->where('status', 0)->get();
        if (!$order_laser_check->isEmpty()) {
            return redirect()->back()->with('message_fales', 'choose anther one');
        } else {
            $order_laser = Order_Laser::find($id);
            $laser_file = Order_File::where('order_laser_id', $id)->where('kind', 1)->get();
            $machine = DB::table("machines")->where('kind', 1)->where('work', 0)->pluck("name", "id");
            $log = new Log();
            $log->user_id = Auth::User()->id;
            $log->action = 'show information laser order : ' . $order_laser->order_id;
            $log->save();
            return view('admin.order.order_laser.order_laser_information', compact('order_laser', 'machine', 'laser_file'));
        }
    }

    public function lasercodeskip($id)
    {
        $order_laser = Order_Laser::find($id);
        if ($order_laser->status == 0) {
            return view('admin.order.order_laser.order_laser_code', compact('order_laser'));
        } else {
            return redirect()->back()->with('message_fales', 'this code wrong');
        }
    }

    public function skiplaser(Request $request, $id)
    {
        $order_laser = Order_Laser::find($id);
        if ($order_laser->status == 0) {
            $user = User::where('code_discount', $request->code)->first();
            if ($user != null) {
                $order_laser->user_skip_id = $user->id;
                $order_laser->update();
                $laser_file = Order_File::where('order_laser_id', $id)->where('kind', 1)->get();
                $machine = DB::table("machines")->where('kind', 1)->where('work', 0)->pluck("name", "id");
                $log = new Log();
                $log->user_id = Auth::User()->id;
                $log->action = 'skip laser order : ' . $order_laser->order_id . " by code user : " . $user->id;
                $log->save();
                return view('admin.order.order_laser.order_laser_information', compact('order_laser', 'machine', 'laser_file'));
            } else {
                return redirect()->back()->with('message_fales', 'this code wrong');
            }
        } else {
            return redirect('/admin')->with('message_fales', 'this order pay before');
        }
    }

    public function startlaser(Request $request, $id)
    {
        $order_laser = Order_Laser::find($id);
        if($request->machine_id != null)
        {
        if ($order_laser->status == 0) {
            $order_laser->time_start = Carbon::now()->format("H:i:s");
            $order_laser->status = 1;
            $order_laser->time_start_at = Carbon::now();
            $order_laser->machine_id = $request->machine_id;
            $order_laser->user_start_id = Auth::User()->id;
            $machine = Machine::find($request->machine_id);
            $machine->work = 1;
            $machine->update();
            $order_laser->update();
            $log = new Log();
            $log->user_id = Auth::User()->id;
            $log->action = 'start laser order : ' . $order_laser->order_id;
            $log->save();
            return view('admin.admin')->with('message', 'order start');
        } else {
            return redirect('/admin/order/laser')->with('message_fales', 'choose anther one');
        }
        }
        else{
            return redirect()->back()->with('message_fales', 'choose anther one');
        }

    }

    public function worklaser()
    {
        $order_laser = Order_Laser::where('status', 1)->get();
        $log = new Log();
        $log->user_id = Auth::User()->id;
        $log->action = 'show all laser order work';
        $log->save();
        return view('admin.order.order_laser.order_laser_work', compact('order_laser'));
    }

    public function endlaser($id)
    {
        $order_laser = Order_Laser::find($id);
        if ($order_laser->status == 1) {
            $order_laser->time_end = Carbon::now()->format('H:i:s');
            $order_laser->update();
            $order_laser->status = 2;
            $order_laser->time_end_at = Carbon::now();
            $order_laser->total_time_system = gmdate('H:i:s', Carbon::parse($order_laser->time_end)->getTimestamp() - Carbon::parse($order_laser->time_start)->getTimestamp());
            $order_laser->user_end_id = Auth::User()->id;
            $machine = Machine::find($order_laser->machine_id);
            $machine->work = 0;
            $order_laser->total_cost_system = (Carbon::parse($order_laser->total_time_system)->format('H') * 60 * $machine->price) + ((Carbon::parse($order_laser->total_time_system)->format('i')) * $machine->price) + ((Carbon::parse($order_laser->total_time_system)->format('s')) / 60 * $machine->price);
            $machine->update();
            $order_laser->update();
            $log = new Log();
            $log->user_id = Auth::User()->id;
            $log->action = 'end  laser order : ' . $order_laser->order_id;
            $log->save();
            return redirect('/admin/order/laser/finish/' . $order_laser->id)->with('message', 'order end');
        } else {
            return redirect('/admin/order/laser')->with('message_fales', 'choose anther one');
        }
    }

    public function finishlaser($id)
    {
        $order_laser = Order_Laser::find($id);
        return view('admin.order.order_laser.order_laser_finish', compact('order_laser'));
    }

    public function cashierlasergo(Request $request, $id)
    {
        $order_laser = Order_Laser::find($id);
        if ($order_laser->status == 2) {
            $order_laser->total_time_user = $request->total_time_user;
            $order_laser->total_cost_user = $request->total_cost_user;
            if ($request->notes != null) {
                $order_laser->notes = $request->notes;
            }
            $order_laser->status = 3;
            if ($request->total_cost_user != 0) {
                $order_laser->total_cost = $request->total_cost_user;
                $order_laser->update();
            } else {
                if ($order_laser->total_time_user != 0) {
                    $machine = Machine::find($order_laser->machine_id);
                    $order_laser->total_cost = $order_laser->total_time_user * $machine->price;
                    $order_laser->update();
                } else {
                    $order_laser->total_cost = $order_laser->total_cost_system;
                    $order_laser->update();
                }
            }
            $order_laser->update();
            $order = Order::find($order_laser->order_id);
            $order->total_cost = $order->total_cost + $order_laser->total_cost;
            $order->update();
            $log = new Log();
            $log->user_id = Auth::User()->id;
            $log->action = 'finish laser order : ' . $order_laser->order_id;
            $log->save();
            return view('admin.admin')->with('message', 'order start');
        } else {
            return redirect('/admin/order/laser')->with('message_fales', 'choose anther one');
        }
    }

    public function orderlaserfinishindex()
    {
        $order_laser = Order_Laser::where('status', 3)->orwhere('status', 4)->paginate(200);
        $log = new Log();
        $log->user_id = Auth::User()->id;
        $log->action = 'show all laser order finish before';
        $log->save();
        return view('admin.order.order_laser.order_laser_finish_index', compact('order_laser'));
    }

    public function orderlaserfinishindexdaytime()
    {
        return view('admin.order.order_laser.order_laser_finish_day_time');
    }

    public function orderlaserfinishindexday(Request $request)
    {
        if ($request->start != null && $request->end != null) {
            if ($request->action == 'time') {
                $start = $request->input('start');
                $end = $request->input('end');
                $log = new Log();
                $log->user_id = Auth::User()->id;
                $log->action = 'show all laser order finish before at : ' . $start . " to : " . $end;
                $log->save();
                $order_laser = Order_Laser::where('status', 4)->where('time_pay_at', '>=', $start)->where('time_pay_at', '<=', $end)->get();
                return view('admin.order.order_laser.order_laser_finish_day_index', compact('order_laser'));
            } elseif ($request->action == 'export') {
                $start = $request->input('start');
                $end = $request->input('end');
                return Excel::download(new LaserExport($start, $end), time() . ' ' . 'Laser.xlsx');
            }
        } else {
            return redirect()->back()->with('message_fales', 'must choose time');
        }
    }

    public function orderlaserfinishproblem()
    {
        $order_laser = Order_Laser::where('status', 2)->get();
        $log = new Log();
        $log->user_id = Auth::User()->id;
        $log->action = 'show all laser order not finish';
        $log->save();
        return view('admin.order.order_laser.order_laser_finish_problem', compact('order_laser'));
    }

}

?>