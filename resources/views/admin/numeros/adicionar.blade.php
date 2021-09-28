@extends('admin.index');

@section('conteudo')
@if($errors->all())
    @foreach ($errors->all() as $error)
        <div><div class="alert alert-danger">{{$error}}</div></div>
    @endforeach
@endif
<h3>Adicionar Número</h3>
<form action="{{route('admin.numeros.do')}}" method="POST">
    @csrf

    <div class="form-group">
        <label for="nome">Usuário</label>
        <input type="text" class="form-control" value="{{Auth::User()->name}}" disabled>
    </div>

    <div class="form-group">
        <label for="nome">Número de identificação do cliente</label>
        <input type="text" name="customer_id" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="nome">Número</label>
        <input type="text" name="number" class="form-control" required>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </div>
</form>
@endsection
