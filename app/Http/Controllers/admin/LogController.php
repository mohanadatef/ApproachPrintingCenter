<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Log;
use Illuminate\Support\Facades\Auth;


class LogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function indexlog()
    {
        $log = new Log();
        $log->user_id=Auth::user()->id;
        $log->action='show log';
        $log->save();
        $log = Log::orderby('created_at','DESC')->paginate(100);
        return view('admin.log.log_index', compact('log'));
    }

}

?>