<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\Store\StoreEditRequest;
use App\Http\Requests\admin\Store\StoreCreateRequest;
use App\Http\Requests\admin\Store\StoreShopRequest;
use App\Models\Log;
use App\Models\Store;
use App\Models\Store_Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class StoreController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index()
    {
        $store = Store::all();
        $log = new Log();
        $log->user_id=Auth::User()->id;
        $log->action='show store ' ;
        $log->save();
        return view('admin.store.store_index', compact('store'));
    }

   /* public function indexproblem()
    {
        $store = Store::where('id','!=',1)->where('quantity_min','>=','quantity')->get();
        $log = new Log();
        $log->user_id=Auth::User()->id;
        $log->action='show store ' ;
        $log->save();
        return view('admin.store.store_index_problem', compact('store'));
    }*/

    public function createget()
    {
        $size = DB::table("sizes")->pluck("name", "id");
        $type = DB::table("types")->pluck("name", "id");
        return view('admin.store.store_create',compact('size','type'));
    }

    public function createpost(StoreCreateRequest $request)
    {
        $newstore = new Store();
        $newstore->size_id=$request->size_id;
        $newstore->type_id=$request->type_id;
        $newstore->quantity=$request->quantity;
        $newstore->quantity_min=$request->quantity_min;
        if($request->width == null) {
            $newstore->width=0;
        }else{
        $newstore->width=$request->width;
        }
        if($request->roll_size == null) {
            $newstore->roll_size=0;
        }else{
            $newstore->roll_size=$request->roll_size;
        }
        $newstore->price=$request->price;
        if($newstore->width == 0 || $newstore->roll_size == 0)
        {
        $newstore->meter=0;
        }
        else
            {
                $newstore->meter=$request->quantity * $request->roll_size;
            }
        $newstore->save();
        $log = new Log();
        $log->user_id=Auth::User()->id;
        $log->action='create store ' ;
        $log->save();
        return redirect('/admin/store')->with('message', 'Add Store Is Done!');
    }

    public function editget($id)
    {
        $store = Store::find($id);
        $size = DB::table("sizes")->pluck("name", "id");
        $type = DB::table("types")->pluck("name", "id");
        return view('admin.store.store_edit', compact('store','size','type'));
    }

    public function editpost(StoreEditRequest $request, $id)
    {
        $newstore = Store::find($id);
        $newstore->size_id=$request->size_id;
        $newstore->type_id=$request->type_id;
        $newstore->quantity=$request->quantity;
        $newstore->quantity_min=$request->quantity_min;
        $newstore->width=$request->width;
        $newstore->price=$request->price;
        $newstore->roll_size=$request->roll_size;
        if($request->width == 0 || $request->roll_size == 0)
        {
            $newstore->meter=0;
        }
        else
        {
            $newstore->meter=$request->quantity * $request->roll_size;
        }
        $newstore->update($request->all());
        $log = new Log();
        $log->user_id=Auth::User()->id;
        $log->action='edit store ' ;
        $log->save();
        return redirect('/admin/store')->with('message', 'Edit Store Is Done!');
    }

    public function shopget($id)
    {
        $store=Store::find($id);
        return view('admin.store.store_shop',compact('store'));
    }

    public function shoppost(StoreShopRequest $request,$id)
    {
        $store=Store::find($id);
        $store_transaction=new Store_Transaction();
        $store_transaction->kind=1;
        $store_transaction->store_id=$id;
        $store_transaction->quantity_before=$store->quantity;
        $store_transaction->price=$request->price;
        $store->roll_size=$store->roll_size+$request->roll_size;
        $store->quantity=$store->quantity+$request->quantity;
        $store->width=$store->width+$request->width;
        $store->meter=$store->meter+($request->roll_size * $request->quantity);
        $store->update();
        $store=Store::find($id);
        $store_transaction->quantity_after=$store->quantity;
        $store_transaction->save();
        $log = new Log();
        $log->user_id=Auth::User()->id;
        $log->action='shop store ' ;
        $log->save();
        return redirect('/admin/store')->with('message', 'Add Store Is Done!');
    }
}

?>