@extends('admin.layout.main');

@section('conteudo')
@if(!empty($mensagem))
<div class="alert alert-success">{{$mensagem}}</div>
@endif
<h3>Prefêrencias</h3>
<a href="{{route('admin.numeros.adicionar')}}" class="btn btn-primary">Inserir prefêrencia</a>
<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Cliente</th>
            <th scope="col">Prefêrencia</th>
            <th scope="col">Valor</th>
            <th scope="col">Ação</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($preferencias as $preferencia)
        <tr>
            <th scope="row">{{$preferencia->id}}</th>
            <td>{{$preferencia->number_id}}</td>
            <td>{{$preferencia->name}}</td>
            <td>{{$preferencia->value}}</td>
            <td>
                <a href="preferencias/editar/{{$preferencia->id}}" class="btn btn-warning btn-sm">Editar</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
