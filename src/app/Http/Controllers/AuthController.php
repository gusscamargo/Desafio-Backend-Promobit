<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function authentication(Request $request){
        return redirect("/home");
    }

    public function logout(){
        return redirect("/");
    }
}
