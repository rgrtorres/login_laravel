@extends('admin.layout.main');

@section('conteudo')
    <h3>Editar Usuário</h3>
    <form action="/admin/usuarios/editar/do/{{$usuario->id}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" name="name" class="form-control" value="{{$usuario->name}}">
        </div>

        <div class="form-group">
            <label for="name">Email</label>
            <input type="text" name="email" class="form-control" value="{{$usuario->email}}">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Editar</button>
        </div>
    </form>
@endsection
