@extends('admin.index');

@section('conteudo')
<h3>Adicionar Cliente</h3>
<form action="">
    @csrf

    <div class="form-group">
        <label for="nome">Cliente</label>
        <input type="text" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="nome">CNPJ</label>
        <input type="text" class="form-control" required>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </div>
</form>
@endsection
