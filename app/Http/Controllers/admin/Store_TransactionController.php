<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Log;
use App\Models\Store_Transaction;
use Illuminate\Support\Facades\Auth;


class Store_TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index()
    {
        $store_transaction = Store_Transaction::paginate(100);
        $log = new Log();
        $log->user_id=Auth::User()->id;
        $log->action='show  store transaction ' ;
        $log->save();
        return view('admin.store_transaction.store_transaction_index', compact('store_transaction'));
    }

    public function enter()
    {
        $store_transaction = Store_Transaction::where('kind',1)->paginate(100);
        $log = new Log();
        $log->user_id=Auth::User()->id;
        $log->action='show enter store transaction ' ;
        $log->save();
        return view('admin.store_transaction.store_transaction_enter', compact('store_transaction'));
    }

    public function directed()
    {
        $store_transaction = Store_Transaction::where('kind',2)->paginate(100);
        $log = new Log();
        $log->user_id=Auth::User()->id;
        $log->action='show directed store transaction ' ;
        $log->save();
        return view('admin.store_transaction.store_transaction_directed ', compact('store_transaction'));
    }

}

?>