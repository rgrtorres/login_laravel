@extends('admin.layout.main');

@section('conteudo')
@if($errors->all())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger">{{$error}}</div>
    @endforeach
@endif
<h3>Editar Prefêrencia</h3>
<form action="/admin/preferencias/editar/{{$preferencia->id}}/do" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Cliente</label>
        <input type="text" name="number_id" class="form-control" value="{{$preferencia->number_id}}" disabled>
    </div>

    <div class="form-group">
        <label for="name">Preferencia</label>
        <input type="text" name="name" class="form-control" value="{{$preferencia->name}}" disabled>
    </div>

    <div class="form-group">
        <label for="value">Value</label>
        <input type="text" name="value" class="form-control" value="{{$preferencia->value}}">
        <div style="padding: 3px; font-size: 10px;">0 ou 1</div>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Editar</button>
    </div>
</form>
@endsection
