<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Product_Tag;
use App\Models\Tag;

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
        return Product::orderBy('name')->get();
    }

    public function createPage(Request $request)
    {
        $tags = $this->getAllTags();

        return view("pages.item", [
            "currentPage" => "product",
            "titlePage" => "Adicionar Produto",
            "data" => [
                "tags" => $tags
            ]
        ]);
    }

    private function getAllTags(){
        return Tag::orderBy('name')->get();
    }

    public function register(Request $request)
    {
        $name = $request->input("name");
        $tags = $request->tag;


        if ($name == "") return back()->withErrors(["errors" => ["Produto invalido", "Registre outro produto por favor"]]);

        // Verificar se ja não tem essa tag registrada no bd
        if ($this->discoverIfExists($name)) return back()->withErrors(["errors" => ["Produto ja Registrado", "Registre outro produto por favor"]]);

        $data = [
            "name" => $name
        ];

        $lastInsert = $this->registerInBD($data);

        $this->registerTagInProduct($lastInsert->id, $tags);

        return redirect("/product");
    }

    private function discoverIfExists($name)
    {
        return count(Product::where("name", $name)->get()) > 0;
    }

    private function registerInBD($data)
    {
        return Product::create($data);
    }
    
    private function registerTagInProduct($productId, $tagsIds){
        $data = [];

        foreach($tagsIds as $tagId){
            $data[] = [
                "product_id" => $productId,
                "tag_id" => $tagId
            ];
        }

        Product_Tag::insert($data);
    }

    public function delete(Request $request){
        $id = $request->input("id");

        $this->deleteRelationTag($id);
        $this->deleteProduct($id);

        return redirect("/product");

    }

    private function deleteRelationTag($productId){
        return Product_Tag::where("product_id", $productId)->delete();
    }

    private function deleteProduct($id){
        return Product::destroy($id);
    }


}
