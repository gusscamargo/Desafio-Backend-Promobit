<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TagController extends Controller
{
    public function showTags(Request $request){
        return view("pages.table",[
            "currentPage" => "tag",
            "titlePage" => "Tags"
        ]);
    }
}
