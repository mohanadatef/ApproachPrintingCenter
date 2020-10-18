<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserCreateRequest;
use App\Http\Requests\User\UserEditRequest;
use App\Http\Requests\User\UserResetCodeCreateRequest;
use App\Http\Requests\User\UserResetPasswordCreateRequest;
use App\Http\Requests\User\UserTransactionRequest;
use App\Http\Requests\User\UserTransationRequest;
use App\Models\Log;
use App\Models\User_Transaction;
use App\Role_user;
use App\Role;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function indexuser()
    {
        if (Auth::user()->role()->first()->name == 'Develper') {
            $users = User::all();
        } else {
            $users = User::where('id', '!=', 1)->get();
        }
        $log = new Log();
        $log->user_id = Auth::User()->id;
        $log->action = 'show user ';
        $log->save();
        return view('admin.user.user_index', compact('users'));
    }

    public function createuserpost(UserCreateRequest $request)
    {
        $newuser = new User();
        $newuser->name = $request->input('name');
        $newuser->email = $request->input('email');
        $newuser->password = Hash::make($request->input('password'));
        $newuser->statues = 1;
        $newuser->code_discount = $request->code_discount;
        $newuser->save();
        $newuser->role()->sync((array)$request->input('role_id'));
        $newuser->save();
        $log = new Log();
        $log->user_id = Auth::User()->id;
        $log->action = 'create user ';
        $log->save();
        return redirect('/admin/user')->with('message', 'Add user Is Done!');
    }

    public function createuserget()
    {
        $role = Role::select('display_name', 'id')->get();
        return view('admin.user.user_create', compact('role'));
    }

    public function edituserpost(UserEditRequest $request, $id)
    {
        $newuser = User::find($id);
        $newuser->name = $request->input('name');
        $newuser->email = $request->input('email');
        $newuser->role()->sync((array)$request->input('role_id'));
        $newuser->save();
        $log = new Log();
        $log->user_id = Auth::User()->id;
        $log->action = 'edit user ' . $newuser->name;
        $log->save();
        return redirect('/admin/user')->with('message', 'Edit User Is Done!');
    }

    public function edituserget($id)
    {
        $user = User::find($id);
        $role = Role::select('display_name', 'id')->get();
        $role_user = Role_user::all()->where('user_id', '=', $id);
        return view('admin.user.user_edit', compact('user', 'role', 'role_user'));
    }

    public function resetpassworduserpost(UserResetPasswordCreateRequest $request, $id)
    {
        $newuser = User::find($id);
        $newuser->password = Hash::make($request->input('password'));
        $newuser->save();
        $log = new Log();
        $log->user_id = Auth::User()->id;
        $log->action = 'edit password user ' . $newuser->name;
        $log->save();
        return redirect('admin/user')->with('message', 'reset password user Is Done!');
    }

    public function resetpassworduserget($id)
    {
        $user = User::find($id);
        return view('admin.user.user_reset_password', compact('user'));
    }

    public function editstatues($id)
    {
        $newuser = User::find($id);
        if ($newuser->statues == 1) {
            $newuser->statues = '0';
        } elseif ($newuser->statues == 0) {
            $newuser->statues = '1';
        }
        $newuser->save();
        $log = new Log();
        $log->user_id = Auth::User()->id;
        $log->action = 'edit status user ' . $newuser->name;
        $log->save();
        return redirect('/admin/user')->with('message', 'Edit Statues Is Done!');
    }

    public function resetcodeuserpost(UserResetCodeCreateRequest $request, $id)
    {
        $newuser = User::find($id);
        $newuser->code_discount = $request->code_discount;
        $newuser->save();
        $log = new Log();
        $log->user_id = Auth::User()->id;
        $log->action = 'edit code user ' . $newuser->name;
        $log->save();
        return redirect('admin/user')->with('message', 'reset code user Is Done!');
    }

    public function resetcodeuserget($id)
    {
        $user = User::find($id);
        return view('admin.user.user_reset_code', compact('user'));
    }


    public function user_transaction_get()
    {
        $user = DB::table("users")->where('statues', 1)->where('id', '!=', 1)->pluck("name", "id");
        return view('admin.chasier.chasier.user_transation_chasier', compact('user'));
    }

    public function user_transaction_post(UserTransactionRequest $request)
    {
        $user_transaction = new User_Transaction();
        $data['chasier_status'] = 0;
        $data['user_done_id'] = Auth::user()->id;
        if($request->notes == null)
        {
        $data['notes'] = ' ';
        }
        $user_transaction->create(array_merge($request->all(), $data));
        $log = new Log();
        $log->user_id = Auth::User()->id;
        $log->action = 'user transaction' . Auth::user()->id;
        $log->save();
        return redirect('admin')->with('message', 'reset code user Is Done!');
    }
}

?>