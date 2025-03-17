<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class AuthManager extends Controller
{
    function login(){
         if(Auth::check()){
            return redirect(route('home'));  
         }
        return view('login');
    }
    function registration(){
        if(Auth::check()){
            return redirect(route('home'));  
         }
        return view('registration');
    }

    function loginpost(Request $request){
    $request->validate([
     'email' => 'required',
     'password' => 'required'
    ]);
    $credentials=$request->only('email','password');
    if(Auth::attempt( $credentials)){
        return redirect()->intended(route('home'));
    }
    return redirect()->intended(route('login'))->with("error","Invalid Login credentials");
 }

    function registrationpost(Request $request){
    $request->validate([
     'name' => 'required',
     'mobilenumber' => 'required',
     'email' => 'required',
     'password' => 'required',
     'confirmpassword' => 'required',
     ]);

    $data['name']=$request->name;
    $data['mobilenumber']=$request->mobilenumber;
    $data['email']=$request->email;
    $data['password']=Hash::make($request->password);
    $data['confirmpassword']=$request->confirmpassword;

    $user=User::create($data);
    if(!$user){
        return redirect()->intended(route('registration'))->with("error","Registration failed try again");
    }
    return redirect()->intended(route('login'))->with("sucess","Registration sucessfull,Logn to access the site.");
    }

  function logout(){
    Session::flush(); 
    Auth::logout();
    return redirect(route('login'));
   }
}
