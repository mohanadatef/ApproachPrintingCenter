<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\import\ImportCreateRequest;
use App\Imports\Templet_PriceImport;
use App\Models\Color;
use App\Models\Log;
use App\Models\Machine;
use App\Models\Print_Price;
use App\Models\Size;
use App\Models\Templet_Price;
use App\Models\Type;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;


class TempletPriceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function indexTemplet_Price()
    {
        $templet_price = Templet_Price::all();
        return view('admin.store.import.import_price_index', compact('templet_price'));
    }

    public function importExportView()
    {
        ini_set('max_execution_time', 120000);
        ini_set('post_max_size', 120000);
        ini_set('upload_max_filesize', 100000);
        return view('/admin/import/price');
    }

    public function importpriceget()
    {
        return view('admin.store.import.import_price');
    }

    public function importpricepost(ImportCreateRequest $request)
    {
        ini_set('max_execution_time', 120000);
        ini_set('post_max_size', 120000);
        ini_set('upload_max_filesize', 100000);
        Templet_Price::truncate();
        Excel::import(new Templet_PriceImport(), request()->file('file'));
        $templet_price = Templet_Price::find(1);
        $templet_price->delete();
        return redirect('/admin/store/import/index/price')->with('message', 'Add Templet Is Done');
    }

    public function unmatchedPriceGrouped()
    {
        ini_set('max_execution_time', 120000);
        ini_set('post_max_size', 120000);
        ini_set('upload_max_filesize', 100000);
        $matched_result = DB::table("machines")->rightjoin('templet_prices', 'machines.name', '=', 'templet_prices.machine')
            ->where('machines.name', '=', null)
            ->select('templet_prices.machine')
            ->groupBy('templet_prices.machine')
            ->get();
        $machinename = [];
        for ($i = 0; $i < count($matched_result); $i++) {
            array_push($machinename, $matched_result[$i]->machine);
        }
        $machinename = array_diff($machinename, ['', 'null']);
        $matched_result = DB::table("colors")->rightjoin('templet_prices', 'colors.name', '=', 'templet_prices.color')
            ->where('colors.name', '=', null)
            ->select('templet_prices.color')
            ->groupBy('templet_prices.color')
            ->get();
        $colorname = [];

        for ($i = 0; $i < count($matched_result); $i++) {
            array_push($colorname, $matched_result[$i]->color);
        }
        $colorname = array_diff($colorname, ['', 'null']);
        $matched_result = DB::table("sizes")->rightjoin('templet_prices', 'sizes.name', '=', 'templet_prices.size')
            ->where('sizes.name', '=', null)
            ->select('templet_prices.size')
            ->groupBy('templet_prices.size')
            ->get();
        $sizename = [];
        for ($i = 0; $i < count($matched_result); $i++) {
            array_push($sizename, $matched_result[$i]->size);
        }
        $sizename = array_diff($sizename, ['', 'null']);
        $matched_result = DB::table("types")->rightjoin('templet_prices', 'types.name', '=', 'templet_prices.type')
            ->where('types.name', '=', null)
            ->select('templet_prices.type')
            ->groupBy('templet_prices.type')
            ->get();
        $typename = [];
        for ($i = 0; $i < count($matched_result); $i++) {
            array_push($typename, $matched_result[$i]->type);
        }
        $typename = array_diff($typename, ['', 'null']);
        $count_error = count($machinename+$colorname+$sizename+$typename);
        if ($count_error > 0) {
            return view('admin.store.import.error_price', compact('machinename','colorname','sizename','typename'));
        } else {
            return view('admin.store.import.save_price');
        }
    }

    public function SavePriceGrouped()
    {
        ini_set('max_execution_time', 120000);
        ini_set('post_max_size', 120000);
        ini_set('upload_max_filesize', 100000);
        $templet_price = Templet_Price::all();

        foreach ($templet_price as $templet) {
            $type = Type::where('name',$templet->type)->first();
            $type_id = $type->id;
            $size = Size::where('name',$templet->size)->first();
            $size_id = $size->id;
            $color = Color::where('name',$templet->color)->first();
            $color_id = $color->id;
            $machine = Machine::where('name',$templet->machine)->first();
            $machine_id = $machine->id;
            $code=$size_id.'-'.$type_id.'-'.$color_id.'-'.$machine_id;
            $code1=Print_Price::where('code',$code)->first();
            if($code1 == null)
            {
            $newprice = new Print_Price();
            $newprice->price = $templet->price;
            $newprice->code = $code;
                $newprice->machine_id = $machine->id;
                $newprice->color_id = $color->id;
                $newprice->size_id = $size->id;
                $newprice->type_id = $type->id;
            $newprice->quantity = 1;
            $newprice->save();
                $log = new Log();
                $log->user_id=Auth::User()->id;
                $log->action='import sheet price create'.$code ;
                $log->save();
            }
            else
            {
                $code1->price=$templet->price;
                $code1->update();
                $log = new Log();
                $log->user_id=Auth::User()->id;
                $log->action='import sheet price update'.$code ;
                $log->save();
            }
        }

        return redirect('admin')->with('message', 'Add price Is Done');
    }
}

?>