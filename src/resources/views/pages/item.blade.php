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
<form method="POST" action="/{{$currentPage}}/create">
    @csrf
  <div class="form-group">
    <label for="name">Nome</label>
    <input name="name" type="text" class="form-control" id="name" placeholder="Digite o nome">
  </div>
  <div class="col text-center">
    <button type="submit" class="btn btn-primary">Registrar</button>
  </div>
</form>
@endsection