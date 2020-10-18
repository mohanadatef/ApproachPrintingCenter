<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Chasier_Transaction;
use App\Models\Customer;
use App\Models\Log;
use App\Models\Order;
use App\Models\Order_Print;
use App\Models\Order_Type;
use App\Models\User_Transaction;
use App\Models\Wallet_Transaction;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Order_Laser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Elibyy\TCPDF\TCPDF;
use Illuminate\Support\Facades\Storage;


class ChasierController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    ////////////////////laser

    public function chasierorderlaserindex()
    {
        $order_laser = Order_Laser::where('status', 3)->get();
        $log = new Log();
        $log->user_id = Auth::User()->id;
        $log->action = 'show all order laser need to pay ';
        $log->save();
        return view('admin.chasier.laser.laser_need_pay_index', compact('order_laser'));
    }

    public function chasierlaserinformation($id)
    {
        $order_laser = Order_Laser::find($id);
        if ($order_laser->status == 3) {
            $log = new Log();
            $log->user_id = Auth::User()->id;
            $log->action = 'show information order laser need to pay : ' . $order_laser->order->id;
            $log->save();
            return view('admin.chasier.laser.laser_pay_information', compact('order_laser'));
        } else {
            return redirect()->back()->with('message_false', 'this order pay before');
        }
    }

    public function chasierlaserpayfinish(Request $request, $id)
    {
        $order_laser = Order_Laser::find($id);
        if ($order_laser->status == 3) {
            $customer = Customer::find($order_laser->order->customer->id);
            $order = Order::find($order_laser->order_id);
            if ($request->number_visa != null) {
                $order_laser->kind_pay = 1;
                $order_laser->number_visa = $request->number_visa;
            }

            if ($request->paid == null) {
                if ($order_laser->order->customer->wallet == 0) {

                    $order_laser->paid =  ($order_laser->total_cost * (100 - $order_laser->discount) / 100);
                } elseif ($order_laser->order->customer->wallet < 0) {

                    $order_laser->paid =  ($order_laser->total_cost * (100 - $order_laser->discount) / 100) + (-1) * $order_laser->order->customer->wallet;
                    $wallet_transaction = new Wallet_Transaction();
                    $wallet_transaction->user_id = Auth::User()->id;
                    $wallet_transaction->customer_id = $customer->id;
                    $wallet_transaction->wallet_before = $customer->wallet;
                    $customer->wallet = 0;
                    $customer->update();
                    $wallet_transaction->wallet_after = $customer->wallet;
                    $wallet_transaction->total = $wallet_transaction->wallet_after - $wallet_transaction->wallet_before;
                    $wallet_transaction->save();
                } elseif ($order_laser->order->customer->wallet > $order_laser->total_cost || $order_laser->order->customer->wallet > $order_laser->total_cost - ($order_laser->total_cost * (100 - $order_laser->discount) / 100)) {

                    $order_laser->paid = 0;
                    $order_laser->rest = 0;
                    $wallet_transaction = new Wallet_Transaction();
                    $wallet_transaction->user_id = Auth::User()->id;
                    $wallet_transaction->customer_id = $customer->id;
                    $wallet_transaction->wallet_before = $customer->wallet;
                    $customer->wallet = $customer->wallet - ($order_laser->total_cost * (100 - $order_laser->discount) / 100);
                    $customer->update();
                    $wallet_transaction->wallet_after = $customer->wallet;
                    $wallet_transaction->total = $wallet_transaction->wallet_after - $wallet_transaction->wallet_before;
                    $wallet_transaction->save();
                }
            } else {
                if ($request->paid >  ($order_laser->total_cost * (100 - $order_laser->discount) / 100)) {
                    $order_laser->paid = $request->paid;
                    $order_laser->rest = $request->paid -  (($order_laser->total_cost * (100 - $order_laser->discount) / 100)-$order_laser->order->customer->wallet);
                    $wallet_transaction = new Wallet_Transaction();
                    $wallet_transaction->user_id = Auth::User()->id;
                    $wallet_transaction->customer_id = $customer->id;
                    $wallet_transaction->wallet_before = $customer->wallet;
                    $customer->wallet = $order_laser->rest;
                    $customer->update();
                    $wallet_transaction->wallet_after = $customer->wallet;
                    $wallet_transaction->total = $wallet_transaction->wallet_after - $wallet_transaction->wallet_before;
                    $wallet_transaction->save();
                } elseif ($request->paid <  ($order_laser->total_cost * (100 - $order_laser->discount) / 100)) {
                    $order_laser->paid = $request->paid;
                    $order_laser->rest = $request->paid -  (($order_laser->total_cost * (100 - $order_laser->discount) / 100)-$order_laser->order->customer->wallet);
                    $wallet_transaction = new Wallet_Transaction();
                    $wallet_transaction->user_id = Auth::User()->id;
                    $wallet_transaction->customer_id = $customer->id;
                    $wallet_transaction->wallet_before = $customer->wallet;
                    $customer->wallet = $order_laser->rest;
                    $customer->update();
                    $wallet_transaction->wallet_after = $customer->wallet;
                    $wallet_transaction->total = $wallet_transaction->wallet_after - $wallet_transaction->wallet_before;
                    $wallet_transaction->save();
                }
            }
            $order->rest = $order->rest + $order_laser->rest;
            $order->paid = $order->paid + $order_laser->paid;
            $order->discount = $order->discount + $order_laser->discount;
            $order->total_cost = $order->total_cost + $order_laser->total_cost;
            $order->count_order_done = $order->count_order_done + 1;
            $order->update();
            if ($order->count_order_done == $order->count_order) {
                $order->status = 2;
                $order->update();
            }
            $order_laser->status = 4;
            $order_laser->user_pay_id = Auth::user()->id;
            $order_laser->time_pay_at = Carbon::now();
            $order_laser->update();
            $log = new Log();
            $log->user_id = Auth::User()->id;
            $log->action = ' pay order : ' . $order_laser->order->id;
            $log->save();
            return redirect('admin/laser/bills/'.$id);
        } else {
            return redirect()->back()->with('message_false', 'this order pay before');
        }

    }

    public function chasierorderlaserpayindex()
    {
        $order_laser = Order_Laser::where('status', 4)->paginate(200);
        $log = new Log();
        $log->user_id = Auth::User()->id;
        $log->action = ' show all order laser finish before';
        $log->save();
        return view('admin.chasier.laser.laser_pay_index', compact('order_laser'));
    }

    ////////////////////print

    public function chasierorderprintindex()
    {
        $order_print = Order_Print::where('status', 0)->get();
        $log = new Log();
        $log->user_id = Auth::User()->id;
        $log->action = 'show all order print need to pay ';
        $log->save();
        return view('admin.chasier.print.print_need_pay_index', compact('order_print'));
    }

    public function chasierprintinformation($id)
    {
        $order_print = Order_Print::find($id);
        if ($order_print->status == 0) {
            $log = new Log();
            $log->user_id = Auth::User()->id;
            $log->action = 'show information order print need to pay : ' . $order_print->order->id;
            $log->save();
            return view('admin.chasier.print.print_pay_information', compact('order_print'));
        } else {
            return redirect()->back()->with('message_fales', 'this order pay before');
        }
    }

    public function chasierprintpayfinish(Request $request, $id)
    {

        $order_print = Order_Print::find($id);
        if ($order_print->status == 0) {
            $customer = Customer::find($order_print->order->customer->id);
            $order = Order::find($order_print->order_id);

            if ($request->number_visa != null) {
                $order_print->kind_pay = 1;
                $order_print->number_visa = $request->number_visa;
            }
            if ($request->paid == null) {
                if ($order_print->order->customer->wallet == 0) {

                    $order_print->paid =  ($order_print->total_cost * (100 - $order_print->discount) / 100);
                } elseif ($order_print->order->customer->wallet < 0) {

                    $order_print->paid =  ($order_print->total_cost * (100 - $order_print->discount) / 100) + (-1) * $order_print->order->customer->wallet;
                    $wallet_transaction = new Wallet_Transaction();
                    $wallet_transaction->user_id = Auth::User()->id;
                    $wallet_transaction->customer_id = $customer->id;
                    $wallet_transaction->wallet_before = $customer->wallet;
                    $customer->wallet = 0;
                    $customer->update();
                    $wallet_transaction->wallet_after = $customer->wallet;
                    $wallet_transaction->total = $wallet_transaction->wallet_after - $wallet_transaction->wallet_before;
                    $wallet_transaction->save();
                } elseif ($order_print->order->customer->wallet > $order_print->total_cost || $order_print->order->customer->wallet > $order_print->total_cost - ($order_print->total_cost * (100 - $order_print->discount) / 100)) {

                    $order_print->paid = 0;
                    $order_print->rest = 0;
                    $wallet_transaction = new Wallet_Transaction();
                    $wallet_transaction->user_id = Auth::User()->id;
                    $wallet_transaction->customer_id = $customer->id;
                    $wallet_transaction->wallet_before = $customer->wallet;
                    $customer->wallet = $customer->wallet - ($order_print->total_cost * (100 - $order_print->discount) / 100);
                    $customer->update();
                    $wallet_transaction->wallet_after = $customer->wallet;
                    $wallet_transaction->total = $wallet_transaction->wallet_after - $wallet_transaction->wallet_before;
                    $wallet_transaction->save();
                }
            } else {
                if ($request->paid >  ($order_print->total_cost * (100 - $order_print->discount) / 100)) {
                    $order_print->paid = $request->paid;
                    $order_print->rest = $request->paid -  (($order_print->total_cost * (100 - $order_print->discount) / 100)-$order_print->order->customer->wallet);
                    $wallet_transaction = new Wallet_Transaction();
                    $wallet_transaction->user_id = Auth::User()->id;
                    $wallet_transaction->customer_id = $customer->id;
                    $wallet_transaction->wallet_before = $customer->wallet;
                    $customer->wallet = $order_print->rest;
                    $customer->update();
                    $wallet_transaction->wallet_after = $customer->wallet;
                    $wallet_transaction->total = $wallet_transaction->wallet_after - $wallet_transaction->wallet_before;
                    $wallet_transaction->save();
                } elseif ($request->paid <  ($order_print->total_cost * (100 - $order_print->discount) / 100)) {
                    $order_print->paid = $request->paid;
                    $order_print->rest = $request->paid -  (($order_print->total_cost * (100 - $order_print->discount) / 100)-$order_print->order->customer->wallet);
                    $wallet_transaction = new Wallet_Transaction();
                    $wallet_transaction->user_id = Auth::User()->id;
                    $wallet_transaction->customer_id = $customer->id;
                    $wallet_transaction->wallet_before = $customer->wallet;
                    $customer->wallet = $order_print->rest;
                    $customer->update();
                    $wallet_transaction->wallet_after = $customer->wallet;
                    $wallet_transaction->total = $wallet_transaction->wallet_after - $wallet_transaction->wallet_before;
                    $wallet_transaction->save();
                }
            }
            $order->rest = $order->rest + $order_print->rest;
            $order->paid = $order->paid + $order_print->paid;
            $order->discount = $order->discount + $order_print->discount;
            $order->total_cost = $order->total_cost + $order_print->total_cost;
            $order->update();
            $order_print->status = 1;
            $order_print->user_pay_id = Auth::user()->id;
            $order_print->time_pay_at = Carbon::now();
            $order_print->update();
            $log = new Log();
            $log->user_id = Auth::User()->id;
            $log->action = ' pay order : ' . $order_print->order->id;
            $log->save();
            return redirect('admin/print/bills/'.$id);
        } else {
            return redirect()->back()->with('message_fales', 'this order pay before');
        }

    }

    public function chasierorderprintpayindex()
    {
        $order_print = Order_Print::where('status', 1)->orwhere('status', 2)->paginate(200);
        $log = new Log();
        $log->user_id = Auth::User()->id;
        $log->action = ' show all order print finish before';
        $log->save();
        return view('admin.chasier.print.print_pay_index', compact('order_print'));
    }

    ////////////////////type
    public function chasierordertypeindex()
    {
        $order_type = Order_Type::where('status', 0)->get();
        $log = new Log();
        $log->user_id = Auth::User()->id;
        $log->action = 'show all order type need to pay ';
        $log->save();
        return view('admin.chasier.type.type_need_pay_index', compact('order_type'));
    }

    public function chasiertypeinformation($id)
    {
        $order_type = Order_Type::find($id);
        if ($order_type->status == 0) {
            $log = new Log();
            $log->user_id = Auth::User()->id;
            $log->action = 'show information order type need to pay : ' . $order_type->order->id;
            $log->save();
            return view('admin.chasier.type.type_pay_information', compact('order_type'));
        } else {
            return redirect()->back()->with('message_fales', 'this order pay before');
        }
    }

    public function chasiertypepayfinish(Request $request, $id)
    {

        $order_type = Order_Type::find($id);
        if ($order_type->status == 0) {
            $customer = Customer::find($order_type->order->customer->id);
            $order = Order::find($order_type->order_id);
            if ($request->number_visa != 0) {
                $order_type->kind_pay = 1;
                $order_type->number_visa = $request->number_visa;
            }
            if ($request->paid == null) {
                if ($order_type->order->customer->wallet == 0) {

                    $order_type->paid =  ($order_type->total_cost * (100 - $order_type->discount) / 100);
                } elseif ($order_type->order->customer->wallet < 0) {

                    $order_type->paid =  ($order_type->total_cost * (100 - $order_type->discount) / 100) + (-1) * $order_type->order->customer->wallet;
                    $wallet_transaction = new Wallet_Transaction();
                    $wallet_transaction->user_id = Auth::User()->id;
                    $wallet_transaction->customer_id = $customer->id;
                    $wallet_transaction->wallet_before = $customer->wallet;
                    $customer->wallet = 0;
                    $customer->update();
                    $wallet_transaction->wallet_after = $customer->wallet;
                    $wallet_transaction->total = $wallet_transaction->wallet_after - $wallet_transaction->wallet_before;
                    $wallet_transaction->save();
                } elseif ($order_type->order->customer->wallet > $order_type->total_cost || $order_type->order->customer->wallet > $order_type->total_cost - ($order_type->total_cost * (100 - $order_type->discount) / 100)) {

                    $order_type->paid = 0;
                    $order_type->rest = 0;
                    $wallet_transaction = new Wallet_Transaction();
                    $wallet_transaction->user_id = Auth::User()->id;
                    $wallet_transaction->customer_id = $customer->id;
                    $wallet_transaction->wallet_before = $customer->wallet;
                    $customer->wallet = $customer->wallet - ($order_type->total_cost * (100 - $order_type->discount) / 100);
                    $customer->update();
                    $wallet_transaction->wallet_after = $customer->wallet;
                    $wallet_transaction->total = $wallet_transaction->wallet_after - $wallet_transaction->wallet_before;
                    $wallet_transaction->save();
                }
            } else {
                if ($request->paid >  ($order_type->total_cost * (100 - $order_type->discount) / 100)) {
                    $order_type->paid = $request->paid;
                    $order_type->rest = $request->paid -  (($order_type->total_cost * (100 - $order_type->discount) / 100)-$order_type->order->customer->wallet);
                    $wallet_transaction = new Wallet_Transaction();
                    $wallet_transaction->user_id = Auth::User()->id;
                    $wallet_transaction->customer_id = $customer->id;
                    $wallet_transaction->wallet_before = $customer->wallet;
                    $customer->wallet = $order_type->rest;
                    $customer->update();
                    $wallet_transaction->wallet_after = $customer->wallet;
                    $wallet_transaction->total = $wallet_transaction->wallet_after - $wallet_transaction->wallet_before;
                    $wallet_transaction->save();
                } elseif ($request->paid <  ($order_type->total_cost * (100 - $order_type->discount) / 100)) {
                    $order_type->paid = $request->paid;
                    $order_type->rest = $request->paid -  (($order_type->total_cost * (100 - $order_type->discount) / 100)-$order_type->order->customer->wallet);
                    $wallet_transaction = new Wallet_Transaction();
                    $wallet_transaction->user_id = Auth::User()->id;
                    $wallet_transaction->customer_id = $customer->id;
                    $wallet_transaction->wallet_before = $customer->wallet;
                    $customer->wallet = $order_type->rest;
                    $customer->update();
                    $wallet_transaction->wallet_after = $customer->wallet;
                    $wallet_transaction->total = $wallet_transaction->wallet_after - $wallet_transaction->wallet_before;
                    $wallet_transaction->save();
                }
            }
            $order->rest = $order->rest + $order_type->rest;
            $order->paid = $order->paid + $order_type->paid;
            $order->discount = $order->discount + $order_type->discount;
            $order->total_cost = $order->total_cost + $order_type->total_cost;
            $order->count_order_done = $order->count_order_done + 1;
            $order->update();
            if ($order->count_order_done == $order->count_order) {
                $order->status = 2;
                $order->update();
            }
            $order_type->status = 1;
            $order_type->user_pay_id = Auth::user()->id;
            $order_type->time_pay_at = Carbon::now();
            $order_type->update();
            $log = new Log();
            $log->user_id = Auth::User()->id;
            $log->action = ' pay order : ' . $order_type->order->id;
            $log->save();
            return redirect('admin/material/bills/'.$id);
        } else {
            return redirect()->back()->with('message_fales', 'this order pay before');
        }
    }

    public function chasierordertypepayindex()
    {
        $order_type = Order_Type::where('status', 1)->paginate(200);
        $log = new Log();
        $log->user_id = Auth::User()->id;
        $log->action = ' show all order type finish before';
        $log->save();
        return view('admin.chasier.type.type_pay_index', compact('order_type'));
    }

    public function chasiercustomer()
    {
        return view('admin.chasier.customer.chasier_start');
    }

    public function chasiersearchcustomer(Request $request)
    {
        if ($request->phone != null) {
            $customer = Customer::where('phone', $request->phone)->first();
            if ($customer != null) {
                $log = new Log();
                $log->user_id = Auth::User()->id;
                $log->action = 'search for customer';
                $log->save();
                return view('admin.chasier.customer.chasier_money_customer', compact('customer'));
            } else {
                return redirect()->back()->with('message_fales', 'No Customer Found!');
            }
        } else {
            return redirect()->back()->with('message_fales', 'No Customer Found!');
        }
    }

    public function chasieraddmoney(Request $request, $id)
    {
        $customer = Customer::find($id);
        $wallet_transaction = new Wallet_Transaction();
        $wallet_transaction->user_id = Auth::User()->id;
        $wallet_transaction->customer_id = $customer->id;
        $wallet_transaction->wallet_before = $customer->wallet;
        $customer->wallet = $customer->wallet + $request->money;
        $customer->update();
        $wallet_transaction->wallet_after = $customer->wallet;
        $wallet_transaction->total = $request->money;
        $wallet_transaction->save();
        $log = new Log();
        $log->user_id = Auth::User()->id;
        $log->action = 'add money to customer : ' . $customer->name;
        $log->save();
        return view('admin.chasier.customer.chasier_start')->with('message', 'Done');
    }

    public function chasierdiscountprint($id)
    {
        $order_print = Order_Print::find($id);
        if ($order_print->status == 0) {
            return view('admin.chasier.print.discount_print', compact('order_print'));
        } else {
            return redirect()->back()->with('message_fales', 'this order pay before');
        }
    }

    public function chasierdiscountlaser($id)
    {
        $order_laser = Order_Laser::find($id);
        if ($order_laser->status == 3) {
            return view('admin.chasier.laser.discount_laser', compact('order_laser'));
        } else {
            return redirect()->back()->with('message_fales', 'this order pay before');
        }
    }

    public function chasierdiscounttype($id)
    {
        $order_type = Order_Type::find($id);
        if ($order_type->status == 0) {
            return view('admin.chasier.type.discount_type', compact('order_type'));
        } else {
            return redirect()->back()->with('message_fales', 'this order pay before');
        }
    }

    public function chasierdiscountprintcode(Request $request, $id)
    {
        $order_print = Order_Print::find($id);
        if ($order_print->status == 0) {
            $user = User::where('code_discount', $request->code)->first();
            if ($user != null) {
                $order_print->discount = $request->discount;
                $order_print->user_discount_id = $user->id;
                $order_print->update();
                $log = new Log();
                $log->user_id = Auth::User()->id;
                $log->action = 'make discount in print to customer : ' . $order_print->order->customer->name . " & discount " . $request->discount;
                $log->save();
                return redirect('admin/chasier/print/pay/' . $order_print->id)->with('message', 'Discount Done');
            } else {
                return redirect()->back()->with('message_fales', 'this code wrong');
            }
        } else {
            return redirect('/admin')->back()->with('message_fales', 'this order pay before');
        }
    }

    public function chasierdiscountlasercode(Request $request, $id)
    {
        $order_laser = Order_Laser::find($id);
        if ($order_laser->status == 3) {
            $user = User::where('code_discount', $request->code)->first();
            if ($user != null) {
                $order_laser->discount = $request->discount;
                $order_laser->user_discount_id = $user->id;
                $order_laser->update();
                $log = new Log();
                $log->user_id = Auth::User()->id;
                $log->action = 'make discount in laser to customer : ' . $order_laser->order->customer->name . " & discount " . $request->discount;
                $log->save();
                return redirect('admin/chasier/laser/pay/' . $order_laser->id)->with('message', 'Discount Done');
            } else {
                return redirect()->back()->with('message_fales', 'this code wrong');
            }
        } else {
            return redirect('/admin')->back()->with('message_fales', 'this order pay before');
        }
    }

    public function chasierdiscounttypecode(Request $request, $id)
    {
        $order_type = Order_Laser::find($id);
        if ($order_type->status == 0) {
            $user = User::where('code_discount', $request->code)->first();
            if ($user != null) {
                $order_type->discount = $request->discount;
                $order_type->user_discount_id = $user->id;
                $order_type->update();
                $log = new Log();
                $log->user_id = Auth::User()->id;
                $log->action = 'make discount in type to customer : ' . $order_type->order->customer->name . " & discount " . $request->discount;
                $log->save();
                return redirect('admin/chasier/type/pay/' . $order_type->id)->with('message', 'Discount Done');
            } else {
                return redirect()->back()->with('message_fales', 'this code wrong');
            }
        } else {
            return redirect('/admin')->back()->with('message_fales', 'this order pay before');
        }
    }

    public function endchasiershow()
    {
        $total_e = 0;
        $total_e_c = 0;
        $total_e_v = 0;
        $total_laser_e = 0;
        $total_laser_d = 0;
        $total_laser_e_c = 0;
        $total_laser_e_v = 0;
        $total_print_e = 0;
        $total_print_d = 0;
        $total_print_e_c = 0;
        $total_print_e_v = 0;
        $total_type_e = 0;
        $total_type_d = 0;
        $total_type_e_c = 0;
        $total_type_e_v = 0;
        $total_d = 0;
        $laser_e = DB::table("order_lasers")->where('chasier_status', 0)->where('status', 4)->pluck("paid", "id");
        $laser_d = DB::table("order_lasers")->where('chasier_status', 0)->where('status', 5)->pluck("paid", "id");
        $laser_e_c = DB::table("order_lasers")->where('chasier_status', 0)->where('status', 4)->where('kind_pay', 0)->pluck("paid", "id");
        $laser_e_v = DB::table("order_lasers")->where('chasier_status', 0)->where('status', 4)->where('kind_pay', 1)->pluck("paid", "id");
        $print_e = DB::table("order_prints")->where('chasier_status', 0)->wherein('status', [1, 2, 3])->pluck("paid", "id");
        $print_d = DB::table("order_prints")->where('chasier_status', 0)->where('status', 4)->pluck("paid", "id");
        $print_e_c = DB::table("order_prints")->where('chasier_status', 0)->wherein('status', [1, 2, 3])->where('kind_pay', 0)->pluck("paid", "id");
        $print_e_v = DB::table("order_prints")->where('chasier_status', 0)->wherein('status', [1, 2, 3])->where('kind_pay', 1)->pluck("paid", "id");
        $type_e = DB::table("order_types")->where('chasier_status', 0)->where('status', 1)->pluck("paid", "id");
        $type_d = DB::table("order_types")->where('chasier_status', 0)->where('status', 2)->pluck("paid", "id");
        $type_e_c = DB::table("order_types")->where('chasier_status', 0)->where('status', 1)->where('kind_pay', 0)->pluck("paid", "id");
        $type_e_v = DB::table("order_types")->where('chasier_status', 0)->where('status', 1)->where('kind_pay', 1)->pluck("paid", "id");
        foreach ($laser_e as $laser) {
            $total_e = $total_e + $laser;
            $total_laser_e = $total_laser_e + $laser;
        }
        foreach ($laser_e_c as $laser) {
            $total_e_c = $total_e_c + $laser;
            $total_laser_e_c = $total_laser_e_c + $laser;
        }
        foreach ($laser_e_v as $laser) {
            $total_e_v = $total_e_v + $laser;
            $total_laser_e_v = $total_laser_e_v + $laser;
        }
        foreach ($laser_d as $laser) {
            $total_d = $total_d + $laser;
            $total_laser_d = $total_laser_d + $laser;
        }
        foreach ($print_e as $print) {
            $total_e = $total_e + $print;
            $total_print_e = $total_print_e + $print;
        }
        foreach ($print_e_c as $print) {
            $total_e_c = $total_e_c + $print;
            $total_print_e_c = $total_print_e_c + $print;
        }
        foreach ($print_e_v as $print) {
            $total_e_v = $total_e_v + $print;
            $total_print_e_v = $total_print_e_v + $print;
        }
        foreach ($print_d as $print) {
            $total_d = $total_d + $print;
            $total_print_d = $total_print_d + $print;
        }
        foreach ($type_e as $type) {
            $total_e = $total_e + $type;
            $total_type_e = $total_type_e + $type;
        }
        foreach ($type_e_c as $type) {
            $total_e_c = $total_e_c + $type;
            $total_type_e_c = $total_type_e_c + $type;
        }
        foreach ($type_e_v as $type) {
            $total_e_v = $total_e_v + $type;
            $total_type_e_v = $total_type_e_v + $type;
        }
        foreach ($type_d as $type) {
            $total_d = $total_d + $type;
            $total_type_d = $total_type_d + $type;
        }
        $laser_e = count($laser_e);
        $laser_d = count($laser_d);
        $laser_e_c = count($laser_e_c);
        $laser_e_v = count($laser_e_v);
        $print_e = count($print_e);
        $print_d = count($print_d);
        $print_e_c = count($print_e_c);
        $print_e_v = count($print_e_v);
        $type_e = count($type_e);
        $type_d = count($type_d);
        $type_e_c = count($type_e_c);
        $type_e_v = count($type_e_v);
        $total_count_e = $laser_e + $print_e + $type_e;
        $total_count_e_v = $laser_e_v + $print_e_v + $type_e_v;
        $total_count_e_c = $laser_e_c + $print_e_c + $type_e_c;
        $total_count_d = $laser_d + $print_d + $type_d;
        $total_count_e_d = $total_count_d + $total_count_e;
        $chasiers = Chasier_Transaction::all()->last();
        if ($chasiers == null) {
            $chasier = 0;
        } else {
            $chasier = $chasiers->total_chasier_after;
        }
        $total_input=0;
        $total_out=0;
        $user_input = User_Transaction::where('chasier_status',0)->where('kind',1)->get();
        foreach ($user_input as $userinput) {
            $total_input = $total_input + $userinput->total;
        }
        $user_out = User_Transaction::where('chasier_status',0)->where('kind',2)->get();
        foreach ($user_out as $userout) {
            $total_out = $total_out + $userout->total;
        }
        $log = new Log();
        $log->user_id = Auth::User()->id;
        $log->action = 'show chasier money ';
        $log->save();
        return view('admin.chasier.chasier.end_chasier',
            compact('total_e', 'total_e_c', 'total_e_v', 'total_d',
                'total_laser_e', 'total_laser_e_c', 'total_laser_e_v', 'total_laser_d',
                'total_print_e', 'total_print_e_c', 'total_print_e_v', 'total_print_d',
                'total_type_e', 'total_type_e_c', 'total_type_e_v', 'total_type_d',
                'total_count_e', 'total_count_e_v', 'total_count_e_c', 'total_count_d',
                'laser_e', 'laser_e_v', 'laser_e_c', 'laser_d',
                'print_e', 'print_e_v', 'print_e_c', 'print_d',
                'type_e', 'type_e_v', 'type_e_c', 'type_d', 'total_count_e_d', 'chasier','total_input','total_out'));
    }

    public function endchasier(Request $request)
    {
        $laser_e = Order_Laser::where('chasier_status', 0)->where('status', 4)->get();
        $laser_d = Order_Laser::where('chasier_status', 0)->where('status', 5)->get();
        $print_e = Order_Print::where('chasier_status', 0)->wherein('status', [1, 2, 3])->get();
        $print_d = Order_Print::where('chasier_status', 0)->where('status', 4)->get();
        $type_e = Order_Type::where('chasier_status', 0)->where('status', 1)->get();
        $type_d = Order_Type::where('chasier_status', 0)->where('status', 2)->get();
        $user_input = User_Transaction::where('chasier_status',0)->where('kind',1)->get();
        $user_out = User_Transaction::where('chasier_status',0)->where('kind',2)->get();
        if (!$user_input->isEmpty()) {
            foreach ($user_input as $nput) {
                $nput->chasier_status = 1;
                $nput->update();
            }
        }
        if (!$user_out->isEmpty()) {
            foreach ($user_out as $nput) {
                $nput->chasier_status = 1;
                $nput->update();
            }
        }
        if (!$laser_e->isEmpty()) {
            foreach ($laser_e as $laser) {
                $laser->chasier_status = 1;
                $laser->update();
            }
        }
        if (!$laser_d->isEmpty()) {
            foreach ($laser_d as $laser) {
                $laser->chasier_status = 1;
                $laser->update();
            }
        }
        if (!$print_e->isEmpty()) {
            foreach ($print_e as $print) {
                $print->chasier_status = 1;
                $print->update();
            }
        }
        if (!$print_d->isEmpty()) {
            foreach ($print_d as $print) {
                $print->chasier_status = 1;
                $print->update();
            }
        }
        if (!$type_e->isEmpty()) {
            foreach ($type_e as $type) {
                $type->chasier_status = 1;
                $type->update();
            }
        }
        if (!$type_d->isEmpty()) {
            foreach ($type_d as $type) {
                $type->chasier_status = 1;
                $type->update();
            }
        }
        $chasiers = Chasier_Transaction::all()->last();
        $chasier = new Chasier_Transaction();
        $chasier->user_end_id = Auth::User()->id;
        if ($request->stay_chasier == null) {
            $x = 0;
        } else {
            $x = $request->stay_chasier;
        }
        if ($request->chasier_now == null) {
            $y = 0;
        } else {
            $y = $request->chasier_now;
        }
        if ($chasiers != null) {
            $chasier->total_chasier_before = $chasiers->total_chasier_after;
        } else {
            $chasier->total_chasier_before = 0;
        }
        $chasier->total_bank = $y - $x;
        $chasier->total_chasier_after = $x;
        $chasier->save();
        $log = new Log();
        $log->user_id = Auth::User()->id;
        $log->action = 'end chasier money ';
        $log->save();
        return view('admin.admin')->with('message', 'chasier in done');
    }


    public function order_laser_discarded($id)
    {
        $order_laser = Order_Laser::find($id);
        $customer = Customer::find($order_laser->order->customer->id);
        if ($order_laser->total_cost == $order_laser->paid + ($order_laser->total_cost * (100 - $order_laser->discount) / 100)) {
            $order_laser->discarded = $order_laser->paid;
        } elseif ($order_laser->total_cost > $order_laser->paid + ($order_laser->total_cost * (100 - $order_laser->discount) / 100)) {
            $order_laser->discarded = $order_laser->paid;
            $customer->wallet = $customer->wallet + $order_laser->total_cost - $order_laser->paid + ($order_laser->total_cost * (100 - $order_laser->discount) / 100);
        } elseif ($order_laser->total_cost < $order_laser->paid + ($order_laser->total_cost * (100 - $order_laser->discount) / 100)) {
            $order_laser->discarded = $order_laser->paid;
            $customer->wallet = $customer->wallet + $order_laser->total_cost - $order_laser->paid + ($order_laser->total_cost * (100 - $order_laser->discount) / 100);
        }
        $customer->save();
        if ($order_laser->chasier_status == 1) {
            $order_laser->chasier_status = 0;
        }
        $order_laser->status = 5;
        $order_laser->save();
        return redirect('/admin')->with('message', 'Done');
    }

    public function order_print_discarded($id)
    {
        $order_print = Order_Print::find($id);
        $customer = Customer::find($order_print->order->customer->id);
        if ($order_print->total_cost == $order_print->paid + ($order_print->total_cost * (100 - $order_print->discount) / 100)) {
            $order_print->discarded = $order_print->paid;
        } elseif ($order_print->total_cost > $order_print->paid + ($order_print->total_cost * (100 - $order_print->discount) / 100)) {
            $order_print->discarded = $order_print->paid;
            $customer->wallet = $customer->wallet + $order_print->total_cost - $order_print->paid + ($order_print->total_cost * (100 - $order_print->discount) / 100);
        } elseif ($order_print->total_cost < $order_print->paid + ($order_print->total_cost * (100 - $order_print->discount) / 100)) {
            $order_print->discarded = $order_print->paid;
            $customer->wallet = $customer->wallet + $order_print->total_cost - $order_print->paid + ($order_print->total_cost * (100 - $order_print->discount) / 100);
        }
        $customer->save();
        if ($order_print->chasier_status == 1) {
            $order_print->chasier_status = 0;

        }
        $order_print->status = 4;
        $order_print->save();
        return redirect('/admin')->with('message', 'Done');
    }

    public function order_type_discarded($id)
    {
        $order_type = Order_Type::find($id);
        $customer = Customer::find($order_type->order->customer->id);
        if ($order_type->total_cost == $order_type->paid + ($order_type->total_cost * (100 - $order_type->discount) / 100)) {
            $order_type->discarded = $order_type->paid;
        } elseif ($order_type->total_cost > $order_type->paid + ($order_type->total_cost * (100 - $order_type->discount) / 100)) {
            $order_type->discarded = $order_type->paid;
            $customer->wallet = $customer->wallet + $order_type->total_cost - $order_type->paid + ($order_type->total_cost * (100 - $order_type->discount) / 100);
        } elseif ($order_type->total_cost < $order_type->paid + ($order_type->total_cost * (100 - $order_type->discount) / 100)) {
            $order_type->discarded = $order_type->paid;
            $customer->wallet = $customer->wallet + $order_type->total_cost - $order_type->paid + ($order_type->total_cost * (100 - $order_type->discount) / 100);
        }
        $customer->save();
        if ($order_type->chasier_status == 1) {
            $order_type->chasier_status = 0;

        }
        $order_type->status = 2;
        $order_type->save();
        return redirect('/admin')->with('message', 'Done');
    }

    public function order_laser_print($id)
    {
        $order_laser = Order_Laser::find($id);
        $log = new Log();
        $log->user_id = Auth::user()->id;
        $log->action_status = 'print laser bills';
        $log->data_change = $order_laser->id;
        $log->save();
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('approachprintingcenter');
        $pdf->SetTitle('Order');
        $pdf->SetSubject('Order laser');
        $pdf->SetKeywords('Order, PDF');
        $pdf->setPrintHeader(true);
        $pdf->setPrintFooter(false);

        $pdf->SetTitle($order_laser->order->id . "_" . "MA");

        $pdf->SetFont('aealarabiya', '', 11);
        $pdf->SetFontSubsetting(false);
        $pdf->AddPage();

        $pdf->SetFillColor(255, 255, 255);
        $pdf->SetTextColor(0);
        $pdf->SetDrawColor(0, 0, 0);
        $pdf->SetLineWidth(0.3);
        $pdf->SetFont('', 'B');
// Period of Coverage
        $pdf->SetFontSize(20);
        $pdf->Image('public/image/info/approach logo-01.png', 30, 10, 35, 35);
        $pdf->SetFontSize(11);
        $pdf->Cell(63, 6, 'time create : ' . Carbon::now(), '0', 1, 'L', 1);
        $pdf->Cell(63, 6, 'number bills : ' .$order_laser->order_id .'-'.$order_laser->id .'-'.auth::user()->id, '0', 1, 'L', 1);
        $pdf->Cell(63, 6, 'order number : ' . $order_laser->order_id, '0', 1, 'L', 1);
        $pdf->Cell(63, 6, 'Customer name : ' . $order_laser->order->customer->name, '0', 1, 'L', 1);
        $pdf->Cell(63, 6, 'Customer number : ' . $order_laser->order->customer->phone, '0', 1, 'L', 1);
        $pdf->Cell(63, 6, 'time pay :  ' . $order_laser->time_pay_at, '1', 1, 'L', 1);
        $pdf->Cell(63, 6, 'total cost :  ' . $order_laser->total_cost, '1', 1, 'L', 1);
        $pdf->Cell(63, 6, 'paid :  ' . $order_laser->paid, '1', 1, 'L', 1);
        $pdf->Cell(63, 6, 'chasier name:  ' . auth::user()->name, '1', 1, 'L', 1);
        $pdfname = $order_laser->order_id .'-'.$order_laser->id .'-'.auth::user()->id . ".pdf";
        return $pdf->Output($pdfname, 'I');

    }
    public function chasiercustomerwallet()
    {
        return view('admin.chasier.customer.chasier_customer_wallet');
    }
    public function chasiersearchcustomerwallet(Request $request)
    {
        if ($request->phone != null) {
            $customer = Customer::where('phone', $request->phone)->first();
            if ($customer != null) {
                $log = new Log();
                $log->user_id = Auth::User()->id;
                $log->action = 'search for customer';
                $log->save();
                $transfer= Wallet_Transaction::where('customer_id',$customer->id)->orderby('created_at','desc')->paginate(200);
                return view('admin.chasier.customer.chasier_money_customer_wallet', compact('transfer'));
            } else {
                return redirect()->back()->with('message_fales', 'No Customer Found!');
            }
        } else {
            return redirect()->back()->with('message_fales', 'No Customer Found!');
        }
    }
}

?>