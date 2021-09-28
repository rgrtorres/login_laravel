@extends('admin.layout.main');

@section('conteudo')
@if($errors->all())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger">{{$error}}</div>
    @endforeach
@endif
<h3>Editar Cliente</h3>
<form action="/admin/clientes/editar/{{$cliente->id}}/do" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Cliente</label>
        <input type="text" name="name" class="form-control" value="{{$cliente->name}}">
    </div>

    <div class="form-group">
        <label for="document">Documento</label>
        <input type="text" name="document" class="form-control" value="{{$cliente->document}}">
    </div>

    <div class="form-group">
        <label for="status">Status</label>
        <select name="status" class="form-control">
            <option value="new" @if ($cliente->status == "new") selected @endif>Novo</option>
            <option value="active" @if ($cliente->status == "active") selected @endif>Ativo</option>
            <option value="suspended" @if ($cliente->status == "suspended") selected @endif>Suspenso</option>
            <option value="cancelled" @if ($cliente->status == "cancelled") selected @endif>Cancelado</option>
        </select>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Editar</button>
    </div>
</form>
@endsection
