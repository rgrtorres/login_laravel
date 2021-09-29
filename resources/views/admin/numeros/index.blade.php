@extends('admin.layout.main');

@section('conteudo')
@if(!empty($mensagem))
<div class="alert alert-success">{{$mensagem}}</div>
@endif
<h3>Números</h3>
<a href="{{route('admin.numeros.adicionar')}}" class="btn btn-primary">Inserir novo número</a>
<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Cliente</th>
            <th scope="col">Número</th>
            <th scope="col">Status</th>
            <th scope="col">Ação</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($numeros as $numero)
        <tr>
            <th scope="row">{{$numero->id}}</th>
            <td>{{$numero->name}}</td>
            <td>{{$numero->number}}</td>
            <td>{{$numero->status}}</td>
            <td>
                <a href="/admin/numeros/editar/{{$numero->id}}" class="btn btn-warning btn-sm">Editar</a>
                <a href="/admin/numeros/deletar/{{$numero->id}}" class="btn btn-danger btn-sm">Apagar</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
