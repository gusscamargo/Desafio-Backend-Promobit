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

    // Pagina de Criação de produto
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
        $tags = isset($request->tag) ? $request->tag : [];


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

    // Pagina de edição de produto
    public function editPage($id){

        $product = $this->findProduct($id);
        $tags = $this->getAllTags();
        $tagsRelationated = $this->findTagsRelationated($id);

        return view("pages.item", [
            "currentPage" => "product",
            "titlePage" => "Editar Produto",
            "data" => [
                "id" => $product->id,
                "name" => $product->name,
                "tags" => $tags,
                "tagsRelationated" => $tagsRelationated
            ]
        ]);
    }

    private function findProduct($id){
        return Product::find($id);
    }

    private function findTagsRelationated($id){
        $tagsRelationated = Product_Tag::where("product_id", $id)->get();

        $tagGroup = [];

        foreach($tagsRelationated as $tag){
            $tagGroup[] = $tag->tag_id;
        }

        return $tagGroup;
    }

    public function update(Request $request){
        $id = $request->input("id");
        $name = $request->input("name");
        $tags = isset($request->tag) ? $request->tag : [];

        // Atualizar nome do produtos
        $this->updateNameBD($id, $name);

        // Atualizar tags relacionadas
        $this->deleteRelationTag($id);
        $this->registerTagInProduct($id, $tags);

        return redirect("/product");
    }

    private function updateNameBD($id, $name){
        return Product::where("id", $id)->update(["name" => $name]);
    }

}
