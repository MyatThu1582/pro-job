<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view("login");
    }
    public function login(Request $request){
        $credential = $request->validate([
            'email'=>'required|email',
            'password'=>'required|max:100|min:8'
        ]);

        $user = User::where('email', $request->email)->first();
        if($user){
            if(password_verify($request->password, $user->password)){
                Auth::login($user);
                return redirect('/')->with('status', 'Login Successful');
            }else{
                return redirect('/login')->with('status', 'Invalid Credential !');
            }
        }else{
            return redirect('/login')->with('status', 'Login Failed');
        }
    }

    public function logout(){
        Auth::logout();
        
        return redirect('/');
    }
}
