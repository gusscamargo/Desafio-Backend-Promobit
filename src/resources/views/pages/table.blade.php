@extends('layouts.default')
@section('title', $titlePage)
@section('currentPage', $currentPage)

@section('content')

    <div class="row">
        <div class="sticky-top" style="margin-left: 90%">
            <a href="/{{$currentPage}}/create" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Adicionar</a>
        </div>
    </div>
    <div class="row col">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                </tr>
            </thead>
            <tbody>
                @if (count($data->all()) == 0)
                    <td>
                        <td>Não há registros</td>
                    </td>
                @endif
                @foreach ($data as $item)
                <tr>
                    <td>
                        {{$item->name}}
                    </td>
                    <td class="d-flex flex-row-reverse">
                        <div class="btn-group">
                            <a type="submit" class="btn btn-primary" role="button" href="/{{$currentPage}}/{{$item->id}}">Editar</a>
                            <form method="POST" action="/{{$currentPage}}/delete">
                                @csrf
                                <input type="hidden" name="id" value="{{$item->id}}">
                                <button type="submit" class="btn btn-danger">Excluir</button>
                            </form>
                        </div>
                    </td>                
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection