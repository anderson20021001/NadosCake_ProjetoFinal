@extends('adminlte::page')

@section('content')
<div>
    Formulário de Criação:<br>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


    <form method="POST" action="{{url('/produto/create')}}">
        @csrf
        <form>
  <label for="fname">Nome:</label><br>
  <input type="text" id="fname" name="nome"><br>

  <label for="fname">Quantidade:</label><br>
  <input type="text" id="fname" name="quantidade"><br>

  <label for="fname">Preço:</label><br>
  <input type="text" id="fname" name="preco"><br>

  <input type="submit" value="Enviar">

</form>

</div>
@endsection
