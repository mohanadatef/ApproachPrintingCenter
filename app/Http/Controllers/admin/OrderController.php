<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\Customer\CustomerCreateRequest;
use App\Http\Requests\admin\Customer\CustomerEditRequest;

use App\Models\Cart_File;
use App\Models\Cart_Laser;
use App\Models\Cart_Print;
use App\Models\Cart_Type;
use App\Models\Log;
use App\Models\Order_File;
use App\Models\Order_Laser;
use App\Models\Order_Print;
use App\Models\Order_Type;
use App\Models\Print_Price;
use App\Models\Store;
use App\Models\Store_Transaction;
use App\Models\Type;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Exports\OrderExport;
use Maatwebsite\Excel\Facades\Excel;


class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function start()
    {
        return view('admin.order.order_start');
    }

    public function createcustomerget()
    {
        $phone='';
        return view('admin.order.order_customer_create',compact('phone'));
    }

    public function createcustomerpost(CustomerCreateRequest $request)
    {
        $newcustomer = new Customer();
        $data['wallet'] = 0;
        if($request->name == null)
        {
            $data['name']='defult';
        }
        if($request->place == null)
        {
            $data['place']='defult';
        }
        if($request->email == null)
        {
            $data['email']='defult@defult.com';
        }
        $data['status']=1;
        $newcustomer->create(array_merge($request->all(), $data));
        $customer = Customer::where('phone', $request->phone)->first();
        $log = new Log();
        $log->user_id=Auth::User()->id;
        $log->action='add customer : '. $customer->name;
        $log->save();
        return view('admin.order.order_search_customer', compact('customer'))->with('message', 'Add Customer Is Done!');
    }

    public function editcustomerget($id)
    {
        $customer = Customer::find($id);
        return view('admin.order.order_customer_edit', compact('customer'));
    }

    public function editcustomerpost(CustomerEditRequest $request, $id)
    {
        $customer = Customer::find($id);
        $customer->update($request->all());
        $log = new Log();
        $log->user_id=Auth::User()->id;
        $log->action='edit customer : '. $customer->name;
        $log->save();
        return view('admin.order.order_search_customer', compact('customer'))->with('message', 'Edit Customer Is Done!');

    }
    public function editstatues($id)
    {
        $newcustomer = Customer::find($id);
        if ($newcustomer->statues == 1) {
            $newcustomer->statues = '0';
        } elseif ($newcustomer->statues == 0) {
            $newcustomer->statues = '1';
        }
        $newcustomer->save();
        $log = new Log();
        $log->user_id=Auth::User()->id;
        $log->action='edit status customer '.$newcustomer->name ;
        $log->save();
        return redirect()->back()->with('message', 'Edit Statues Is Done!');
    }
    public function search(Request $request)
    {
        if ($request->phone != null) {
            $customer = Customer::where('phone', $request->phone)->first();
            if ($customer != null) {
                if($customer->status ==1)
                {
                $log = new Log();
                $log->user_id=Auth::User()->id;
                $log->action='search customer : '. $customer->name;
                $log->save();
                return view('admin.order.order_search_customer', compact('customer'));
            }
            else
            {
                $log = new Log();
                $log->user_id=Auth::User()->id;
                $log->action='search customer : '. $customer->name;
                $log->save();
                return redirect()->back()->with('message_fales', 'Customer IN Black List!');
            }} else {
                $phone=$request->phone;
                return view('admin.order.order_customer_create',compact('phone'));
            }
        } else {
            return redirect()->back()->with('message_fales', 'No Customer Found!');
        }
    }

    public function buytype($customer)
    {

        $store = DB::table("stores")->where('quantity', '>', 0)->orwhere('roll_size', '>', 0)->pluck("type_id", "id");
        $store1= DB::table("stores")->where('quantity', '>', 0)->orwhere('roll_size', '>', 0)->pluck("size_id", "id");
        $type = DB::table("types")->wherein('id', $store)->orderby('order')->pluck("name", "id");
        $size = DB::table("sizes")->wherein('id', $store1)->orderby('order')->pluck("name", "id");
        $customer = Customer::find($customer);
        return view('admin.order.type.order_buy_type', compact('customer', 'type','size'));
    }

    public function buyprint($customer)
    {
        //$price_t = DB::table("print_prices")->pluck("type_id", "id");
        //$price_s = DB::table("print_prices")->pluck("size_id", "id");
        //$price_c = DB::table("print_prices")->pluck("color_id", "id");
        $price_m = DB::table("print_prices")->pluck("machine_id", "id");
       // $store = DB::table("stores")->where('quantity', '>', 0)->orwhere('roll_size', '>', 0)->pluck("type_id", "id");
        //$store1= DB::table("stores")->where('quantity', '>', 0)->orwhere('roll_size', '>', 0)->pluck("size_id", "id");
        //$type = DB::table("types")->wherein('id', $store)->wherein('id', $price_t)->orderby('order')->pluck("name", "id");
        $machine = DB::table("machines")->where('kind', 2)->wherein('id', $price_m)->orderby('order')->pluck("name", "id");
        //$color = DB::table("colors")->orderby('order')->wherein('id', $price_c)->pluck("name", "id");
       // $size = DB::table("sizes")->wherein('id', $store1)->wherein('id', $price_s)->orderby('order')->pluck("name", "id");
        $customer = Customer::find($customer);
        return view('admin.order.print.order_buy_print', compact('customer', 'machine'));
    }
    public function getTypeList(Request $request)
    {
        $type = DB::table("print_prices")
            ->where('machine_id',  $request->machine_id)
            ->pluck("type_id", "id");
        $type = DB::table("types")
            ->wherein('id',  $type)
            ->pluck("name", "id");
        return response()->json($type);
    }
    public function getSizeList(Request $request)
    {
        $size = DB::table("print_prices")
            ->where('machine_id',  $request->machine_id)
            ->where('type_id',  $request->type_id)
            ->pluck("size_id", "id");
        $size = DB::table("sizes")
            ->wherein('id',  $size)
            ->pluck("name", "id");
        return response()->json($size);
    }
    public function getColorList(Request $request)
    {
        $color = DB::table("print_prices")
            ->where('machine_id',  $request->machine_id)
            ->where('type_id',  $request->type_id)
            ->where('size_id',  $request->size_id)
            ->pluck("color_id", "id");
        $color = DB::table("colors")
            ->wherein('id',  $color)
            ->pluck("name", "id");
        return response()->json($color);
    }
    public function buylaser($customer)
    {
        $customer = Customer::find($customer);
        return view('admin.order.laser.order_buy_laser', compact('customer'));
    }

    public function orderfinish($customer)
    {
        $cart_type = Cart_Type::where('customer_id', $customer)->get();
        $cart_laser = Cart_Laser::where('customer_id', $customer)->get();
        $cart_print = Cart_Print::where('customer_id', $customer)->get();
        $order = new Order();
        $order->count_order = 0;
        $order->count_order_discarded = 0;
        $order->count_order_done = 0;
        $order->status = 1;
        $order->total_cost = 0;
        $order->discount = 0;
        $order->rest = 0;
        $order->paid = 0;
        $order->discarded = 0;
        $order->user_id = Auth::User()->id;
        $order->customer_id = $customer;
        $order->save();
        if ($cart_type != null) {
            foreach ($cart_type as $carttype) {
                if ($carttype->quantity != 0) {
                    $store = Store::where('size_id', $carttype->size_id)->where('type_id', $carttype->type_id)->first();
                    if ($store != null) {
                        if ($carttype->quantity < $store->quantity) {
                            $order_last_type = Order::where('customer_id', $customer)->where('user_id', Auth::User()->id)->get()->last();
                            $order_type = new Order_Type();
                            $order_type->order_id = $order_last_type->id;
                            $order_type->quantity = $carttype->quantity;
                            $order_type->meter = $carttype->meter;
                            $order_type->type_id = $carttype->type_id;
                            $order_type->size_id = $carttype->size_id;
                            $order_type->user_pay_id = Auth::User()->id;
                            $order_type->user_discarded_id = Auth::User()->id;
                            $order_type->user_discount_id = Auth::User()->id;
                            $order_type->time_pay_at =  Carbon::now();
                            $order_type->time_discarded_at =  Carbon::now();
                            $order_type->total_cost = $carttype->quantity * $store->price;
                            $order_type->kind_pay = 0;
                            $order_type->number_visa = 0;
                            $order_type->discount = 0;
                            $order_type->rest = 0;
                            $order_type->paid = 0;
                            $order_type->discarded = 0;
                            $order_type->status = 0;
                            $order_type->chasier_status = 0;
                            $order_type->save();
                            $order_last_type->count_order=$order_last_type->count_order+1;
                            $order_last_type->update();
                            $store_count = Store::where('size_id', $carttype->size_id)->where('type_id', $carttype->type_id)->first();
                            $store_transaction = new Store_Transaction();
                            $store_transaction->store_id = $store_count->id;
                            $store_transaction->kind = 2;
                            $store_transaction->price = $carttype->quantity * $store->price;
                            $store_transaction->quantity_before = $store_count->quantity;
                            $store_transaction->quantity_after = $store_transaction->quantity_before - $carttype->quantity;
                            $store_transaction->save();
                            $store_count->quantity = $store_count->quantity - $carttype->quantity;
                            $store_count->update();
                        } else {
                            $message_type = 'sorry but order type not done';
                        }
                    } else {
                        $message_type = 'sorry but order type not done';
                    }
                } elseif ($carttype->meter != 0) {
                    $store = Store::where('size_id', $carttype->size_id)->where('type_id', $carttype->type_id)->first();
                    if ($store != null) {
                        if ($carttype->meter < $store->meter) {
                            $order_last_type = Order::where('customer_id', $customer)->where('user_id', Auth::User()->id)->get()->last();
                            $order_type = new Order_Type();
                            $order_type->order_id = $order_last_type->id;
                            $order_type->quantity = $carttype->quantity;
                            $order_type->meter = $carttype->meter;
                            $order_type->type_id = $carttype->type_id;
                            $order_type->size_id = $carttype->size_id;
                            $order_type->user_pay_id = Auth::User()->id;
                            $order_type->user_discarded_id = Auth::User()->id;
                            $order_type->user_discount_id = Auth::User()->id;
                            $order_type->time_pay_at =  Carbon::now();
                            $order_type->time_discarded_at =  Carbon::now();
                            $order_type->total_cost = $carttype->meter * $store->price;
                            $order_type->kind_pay = 0;
                            $order_type->number_visa = 0;
                            $order_type->discount = 0;
                            $order_type->rest = 0;
                            $order_type->paid = 0;
                            $order_type->discarded = 0;
                            $order_type->status = 0;
                            $order_type->chasier_status = 0;
                            $order_type->save();
                            $order_last_type->count_order=$order_last_type->count_order+1;
                            $order_last_type->update();
                            $store_count = Store::where('size_id', $carttype->size_id)->where('type_id', $carttype->type_id)->first();
                            $store_transaction = new Store_Transaction();
                            $store_transaction->store_id = $store_count->id;
                            $store_transaction->kind = 2;
                            $store_transaction->price = $carttype->quantity * $store->price;
                            $store_transaction->quantity_before = $store_count->meter;
                            $store_transaction->quantity_after = $store_transaction->quantity_before - $carttype->meter;
                            $store_transaction->save();
                            $store_count->meter = $store_count->meter - $carttype->meter;
                            $store_count->update();
                        } else {
                            $message_type = 'sorry but order type not done';
                        }
                    } else {
                        $message_type = 'sorry but order type not done';
                    }
                }
                $carttype->delete();
            }
        }
        if ($cart_laser != null) {
            $order_last_laser = Order::where('customer_id', $customer)->where('user_id', Auth::User()->id)->get()->last();
            foreach ($cart_laser as $cartlaser) {
                $order_laser = new Order_Laser();
                $order_laser->time_start =  Carbon::now()->format("h:i:s");
                $order_laser->time_end =  Carbon::now()->format("h:i:s");
                $order_laser->time_end_at =  Carbon::now();
                $order_laser->time_start_at =  Carbon::now();
                $order_laser->time_pay_at =  Carbon::now();
                $order_laser->time_discarded_at =  Carbon::now();
                $order_laser->total_time_system = '00:00:00';
                $order_laser->total_time_user = '0';
                $order_laser->total_cost_system = 0;
                $order_laser->total_cost_user = 0;
                $order_laser->total_cost = 0;
                $order_laser->kind_pay = 0;
                $order_laser->user_discount_id = 1;
                $order_laser->number_visa = 0;
                $order_laser->discount = 0;
                $order_laser->rest = 0;
                $order_laser->discarded = 0;
                $order_laser->paid = 0;
                $order_laser->notes = ' ';
                $order_laser->status = 0;
                $order_laser->chasier_status = 0;
                $order_laser->order_id = $order_last_laser->id;
                $order_laser->machine_id = 1;
                $order_laser->user_pay_id=Auth::user()->id;
                $order_laser->user_discarded_id=Auth::user()->id;
                $order_laser->user_start_id = Auth::User()->id;
                $order_laser->user_end_id = Auth::User()->id;
                $order_laser->user_skip_id = Auth::User()->id;
                $order_laser->save();
                $order_last_laser->count_order=$order_last_laser->count_order+1;
                $order_last_laser->update();
                $cart_file_laser = Cart_File::where('customer_id', $customer)->where('kind', 1)->where('cart_laser_id', $cartlaser->id)->get();
                if ($cart_file_laser != null) {
                    foreach ($cart_file_laser as $cartfilelaser) {
                        $order_laser_last = Order_Laser::where('user_start_id', Auth::User()->id)->get()->last();
                        $order_file = new Order_File();
                        $order_file->filename = $cartfilelaser->filename;
                        $order_file->kind = $cartfilelaser->kind;
                        $order_file->order_print_id = 1;
                        $order_file->order_laser_id = $order_laser_last->id;
                        $order_file->user_id_upload = Auth::User()->id;
                        $order_file->user_id_download = Auth::User()->id;
                        $order_file->save();
                        $cartfilelaser->delete();
                    }
                }

                $cartlaser->delete();
            }
        }
        if ($cart_print != null) {
            $order_last_print = Order::where('customer_id', $customer)->where('user_id', Auth::User()->id)->get()->last();
            foreach ($cart_print as $cartprint) {
                $order_print = new Order_Print();
                $order_print->quantity = $cartprint->quantity;
                $order_print->status = 0;
                $order_print->chasier_status = 0;
                $order_print->order_id = $order_last_print->id;
                $order_print->color_id = $cartprint->color_id;
                $order_print->size_id = $cartprint->size_id;
                $order_print->type_id = $cartprint->type_id;
                $order_print->machine_id = $cartprint->machine_id;
                $order_print->user_start_id = Auth::User()->id;
                $order_print->user_discarded_id = Auth::User()->id;
                $order_print->user_end_id = Auth::User()->id;
                $order_print->user_pay_id = Auth::User()->id;
                $order_print->time_end_at =  Carbon::now();
                $order_print->time_start_at =  Carbon::now();
                $order_print->time_discarded_at =  Carbon::now();
                $order_print->time_pay_at =  Carbon::now();
                $order_print->user_skip_id =  Auth::User()->id;
                $order_print->kind_pay = 0;
                $order_print->user_discount_id = 1;
                $order_print->number_visa = 0;
                $order_print->discount = 0;
                $order_print->rest = 0;
                $order_print->discarded = 0;
                $order_print->paid = 0;
                $order_last_print->count_order=$order_last_print->count_order+1;
                $order_last_print->update();
                $price_print = Print_Price::where('color_id', $cartprint->color_id)
                    ->where('machine_id', $cartprint->machine_id)
                    ->where('size_id', $cartprint->size_id)
                    ->where('type_id', $cartprint->type_id)->first();
                if ($price_print == null) {
                    $message_print = 'sorry but print not done';
                    $order_print->total_cost =0;
                } else {
                    $order_print->total_cost = $price_print->price * $cartprint->quantity;
                    $store_count = Store::where('size_id', $cartprint->size_id)->where('type_id', $cartprint->type_id)->first();
                    $store_transaction = new Store_Transaction();
                    $store_transaction->store_id = $store_count->id;
                    $store_transaction->kind = 2;
                    $store_transaction->price = $cartprint->quantity * $store_count->price;
                    $store_transaction->quantity_before = $store_count->quantity;
                    $store_transaction->quantity_after = $store_transaction->quantity_before - $cartprint->quantity;
                    $store_transaction->save();
                    $store_count->quantity = $store_count->quantity - $cartprint->quantity;
                    $store_count->update();
                }
                $order_print->save();
                $cart_file_print = Cart_File::where('customer_id', $customer)->where('kind', 2)->get();
                if ($cart_file_print != null) {
                    foreach ($cart_file_print as $cartfileprint) {
                        $order_print_last = Order_Print::where('user_pay_id', Auth::User()->id)->get()->last();
                        $order_file = new Order_File();
                        $order_file->filename = $cartfileprint->filename;
                        $order_file->kind = $cartfileprint->kind;
                        $order_file->order_print_id = $order_print_last->id;
                        $order_file->order_laser_id = 1;
                        $order_file->user_id_upload = Auth::User()->id;
                        $order_file->user_id_download = Auth::User()->id;
                       $order_file->save();
                        $cartfileprint->delete();
                    }
                }
                $cartprint->delete();
            }
        }
        $customer1=Customer::find($customer);
        $log = new Log();
        $log->user_id=Auth::User()->id;
        $log->action='add order for customer : '. $customer1->name .' & order number : '.$order_last_print->order_id;
        $log->save();
        return view('admin.admin')->with('message', 'order is done ');
    }

    public function allorderfinish()
    {
        $order = Order::where('status',2)->paginate(200);
        $log = new Log();
        $log->user_id=Auth::User()->id;
        $log->action='show all order finish';
        $log->save();
        return view('admin.order.order.order_finish_index',compact('order'));
    }

    public function dayorderfinishtime()
    {
        return view('admin.order.order.order_finish_day_time');
    }

    public function dayorderfinishtimeuser()
    {
        return view('admin.order.order.order_finish_day_time');
    }

    public function dayorderfinish(Request $request)
    {
        if($request->start != null &&$request->end != null  ) {
            if ($request->action == 'time') {
            $start = $request->input('start');
            $end = $request->input('end');
            $order = Order::where('status', 2)->where('updated_at', '>=', $start)->where('updated_at', '<=', $end)->paginate(200);
            $log = new Log();
            $log->user_id = Auth::User()->id;
            $log->action = 'show all order finish before at : ' . $start . " to : " . $end;
            $log->save();
            return view('admin.order.order.order_finish_day_index', compact('order'));
            } elseif ($request->action == 'export') {
                $start = $request->input('start');
                $end = $request->input('end');
                return Excel::download(new OrderExport($start, $end), time() . ' ' . 'Order.xlsx');
            } }
        else
            {
                return redirect()->back()->with('message_fales','must choose time');
            }
    }


    public function allorderwork()
    {
        $order = Order::where('status',1)->paginate(200);
        $log = new Log();
        $log->user_id=Auth::User()->id;
        $log->action='show all order work';
        $log->save();
        return view('admin.order.order.order_work_index',compact('order'));
    }

    public function orderinformation($id)
    {
        $order = Order::find($id);
        $order_laser = Order_Laser::where('order_id',$id)->get();
        $order_print = Order_Print::where('order_id',$id)->get();
        $order_type = Order_Print::where('order_id',$id)->get();
        $log = new Log();
        $log->user_id=Auth::User()->id;
        $log->action='show information order : '. $order->id;
        $log->save();
        return view('admin.order.order.order_information',compact('order','order_laser','order_print','order_type'));
    }

    public function startsearchforordercustomer()
    {
        return view('admin.order.customer.start_search_customer_all_order');
    }

    public function searchforordercustomer(Request $request)
    {

        if ($request->phone != null) {
            $customer = Customer::where('phone', $request->phone)->first();
            if ($customer != null) {
                $order=Order::where('customer_id',$customer->id)->paginate(100);
                    $log = new Log();
                    $log->user_id=Auth::User()->id;
                    $log->action='search customer : '. $customer->name;
                    $log->save();

                    return view('admin.order.customer.search_customer_all_order', compact('customer','order'));
                } else {
                return redirect()->back()->with('message_fales', 'No Customer Found!');
            }
        } else {
            return redirect()->back()->with('message_fales', 'No Customer Found!');
        }
    }

    public function orderinformationcustomer($id)
    {
        $order = Order::find($id);
        $order_laser = Order_Laser::where('order_id',$id)->get();
        $order_print = Order_Print::where('order_id',$id)->get();
        $order_type = Order_Print::where('order_id',$id)->get();
        $log = new Log();
        $log->user_id=Auth::User()->id;
        $log->action='show information order : '. $order->id;
        $log->save();
        return view('admin.order.customer.customer_information',compact('order','order_laser','order_print','order_type'));
    }
}

?>