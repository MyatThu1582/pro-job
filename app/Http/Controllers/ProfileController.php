<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(){
        $user = auth()->user();
        return view("profile.index", compact('user'));
    }
    public function edit(){

        $id = auth()->user()->id;
        $user = User::where('id',$id)->first();
        return view("profile.edit", compact('user'));
    }

    public function update(Request $request){
        
        $credential = $request->validate([
            'name'=> 'required',
            'bio' => 'required|max:500'
        ]);

        $id = auth()->user()->id;

        $user = User::where('id',$id)->first();

        $user->update($credential);

        return redirect('/')->with('success','Edited Profile Data Successful');
    }

    public function view(Request $request){

        $id = $request->id;

        $user = User::where('id',$id)->firstorfail();

        return view('profile.index', compact('user'));
    }
}
