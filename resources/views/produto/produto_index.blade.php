@extends('adminlte::page')

@section('content')

<div class="container">
  Produtos
  <br><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>



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
    border-right: 2px solid black;
    border-left: 2px solid black;
    border-bottom: 2px solid black;
    text-decoration:none;


  }


</style>
<body>
 
  
  <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Categoria</th>
      <th scope="col">ID</th>
      <th scope="col">Nome</th>
      <th scope="col">Valor</th>
      <th scope="col">Quantidade</th>
      <th scope="col">Ações</th>
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
