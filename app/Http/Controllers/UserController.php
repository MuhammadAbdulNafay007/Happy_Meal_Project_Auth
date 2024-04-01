<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function home()
    {
        return view('user.content.home');
    }

    public function login()
    {
        if (Auth::check()) {
            return redirect(route('user.home'));
        }
        return view('user.content.login');
    }

    public function register()
    {

        if (Auth::check()) {
            return redirect(route('user.home'));
        }
        return view('user.content.register');
    }

    public function loginStore(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        $users=User::where('email', $request->email)->first();
        if($users){
            if($users->approval_status==0){
                return redirect()->back()->with("error", "Your profile is not approved");
            }
        $users=User::where('email', $request->email)->first();
        }
        if($users){
            if($users->active_status==0){
                return redirect()->back()->with("error", "Your profile is not activate");
            }

        }

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended(route('user.home'));
        }
        return redirect()->back()->with("error", "Login details are not valid");
    }

    public function registerStore(Request $request)
    {
        $message = ['email.regex' => 'Please put a valid email e.g. gmail or yahoo'];
        $request->validate([
            'username' => 'required|unique:users',
            'email' => ['required','email','unique:users', 'regex:/gmail|yahoo/'],
            'password' => 'required|confirmed|min:5',
            'mobile' => 'required|numeric|unique:users|digits:11',
        ],$message);

        $data['username'] = $request->username;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $data['password_string'] = $request->password;
        $data['mobile'] = $request->mobile;
        $data["approval_status"] = false;
        $data["active_status"] = false;
        $users = User::create($data);

        if (!$users) {
            return redirect()->back()->with("error", "Registration Failed, try again");
        }
        return redirect()->back()->with("success", "Registration has been Successful please wait for Admin Approval");
    
    }

    public function userProfile()
    {
            $id = Auth::user()->id;
            $profileData = User::find($id);
             return view('user.content.profile_access',compact('profileData'));
       
    }

    public function userProfileUpdate(Request $request, $id)
    {
        
        {
            $data = $request->validate([
                'username' => 'required',
                'email' => 'required',
                'password' => 'required',
                'mobile' => 'required'
            ]);

            $data=[
                'username' => $request->username,
                'email' => $request->email,
                'password' => $request->password,
                'password_string' => $request->password,
                'mobile' => $request->mobile
            ];


            $profileData = User::find($id);
            $profileData->update($data);
            return redirect()->back()->with("success", "Profile Data has been Updated Successfully");

        }
    }
    public function logOut()
    {
        Session::flush();
        Auth::logout();
        return redirect(route('user.home'));
    }
   
}



