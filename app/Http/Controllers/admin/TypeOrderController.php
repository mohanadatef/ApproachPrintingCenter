<?php

namespace App\Http\Controllers\admin;


use App\Http\Controllers\Controller;
use App\Models\Log;
use App\Models\Order_Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Exports\TypeExport;
use Maatwebsite\Excel\Facades\Excel;


class TypeOrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function ordertypefinishindex()
    {
        $order_type = Order_Type::orwhere('status', 1)->paginate(200);
        $log = new Log();
        $log->user_id = Auth::User()->id;
        $log->action = 'show all type order finish before';
        $log->save();
        return view('admin.order.order_type.order_type_finish_index', compact('order_type'));
    }

    public function ordertypefinishindexdaytime()
    {
        return view('admin.order.order_type.order_type_finish_day_time');
    }

    public function ordertypefinishindexday(Request $request)
    {
        if ($request->start != null && $request->end != null) {
            if ($request->action == 'time') {
                $start = $request->input('start');
                $end = $request->input('end');
                $log = new Log();
                $log->user_id = Auth::User()->id;
                $log->action = 'show all type order finish before at : ' . $start . " to : " . $end;
                $log->save();
                $order_type = Order_Type::where('status', 1)->where('time_pay_at', '>=', $start)->where('time_pay_at', '<=', $end)->get();
                return view('admin.order.order_type.order_type_finish_day_index', compact('order_type'));
            } elseif ($request->action == 'export') {
                $start = $request->input('start');
                $end = $request->input('end');
                return Excel::download(new TypeExport($start, $end), time() . ' ' . 'Material.xlsx');
            }
        } else {
            return redirect()->back()->with('message_fales', 'must choose time');
        }
    }

}

?>