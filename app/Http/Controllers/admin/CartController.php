<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\Cart\AddCartTypeRequest;
use App\Http\Requests\admin\Cart\AddCartPrintRequest;
use App\Http\Requests\admin\Cart\AddCartLaserRequest;
use App\Http\Requests\admin\Cart\EditCartPrintRequest;
use App\Http\Requests\admin\Order\OrderAddLaserRequest;
use App\Http\Requests\Request;
use App\Models\Cart_File;
use App\Models\Cart_Laser;
use App\Models\Cart_Print;
use App\Models\Cart_Type;
use App\Models\Customer;
use App\Models\Log;
use App\Models\Store;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function addcarttype(AddCartTypeRequest $request, $customer)
    {
        $cart = new Cart_Type();
        $data['user_id'] = Auth::User()->id;
        $data['customer_id'] = $customer;
        if($request->quantity == null)
        {
            $data['quantity']=0;
        }
        if($request->meter == null)
        {
            $data['meter']=0;
        }
        $cart->create(array_merge($request->all(),$data));
        $customer = Customer::find($customer);
        $log = new Log();
        $log->user_id=Auth::User()->id;
        $log->action='Add item to cart in type to customer : '.$customer->name ;
        $log->save();
        return view('admin.order.order_search_customer', compact('customer'));
    }

    public function addcartprint(AddCartPrintRequest $request, $customer)
    {
        $cart = new Cart_Print();
        $data['user_id'] = Auth::User()->id;
        $data['customer_id'] = $customer;
        if($request ->quantity != null) {
            if ($request->height != null && $request->width != null) {
                $data['quantity'] = (($request->height * $request->width) / 10000) * $request->quantity;
            }
            $cart->create(array_merge($request->all(), $data));
            if ($request->filename != null) {
                foreach ($request->filename as $x) {
                    $cart_print = Cart_Print::where('customer_id', $customer)->where('user_id', Auth::User()->id)->get()->last();
                    $cart_file = new Cart_File();
                    $cart_file->kind = 2;
                    $cart_file->cart_print_id = $cart_print->id;
                    $cart_file->cart_laser_id = 1;
                    $cart_file->customer_id = $customer;
                    $cart_file->user_id_upload = Auth::User()->id;
                    $x->move(public_path('cart/print/'), time() . $x->getClientOriginalname());
                    //  $x->move('E:\order/'.carbon::now()->format('d-m-20y') .'/'.$customer.'/print/', time().$x->getClientOriginalname());
                    $cart_file->filename = time() . $x->getClientOriginalname();
                    $cart_file->save();
                }
            }
            $customer = Customer::find($customer);
            $log = new Log();
            $log->user_id = Auth::User()->id;
            $log->action = 'Add item to cart in print to customer : ' . $customer->name;
            $log->save();
            return view('admin.order.order_search_customer', compact('customer'));
        }
        else
        {
            return redirect()->back()->with('message_fales','quantity is null');
        }
    }

    public function addcartlaser(AddCartLaserRequest $request, $customer)
    {
        $cart = new Cart_Laser();
        $data['user_id'] = Auth::User()->id;
        $data['customer_id'] = $customer;
        $data['count_file'] = 0;
        $cart->create(array_merge($request->all(),$data));
        foreach ($request->filename as $x)
        {
            $cart_laser = Cart_Laser::where('customer_id',$customer)->where('user_id',Auth::User()->id)->get()->last();
            $cart_file = new Cart_File();
            $cart_file->kind = 1;
            $cart_file->cart_laser_id = $cart_laser->id;
            $cart_file->cart_print_id = 1;
            $cart_file->customer_id = $customer;
            $cart_file->user_id_upload = Auth::User()->id;
            $x->move(public_path('cart/laser/'),time().$x->getClientOriginalname());
          //  $x->move('E:\order/'.carbon::now()->format('d-m-20y') .'/'.$customer.'/laser/', time().$x->getClientOriginalname());
            $cart_file->filename = time().$x->getClientOriginalname() ;
            $cart_file->save();
            $cart_laser->count_file=$cart_laser->count_file+1;
            $cart_laser->update();
        }
        $customer = Customer::find($customer);
        $log = new Log();
        $log->user_id=Auth::User()->id;
        $log->action='Add item to cart in laser to customer : '.$customer->name ;
        $log->save();
        return view('admin.order.order_search_customer', compact('customer'));
    }

    public function showcarttype($customer)
    {
        $cart = Cart_Type::where('customer_id',$customer)->get();
        $customer = Customer::find($customer);
        $log = new Log();
        $log->user_id=Auth::User()->id;
        $log->action='check item at cart type to customer : '.$customer->name ;
        $log->save();
        return view('admin.order.type.order_cart_type', compact('customer','cart'));
    }

    public function showcartprint($customer)
    {

        $cart = Cart_Print::where('customer_id', $customer)->get();
        $customer = Customer::find($customer);
        $log = new Log();
        $log->user_id=Auth::User()->id;
        $log->action='check item at cart print to customer : '. $customer->name ;
        $log->save();
        return view('admin.order.print.order_cart_print', compact('customer','cart'));
    }

    public function showcartlaser($customer)
    {

        $cart = Cart_Laser::where('customer_id',$customer)->get();
        $customer = Customer::find($customer);
        $log = new Log();
        $log->user_id=Auth::User()->id;
        $log->action='check item at cart laser to customer : '.$customer->name ;
        $log->save();
        return view('admin.order.laser.order_cart_laser', compact('customer','cart'));
    }

    public function editcarttype($id)
    {
        $cart = Cart_Type::find($id);
        $store = DB::table("stores")->where('quantity', '>', 0)->orwhere('roll_size', '>', 0)->pluck("type_id", "id");
        $store1= DB::table("stores")->where('quantity', '>', 0)->orwhere('roll_size', '>', 0)->pluck("size_id", "id");
        $type = DB::table("types")->where('id','!=',1)->wherein('id', $store)->orderby('order')->pluck("name", "id");
        $size = DB::table("sizes")->where('id','!=',1)->wherein('id', $store1)->orderby('order')->pluck("name", "id");
        return view('admin.order.type.order_cart_edit_type', compact('cart','size','type'));
    }

    public function editcartprint($id)
    {
        $cart = Cart_Print::find($id);
        $color = DB::table("colors")->orderby('order')->pluck("name", "id");
        $store = DB::table("stores")->where('quantity', '>', 0)->orwhere('roll_size', '>', 0)->pluck("type_id", "id");
        $store1= DB::table("stores")->where('quantity', '>', 0)->orwhere('roll_size', '>', 0)->pluck("size_id", "id");
        $type = DB::table("types")->wherein('id', $store)->orderby('order')->pluck("name", "id");
        $size = DB::table("sizes")->wherein('id', $store1)->orderby('order')->pluck("name", "id");
        $cart_file = Cart_File::where('cart_print_id',$cart->id)->get();
        $machine = DB::table("machines")->where('id','!=',1)->where('kind',2)->pluck("name", "id");
        return view('admin.order.print.order_cart_edit_print', compact('cart','type','machine',
            'cart_file','color','size'));
    }

    public function editcartlaser($id)
    {
        $cart = Cart_Laser::find($id);
        $cart_file = Cart_File::where('cart_laser_id',$cart->id)->get();
        return view('admin.order.laser.order_cart_edit_laser', compact('cart','cart_file'));
    }

    public function updatecarttype(AddCartTypeRequest $request,$id)
    {
        $cart = Cart_Type::find($id);
        $data['user_id'] = Auth::User()->id;
        if($request->quantity == null)
        {
            $data['quantity']=0;
        }
        if($request->meter == null)
        {
            $data['meter']=0;
        }
        $cart->update(array_merge($request->all(),$data));
        $customer = Customer::find($cart->customer->id);
        //$cart = Cart_Type::where('customer_id',$customer)->get();
        $customer = Customer::find($customer);
        $log = new Log();
        $log->user_id=Auth::User()->id;
        $log->action='edit item at cart type to customer : '.$customer->name ;
        $log->save();
        return view('admin.order.order_search_customer', compact('customer'))->with('message','Edit done');
    }

    public function updatecartprint(EditCartPrintRequest $request,$id)
    {
        $cart = Cart_Print::find($id);
        $data['user_id'] = Auth::User()->id;
        $cart->update(array_merge($request->all(),$data));
        if($request->filename != null)
        {
            foreach ($request->filename as $x)
            {
                $cart_file = new Cart_File();
                $cart_file->kind = 2;
                $cart_file->cart_print_id = $id;
                $cart_file->cart_laser_id = 1;
                $cart_file->customer_id = $cart->customer_id;
                $cart_file->user_id_upload = Auth::User()->id;
                $x->move(public_path('cart/print/'), $x->getClientOriginalname());
             //   $x->move('E:\order/'.carbon::now()->format('d-m-20y') .'/'.$cart->customer_id.'/print/', time().$x->getClientOriginalname());
                $cart_file->filename = time().$x->getClientOriginalname() ;
                $cart_file->save();
            }
        }
        $customer = Customer::find($cart->customer->id);
        $log = new Log();
        $log->user_id=Auth::User()->id;
        $log->action='edit item at cart print to customer : '.$customer->name ;
        $log->save();
        return view('admin.order.order_search_customer', compact('customer'))->with('message','Edit done');
    }

    public function updatecartlaser(OrderAddLaserRequest $request,$id)
    {
        if($request !=null)
        {
        $cart = Cart_Laser::find($id);
        $data['user_id'] = Auth::User()->id;
        $cart->update(array_merge($request->all(),$data));
        if($request->filename != null)
        {
            foreach ($request->filename as $x)
            {
                $cart_file = new Cart_File();
                $cart_file->kind = 1;
                $cart_file->cart_laser_id = $id;
                $cart_file->cart_print_id = 1;
                $cart_file->customer_id = $cart->customer_id;
                $cart_file->user_id_upload = Auth::User()->id;
                $x->move(public_path('cart/laser/'), $x->getClientOriginalname());
                //   $x->move('E:\order/'.carbon::now()->format('d-m-20y') .'/'.$cart->customer_id.'/laser/', time().$x->getClientOriginalname());
                $cart_file->filename = time().$x->getClientOriginalname() ;
                $cart_file->save();
                $cart->count_file=$cart->count_file+1;
                $cart->update();
            }
        }
        $customer = Customer::find($cart->customer->id);
        $log = new Log();
        $log->user_id=Auth::User()->id;
        $log->action='edit item at cart laser to customer : '.$customer->name ;
        $log->save();
        return view('admin.order.order_search_customer', compact('customer'))->with('message','Edit done');
    }
        else{
            return redirect()->back()->with('message_fales','must choose file');
        }
    }

    public function cansalcarttype($id)
    {
        $cart = Cart_Type::find($id);
        $log = new Log();
        $log->user_id=Auth::User()->id;
        $log->action='cansal item at cart type to customer : '.$cart->customer->name ;
        $log->save();
        $cart->delete();
        return redirect()->back()->with('message_fales','cansal type done');
    }

    public function cansalcartprint($id)
    {
        $cart = Cart_Print::find($id);
        $log = new Log();
        $log->user_id=Auth::User()->id;
        $log->action='cansal item at cart print to customer : '.$cart->customer->name ;
        $log->save();
        $cart1 = Cart_File::where('cart_print_id',$cart->id)->get();
        if($cart1 != null)
        {
            foreach ($cart1 as $carts) {
              //  unlink('E:\order/'.carbon::now()->format('d-m-20y') .'/'.$cart->customer_id.'/print/'.$carts->filename);
                $carts->delete();
            }
        }
        $cart->delete();
        return redirect()->back()->with('message_fales','cansal print done');
    }

    public function cansalcartlaser($id)
    {
        $cart = Cart_Laser::find($id);
        $cart1 = Cart_File::where('cart_laser_id',$cart->id)->get();
        $log = new Log();
        $log->user_id=Auth::User()->id;
        $log->action='cansal item at cart laser to customer : '.$cart->customer->name ;
        $log->save();
        if($cart1 != null)
        {
            foreach ($cart1 as $carts) {
          //      unlink('E:\order/'.carbon::now()->format('d-m-20y') .'/'.$cart->customer_id.'/laser/'.$carts->filename);
                $carts->delete();
            }
        }
        $cart->delete();
        return redirect()->back()->with('message_fales','cansal laser done');
    }

    public function cansalcartfile($id)
    {
        $cart = Cart_File::find($id);
        $cart1 = Cart_Laser::find($cart->cart_laser_id);
        $cart1->count_file=$cart1->count_file-1;
        $cart1->update();
       // unlink('E:\order/'.carbon::now()->format('d-m-20y') .'/'.$cart1->customer_id.'/laser/'.$cart->filename);
        $cart->delete();
        return redirect()->back()->with('message_fales','cansal file done');
    }


}

?>