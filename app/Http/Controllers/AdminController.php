<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all()->where("status", 0);
        return view('admin.content.admin_panel', compact('users'));
    }


    public function adminLogin()

    {
        if(Auth::guard('admin')->check()){
            return redirect('admin_panel');
        }
        return view('admin.content.admin_login');
       
    }

    public function adminLoginStore(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            if (Auth::guard('admin')->attempt(['username' => $data['username'], 'password' => $data['password']])) {
                return redirect("admin_panel");
            }
        }
        return redirect()->back()->with("error", "Login details are not valid");
    }

    public function approvalstatus(Request $request, User $users, $id)
    { {
            $data = User::find($id);
            if ($data->approval_status == 0) {
                $data->approval_status = 1;
            } else {
                $data->approval_status = 0;
            }

            $data->save();
            return redirect()->route('admin_panel')->with('success', $data->username . ' Approval Status has been Change Successfully.');
        }
    }

    public function activestatus(Request $request, User $users, $id)
    { {
            $data = User::find($id);
            if ($data->active_status == 0) {
                $data->active_status = 1;
            } else {
                $data->active_status = 0;
            }
            $data->save();

            return redirect()->route('admin_panel')->with('success', $data->username . ' Status has been Changed Successfully');
        }
    }

    public function adminlogOut()
    {
        Session::flush();
        Auth::guard('admin')->logout();
        return redirect(route('admin_login'));
    }
}
