<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\Print_Price\Print_PriceEditRequest;
use App\Http\Requests\admin\Print_Price\Print_PriceCreateRequest;
use App\Models\Log;
use App\Models\Print_Price;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class Print_PriceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index()
    {
        $print_price = Print_Price::paginate(100);
        $log = new Log();
        $log->user_id=Auth::User()->id;
        $log->action='show all price';
        $log->save();
        return view('admin.print_price.print_price_index', compact('print_price'));
    }

    public function createget()
    {
        $size = DB::table("sizes")->pluck("name", "id");
        $type = DB::table("types")->pluck("name", "id");
        $machine = DB::table("machines")->where('kind',2)->pluck("name", "id");
        $color = DB::table("colors")->pluck("name", "id");
        return view('admin.print_price.print_price_create',compact('size','type','machine','color'));
    }

    public function createpost(Print_PriceCreateRequest $request)
    {
        $code=Print_Price::where('code',$request->size_id.'-'.$request->type_id.'-'.$request->color_id.'-'.$request->machine_id)->first();
        if($code == null)
        {
        $newprint_price = new Print_Price();
        $data['code']=$request->size_id.'-'.$request->type_id.'-'.$request->color_id.'-'.$request->machine_id;
        $data['quantity']=1;
        $newprint_price->create(array_merge($request->all(),$data));
        $log = new Log();
        $log->user_id=Auth::User()->id;
        $log->action='create price';
        $log->save();
        return redirect('/admin/print_price')->with('message', 'Add Print Price Is Done!');
        }
        else
        {
            return redirect()->back()->with('message_fales', 'this create before!');
        }
    }

    public function editget($id)
    {
        $print_price = Print_Price::find($id);
        $size = DB::table("sizes")->pluck("name", "id");
        $type = DB::table("types")->pluck("name", "id");
        $machine = DB::table("machines")->pluck("name", "id");
        $color = DB::table("colors")->pluck("name", "id");
        return view('admin.print_price.print_price_edit', compact('print_price','size','type','machine','color'));
    }

    public function editpost(Print_PriceEditRequest $request, $id)
    {
        $newprint_price = Print_Price::find($id);
        $log = new Log();
        $log->user_id=Auth::User()->id;
        $log->action='edit price before : '.$newprint_price->price." to : ".$request->price;
        $log->save();
        $newprint_price->update($request->all());
        return redirect('/admin/print_price')->with('message', 'Edit Print Price Is Done!');
    }

    public function delete($id)
    {
        $newprint_price = Print_Price::find($id);
        $newprint_price->delete();
        return redirect()->back()->with('message_fales','delete is done');
    }
}

?>