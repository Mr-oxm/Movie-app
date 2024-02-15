<?php

namespace App\Http\Controllers;
use Hash;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class SignupController extends Controller
{

    public function view(Request $request){
        return view('Signup');
    }
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
        User::create([
            'name' =>  $request->name,
            'email' =>  $request->email,
            'password' => $request->password
        ]);
        

        return redirect()->route('login.view')->with('success','');
    }
}


