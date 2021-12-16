<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;

class loginController extends Controller
{
    public $users;
    public function __construct(User $users)
    {
        $this->users = $users;
    }
    public function login_form(){
        if(Auth::check()){
            return redirect()->route('home.home');
        }else{
            return view('login.form_login');
        }
    }

    public function login_check(Request $request){
        if(Auth::check()){
            return redirect()->route('home.home');
        }else{
            if(Auth::attempt(['username' => $request->username , 'password' => $request->pass])){
                $item_userLogin = $this->users->where('username',$request->username)->first();
                if($request->username == "admin"){
                    return redirect()->route('home.index');
                }else{
                    return redirect()->route('home.home');
                }
            }else{
                return redirect()->route('login.form')->with('message','username or password not yes');
            }
        }
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('home.home');
    }
}
