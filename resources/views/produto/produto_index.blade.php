@extends('adminlte::page')

@section('content')

<div class="container">
  Produtos
  <br>

<a href="{{url('/produto/create')}}">Criar</a>

@if (session('status'))
  <div class="alert alert-success">
      {{ session('status') }}
</div>
@endif

<table>
<thead>
  <tr>
      <th>ID</th>
    <th>Nome</th>
    <th>Valor</th>
    <th>Quantidade</th>
    <th>Ações</th>
  </tr>
</thead>

@foreach ($produtos as $produto)
<tbody>
  <tr>
   <td>{{$produto->id}}</td>
    <td>{{$produto->nome}}</td>
    <td>{{$produto->preco}}</td>
    <td>{{$produto->quantidade}}</td>
    <td>
      <a href= "{{ url('/produto/' . $produto->id) }}">VISUALIZAR</a>
      <a href= "{{ url('/produto/' . $produto->id . '/edit') }}">EDITAR</a>

    </td>
  </tr>
</tbody>
</table>

    Produto: {{ $produto->nome }}<br>
@endforeach

</div>
@endsection
