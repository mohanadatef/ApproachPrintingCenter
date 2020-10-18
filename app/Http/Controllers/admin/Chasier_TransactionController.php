<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Log;
use App\Models\Chasier_Transaction;
use Illuminate\Support\Facades\Auth;


class Chasier_TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index()
    {
        $chasier_transaction = Chasier_Transaction::paginate(100);
        $log = new Log();
        $log->user_id=Auth::User()->id;
        $log->action='show chasier transaction ' ;
        $log->save();
        return view('admin.chasier_transaction.chasier_transaction_index', compact('chasier_transaction'));
    }


}

?>