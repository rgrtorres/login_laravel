@extends('admin.layout.main');

@section('conteudo')
    @if (!empty($mensagem))
    <div class="alert alert-success">{{$mensagem}}</div>
    @endif
    <h3>Usuários</h3>
    <a href="{{route('admin.usuarios.adicionar')}}" class="btn btn-primary">Criar Usuário</a>
    <table class="table">
        <thead>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Email</th>
            <th scope="col">Ação</th>
        </thead>

        <tbody>
            @foreach ($usuarios as $usuario)
            <tr>
                <td scope="col">{{$usuario->id}}</td>
                <td>{{$usuario->name}}</td>
                <td>{{$usuario->email}}</td>
                <td>
                    <a href="/admin/usuarios/editar/{{$usuario->id}}" class="btn btn-warning btn-sm">Editar</a>
                    <a href="/admin/usuarios/deletar/{{$usuario->id}}" class="btn btn-danger btn-sm">Apagar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
