@extends('adminlte::page')

@section('content')

    Produtos<br>
    <a href="{{ url('categoria/create') }}">CRIAR</a>

    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif

    <table>
  <tr>
    <th>Nome</th>
    <th>Ação</th>
  </tr>
    @foreach ($categorias as $value)
  <tr>
    <td>{{ $value->nome }}</td>
    <td>
      <a href="{{ url('categoria/' . $value->id) }}">Visualizar</a>
      <a href="{{ url('categoria/' . $value->id . '/edit') }}">Editar</a>
      <form method="POST" action="{{ url('/categoria/' . $value->id) }}" onsubmit = "return ConfirmDelete()">
        @method('DELETE')
        @csrf
        <input class="btn btn-danger" type="submit" value="EXCLUIR">
      </form>
    </td>
  </tr>
    @endforeach
</table>

@endsection