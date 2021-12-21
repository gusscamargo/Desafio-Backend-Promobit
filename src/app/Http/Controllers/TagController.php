<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    public function showTags(Request $request){

        return view("pages.table",[
            "currentPage" => "tag",
            "titlePage" => "Tags",
            "data" => $this->getAllTags()
        ]);
    }

    private function getAllTags(){
        return Tag::all();
    }
}
