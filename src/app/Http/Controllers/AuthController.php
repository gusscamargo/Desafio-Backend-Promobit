<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function authentication(Request $request){

        $user = [
            "username" => $request->input("username"),
            "password" => $request->input("password")
        ];

        if(Auth::attempt($user)){
            return redirect()->intended("home");
        }

        return back()->withErrors(['errors' => 'Usuario ou Senha invalidos']);;
    }

    public function logout(Request $request){
        Auth::logout();

        return redirect('/');
    }
}
