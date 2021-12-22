@extends('layouts.default')
@section('title', $titlePage)
@section('currentPage', $currentPage)

@section('content')

@if (count($errors) > 0)
    <div class="alert alert-danger" role="alert">
        Ocorreu um problema:
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{$error}}</li>  
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="/{{$currentPage}}/{{isset($data["id"]) == False ? "create" : "edit"}}">
    @csrf
  <div class="form-group">
    @if (isset($data["id"]))
    <input type="hidden" name="id" value="{{$data["id"]}}">
    @endif
    <label for="name">Nome</label>
    <input name="name" type="text" class="form-control" id="name" placeholder="Digite o nome" value="{{isset($data["name"]) == False ? "" : $data["name"]}}">
  </div>
 

  @if ($currentPage == "product" && $data != [])
  <br>
  <div>
    <h6>Selecione as tags do produto:</h6>
      @if (count($data["tags"]->all()) == 0)
        <p>Nenhuma tag Registrada</p>
      @endif

      <div class="btn-group" role="group" >
        @foreach ($data["tags"]->all() as $key => $tag)

          <input name="tag[]" type="checkbox" class="btn-check" id="btn-check-{{$key}}-outlined" autocomplete="off" value="{{$tag["id"]}}">
          <label class="btn btn-outline-secondary" for="btn-check-{{$key}}-outlined" style="margin-left: 2px">{{$tag["name"]}}</label><br>

        @endforeach
      </div>
    </div>

  @endif

  <div class="col text-center">
    <button type="submit" class="btn btn-{{isset($data["id"])  == False ? "primary" : "success"}}" style="margin-top: 10px">{{isset($data["id"]) == False ? "Registrar" : "Salvar"}}</button>
  </div>
</form>

@endsection