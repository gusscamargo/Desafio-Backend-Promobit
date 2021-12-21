<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller{
    public function __invoke(){
        
        if(Auth::check()){
            return redirect("/home");
        }

        return view("login.auth");
    }
}