<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function showProducts(Request $request)
    {
        return view("pages.table", [
            "currentPage" => "product",
            "titlePage" => "Produtos"
        ]);
    }
}
