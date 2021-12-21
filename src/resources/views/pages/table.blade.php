@extends('layouts.default')
@section('title', $titlePage)
@section('currentPage', $currentPage)

@section('content')
<div class="row">
    <div class="sticky-top">
        <a href="/{{$currentPage}}/create" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Adiconar</a>
    </div>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">Nome</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            </tr>
            <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            </tr>
            <tr>
            <th scope="row">3</th>
            <td>Larry</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection