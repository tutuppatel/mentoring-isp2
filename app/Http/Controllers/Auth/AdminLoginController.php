<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Support\Facades\Validator;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin');
    }
    //
    public function showLoginForm()
    {
        return view('auth.admin-login');
    }

    public function login(Request $request)
    {
        //validate the form data
//        $this->validate($request, [
//            'email' =>'required|email',
//            'password' =>'required|min:6'
//        ]);


        //Attempt to log the user in
        if (Auth::guard('admin')->attempt(['email' =>$request->email,'password' =>$request->password], $request->remember)) {

        //If successful then redirect to their intended location
        return redirect()->intended(route('admin.dashboard'));

        }

        //if unsuccessful then redirect back to the login with the form data
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }
//    public function requestSomething(Request $request){
//
//        return view();
//    }
}
