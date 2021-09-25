@extends('admin.layout.main');

@section('conteudo')
<h3>Últimos clientes</h3>
<a href="{{route('admin.adicionar')}}" class="btn btn-primary">Inserir novo cliente</a>
<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Documento</th>
            <th scope="col">Status</th>
        </tr>
    </thead>

    <tbody>
        @for ($i = 1; $i <= 5; $i++)
        <tr>
            <th scope="row">{{$i}}</th>
            <td>MSC</td>
            <td>45829007824</td>
            <td>active</td>
        </tr>
        @endfor
    </tbody>
</table>
@endsection
