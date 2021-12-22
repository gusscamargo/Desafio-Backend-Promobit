<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    public function show(Request $request){

        return view("pages.table",[
            "currentPage" => "tag",
            "titlePage" => "Tags",
            "data" => $this->getAll()
        ]);
    }

    private function getAll(){
        return Tag::all();
    }

    public function createPage(Request $request){
        return view("pages.item", [
            "currentPage" => "tag",
            "titlePage" => "Adicionar Tag",
            "data" => []
        ]);
    }

    public function register(Request $request){
        $name = $request->input("name");

        if($name == "") return back()->withErrors(["errors" => ["Tag invalida", "Registre outra tag por favor"]]);

        // Verificar se ja não tem essa tag registrada no bd
        if($this->discoverIfExists($name)) return back()->withErrors(["errors" => ["Tag ja Registrada", "Registre outra tag por favor"]]);

        $data = [
            "name" => $name
        ];

        // Problema de registro no bd
        if(!$this->registerInBD($data)) return back()->withErrors(["errors" => "Ocorreu algum problema no registro da Tag"]);

        return redirect("/tag");

    }

    private function discoverIfExists($name){
        return count(Tag::where("name", $name)->get()) > 0;
    }

    private function registerInBD($data){
        return Tag::create($data);
    }

    public function registeredPage($id){

        $data = $this->findTag($id);

        return view("pages.item", [
            "currentPage" => "tag",
            "titlePage" => "Editar Tag",
            "data" => $data
        ]);
    }

    private function findTag($id){
        return Tag::findOrFail($id);
    }

    public function update(Request $request){
        $id = $request->input("id");
        $name = $request->input("name");

        // Verificar se ja não tem essa tag registrada no bd
        if ($this->discoverIfExists($name)) return back()->withErrors(["errors" => ["Tag ja Registrada", "Registre outra tag por favor"]]);

        $data = [
            "name" => $name
        ];

        
        if (!$this->updateBD($id, $data)) return back()->withErrors(["errors" => "Ocorreu algum problema na atualização da Tag"]);

        return redirect("/tag");
    }

    private function updateBD($id, $data){
       return Tag::where("id", $id)->update($data);
    }

    public function delete(Request $request){
        $id = $request->input("id");

        if (!$this->deleteBD($id)) return back()->withErrors(["errors" => "Ocorreu algum problema na atualização da Tag"]);

        return redirect("/tag");
    }

    private function deleteBD($id){
        return Tag::destroy($id);
    }
}
