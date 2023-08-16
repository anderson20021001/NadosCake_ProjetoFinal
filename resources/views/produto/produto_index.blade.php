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
    <th>Nome</th>
    <th>Valor</th>
    <th>Quantidade</th>
  </tr>
</thead>

@foreach ($produtos as $produto)
<tbody>
  <tr>
    <td>{{$produto->nome}}</td>
    <td>{{$produto->preco}}</td>
    <td>{{$produto->quantidade}}</td>
  </tr>
</tbody>
</table>

    Produto: {{ $produto->nome }}<br>
@endforeach

</div>
@endsection
