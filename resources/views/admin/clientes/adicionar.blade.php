@extends('admin.index');

@section('conteudo')
<h3>Adicionar Cliente</h3>
@if($errors->all())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger">{{$error}}</div>
    @endforeach
@endif
<form action="{{route('admin.adicionar.do')}}" method="POST">
    @csrf
    <div class="form-group">
        <label for="nome">Usuário</label>
        <input type="text" class="form-control" value="{{Auth::User()->name}}" disabled>
    </div>

    <div class="form-group">
        <label for="nome">Cliente</label>
        <input type="text" name="name" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="nome">CNPJ</label>
        <input type="text" name="document" class="form-control" required>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </div>
</form>
@endsection
