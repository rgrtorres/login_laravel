@extends('admin.layout.main');

@section('conteudo')
    <h3>Adicionar Usuário</h3>
    @if($errors->all())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">{{$error}}</div>
        @endforeach
    @endif
    <form action="{{route('admin.usuarios.adicionar.do')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" name="name" class="form-control">
        </div>

        <div class="form-group">
            <label for="name">Email</label>
            <input type="text" name="email" class="form-control">
        </div>

        <div class="form-group">
            <label for="name">Senha</label>
            <input type="password" name="password" class="form-control">
        </div>

        <div class="form-group">
            <label for="name">Repetir Senha</label>
            <input type="password" name="password_confirmation" class="form-control">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </div>
    </form>
@endsection
