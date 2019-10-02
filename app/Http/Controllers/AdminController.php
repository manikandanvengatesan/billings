<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\User;
use Session;
class AdminController extends Controller
{
    /**
     * Validate the user for logging in.
     *
     * @param Request $request
     * @return Response
     */
    function login(Request $request){
        $validator = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        if($user = User::where('mobile',$request->username)->first()){
            if($user->password == $request->password){
                Session::put('name', $user->name);
                Session::put('mobile', $user->mobile);
                Session::put('email', $user->email);
                Session::put('id', $user->id);
                // Session::save();
                return redirect('dashboard')->with('loginStatus',"Success");
            }else{
                Session::flush();
                return view('login')->with('loginStatus',"Failure")->with('message',"Incorrect Password");                
            }
        }else{
            Session::flush();
            return view('login')->with('loginStatus',"Failure")->with('message',"Incorrect Mobile number");
        }
        
    }

    /**
     * Logout the user and flush the session.
     *
     * @param Request $request
     * @return Response
     */
    function logout(Request $request){
        Session::flush();
        return redirect('/')->with('message',"Logout successfully");
    }

    /**
     * Load the dashboard view.
     *
     * @return View
     */
    function dashboard(Request $request){
        return view('dashboard');
    }

}
