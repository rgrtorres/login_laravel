@extends('admin.layout.main');

@section('conteudo')
<h3>Editar número</h3>
<form action="/admin/clientes/editar/{{$numero->id}}/do" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Cliente</label>
        <input type="text" name="customer_id" class="form-control" value="{{$numero->customer_id}}">
    </div>

    <div class="form-group">
        <label for="document">Número</label>
        <input type="text" name="number" class="form-control" value="{{$numero->number}}">
    </div>

    <div class="form-group">
        <label for="status">Status</label>
        <select name="status" class="form-control">
            <option value="active" @if ($numero->status == "active") selected @endif>Ativo</option>
            <option value="inactive" @if ($numero->status == "inactive") selected @endif>Inativo</option>
            <option value="cancelled" @if ($numero->status == "cancelled") selected @endif>Cancelado</option>
        </select>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Editar</button>
    </div>
</form>
@endsection
