<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //
    public function showProducts(Request $request)
    {
        return view("pages.table", [
            "currentPage" => "product",
            "titlePage" => "Produtos",
            "data" => $this->getAllProducts()
        ]);
    }

    private function getAllProducts(){
        return Product::all();
    }
}
