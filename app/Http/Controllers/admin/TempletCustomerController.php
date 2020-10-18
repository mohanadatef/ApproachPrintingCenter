<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\import\ImportCreateRequest;
use App\Imports\Templet_CustomerImport;
use App\Models\Customer;
use App\Models\Log;
use App\Models\Templet_Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;


class TempletCustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function indexTemplet_Customer()
    {
        $templet_customer = Templet_Customer::all();
        return view('admin.import.import_customer_index', compact('templet_customer'));
    }

    public function importExportView()
    {
        ini_set('max_execution_time', 120000);
        ini_set('post_max_size', 120000);
        ini_set('upload_max_filesize', 100000);
        return view('/admin/import/customer');
    }

    public function importcustomerget()
    {
        return view('admin.import.import_customer');
    }

    public function importcustomerpost(ImportCreateRequest $request)
    {
        ini_set('max_execution_time', 120000);
        ini_set('post_max_size', 120000);
        ini_set('upload_max_filesize', 100000);
        Templet_Customer::truncate();
        Excel::import(new Templet_CustomerImport(), request()->file('file'));
        $templet_customer = Templet_Customer::find(1);
        $templet_customer->delete();
        return redirect('/admin/import/index/customer')->with('message', 'Add Templet Is Done');
    }

    public function unmatchedCustomerGrouped()
    {
        ini_set('max_execution_time', 120000);
        ini_set('post_max_size', 120000);
        ini_set('upload_max_filesize', 100000);
        $matched_result = DB::table("customers")->rightjoin('templet_customers', 'customers.phone', '=', 'templet_customers.phone')
            ->where('customers.phone', '!=', null)
            ->select('templet_customers.phone')
            ->groupBy('templet_customers.phone')
            ->get();
        $customerphone = [];
        for ($i = 0; $i < count($matched_result); $i++) {
            array_push($customerphone, $matched_result[$i]->phone);
        }
        $count_error = count($customerphone);
        if ($count_error > 0) {
            return view('admin.import.error_customer', compact('customerphone'));
        } else {
            return view('admin.import.save_customer');
        }
    }

    public function SaveCustomerGrouped()
    {
        ini_set('max_execution_time', 120000);
        ini_set('post_max_size', 120000);
        ini_set('upload_max_filesize', 100000);
        $templet_customer = Templet_Customer::all();

        foreach ($templet_customer as $templet) {
            $newcustomer = new Customer();
            $newcustomer->name = $templet->name;
            $newcustomer->email = $templet->email;
            $newcustomer->phone = $templet->phone;
                $newcustomer->place = $templet->place;
                $newcustomer->wallet = 0;
                $newcustomer->status = 1;
            $newcustomer->save();
                $log = new Log();
                $log->user_id=Auth::User()->id;
                $log->action='import sheet customer create'. $newcustomer->name ;
                $log->save();
        }

        return redirect('admin')->with('message', 'Add customer Is Done');
    }
}

?>