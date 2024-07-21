<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminAuthController extends Controller
{
    public function index(){
        return view('login');
    }
    public function login(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
        $admin = Admin::where('email',$request->email)->first();
        if($admin && Hash::check($request->password, $admin->password)){
            $remember = $request->has('remember');
            if($remember){
                Session::put('admin', $admin->id);
                Session::put('remember',true);
                Session::put('expire', now()->addDays(5));
            }else{
                Session::put('admin', $admin->id);
            }
            return redirect()->route('dashboard');
        }
        return back()->withErrors(['email'=>'Email atau password salah']);
    }

    public function logout(){
        Session::forget('admin');
        Session::forget('remember');
        Session::forget('expire');
        return redirect()->route('login');
    }
}
