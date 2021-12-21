@extends('layouts.default')
@section('title', $titlePage)
@section('currentPage', $currentPage)

@section('content')
<div class="row">
    <div class="sticky-top" style="margin-left: 90%">
        <a href="/{{$currentPage}}/create" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Adicionar</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nome</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
            <tr>
                <td>
                    <a href="/{{$currentPage}}/{{$item->id}}">{{$item->name}}</a>
                </td>                
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection