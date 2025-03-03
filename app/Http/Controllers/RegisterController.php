<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function index(){
        return view("register");
    }

    public function register(Request $request){
        // dd($request->name);
        $credentials = $request->validate([
            "name"=> 'required|max:100',
            'email'=> 'required|email',
            'password'=> 'required|max:100|min:8',
            'role' => 'required|string'
        ]);

        $user = User::create($credentials);
        
        Auth::login($user);

        return redirect('/')->with('status', 'User have been created');
    }
}
