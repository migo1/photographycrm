<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest:admin', ['except' => ['logout']]);
    }

    public function showLoginForm()
    {
        return view('auth.admin-login');
    }

    public function login(Request $request)
    {
        //validate the form data
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        //Attempt to login the user
        if(Auth::guard('admin')->attempt(['email' =>$request->email, 'password' => $request->password], $request->remember)) {
               //if succesfull, then redurect to their intended location
               return redirect()->intended(route('admins_dashboard.index'));
        } 
        //if unsuccesfull, then redirect to the login with the form data
        return redirect()->back()->withInput($request->only('email','remember'));
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return  redirect('/');
    }
}
