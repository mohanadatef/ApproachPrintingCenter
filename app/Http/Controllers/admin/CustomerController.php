<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;


use App\Http\Requests\admin\Customer\CustomerCreateRequest;
use App\Http\Requests\admin\Customer\CustomerEditRequest;
use App\Models\Customer;
use App\Models\Log;
use App\Models\Wallet_Transaction;
use Illuminate\Support\Facades\Auth;


class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index()
    {
        $customer = Customer::paginate(100);
        $log = new Log();
        $log->user_id=Auth::User()->id;
        $log->action='show Customer' ;
        $log->save();
        return view('admin.customer.customer_index', compact('customer'));
    }

    public function createget()
    {

        return view('admin.customer.customer_create');
    }

    public function createpost(CustomerCreateRequest $request)
    {
        $newcustomer = new Customer();
        $data['wallet']=0;
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

        $newcustomer->create(array_merge($request->all(),$data));
        $log = new Log();
        $log->user_id=Auth::User()->id;
        $log->action='add Customer' ;
        $log->save();
        return redirect('/admin/customer')->with('message', 'Add Customer Is Done!');
    }

    public function editget($id)
    {
        $customer = Customer::find($id);
        return view('admin.customer.customer_edit', compact('customer'));
    }

    public function editpost(CustomerEditRequest $request, $id)
    {
        $newcustomer = Customer::find($id);
        $newcustomer->update($request->all());
        $log = new Log();
        $log->user_id=Auth::User()->id;
        $log->action='edit Customer :'.$newcustomer->name ;
        $log->save();
        return redirect('/admin/customer')->with('message', 'Edit Customer Is Done!');
    }
    public function indexwallet()
    {
        $wallet = Wallet_Transaction::paginate(100);
        $log = new Log();
        $log->user_id=Auth::User()->id;
        $log->action='show wallet transaction' ;
        $log->save();
        return view('admin.customer.wallet_index', compact('wallet'));
    }

    public function editstatues($id)
    {
        $newcustomer = Customer::find($id);
        if ($newcustomer->status == 1) {
            $newcustomer->status = '0';
        } elseif ($newcustomer->status == 0) {
            $newcustomer->status = '1';
        }
        $newcustomer->save();
        $log = new Log();
        $log->user_id=Auth::User()->id;
        $log->action='edit status customer '.$newcustomer->name ;
        $log->save();
        return redirect('/admin/customer')->with('message', 'Edit Statues Is Done!');
    }

    public function wallet_all_customer()
    {
        $wallet_to_customer=0;
        $wallet_to_system=0;
        $wallet_to_customer_1 = Customer::where('wallet','>',0)->get();
        foreach ($wallet_to_customer_1 as $wallettocustomer) {
            $wallet_to_customer = $wallet_to_customer + $wallettocustomer->wallet;
        }
        $wallet_to_system_1 = Customer::where('wallet','<',0)->get();
        foreach ($wallet_to_system_1 as $wallettosystem) {
            $wallet_to_system = $wallet_to_system + $wallettosystem->wallet;
        }
        return view('admin.customer.wallet_all', compact('wallet_to_customer','wallet_to_system'));
    }
}

?>