@extends('admin.layout.main');

@section('conteudo')
@if(!empty($mensagem))
<div class="alert alert-success">{{$mensagem}}</div>
@endif
<h3>Clientes</h3>
<a href="{{route('admin.adicionar')}}" class="btn btn-primary">Inserir novo cliente</a>
<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Documento</th>
            <th scope="col">Status</th>
            <th scope="col">Ação</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($clientes as $cliente)
        <tr>
            <th scope="row">{{$cliente->id}}</th>
            <td>{{$cliente->name}}</td>
            <td>{{$cliente->document}}</td>
            <td>{{$cliente->status}}</td>
            <td>
                <a href="/admin/clientes/editar/{{$cliente->id}}" class="btn btn-warning btn-sm">Editar</a>
                <a href="/admin/clientes/deletar/{{$cliente->id}}" class="btn btn-danger btn-sm">Apagar</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
