@extends('adminlte::page')

@section('content')

<div class="container">
  Produtos
  <br>



@if (session('status'))
  <div class="alert alert-success">
      {{ session('status') }}
</div>
@endif
    <script>
    function confirmDelete() {
    return confirm('Tem certeza que deseja excluir este registro?');
    }
  </script>



<a href="{{url('/produto/create')}}">Criar</a>
<style>
  form {
    display:inline-block;
  }
  table, th, td{
    border: 2px solid black;
    text-align:center;
    background-color:lightblue;

  }
  #estilo:hover{
    border: 2px solid black;
    color:red;
  }
  

</style>
<body>
<table>
<thead>
  <tr>
    <th>Categoria</th>
    <th>ID</th>
    <th>Nome</th>
    <th>Valor</th>
    <th>Quantidade</th>
    <th>Ações</th>
  </tr>
</thead>
<tbody>
@foreach ($produtos as $produto)
  <tr>
  <td>{{$produto->categoria->nome}}</td>
   <td>{{$produto->id}}</td>
    <td>{{$produto->nome}}</td>
    <td>{{$produto->preco}}</td>
    <td>{{$produto->quantidade}}</td>

    <td>
      <div id="estilo">
      <a href= "{{ url('/produto/' . $produto->id) }}">VISUALIZAR</a>
      <a href= "{{ url('/produto/' . $produto->id . '/edit') }}">EDITAR</a>
      <form method="POST" action="{{ url('/produto/' . $produto->id) }}" onsubmit = "return ConfirmDelete()" >
        @method('DELETE')
        @csrf
      <input type="submit" value="EXCLUIR">
</div>
</form>
    </td>
  </tr>
  @endforeach
</tbody>
</table>

  

</div>
</body>
@endsection
