@extends('layouts.templateshow')


@section('href')

  <a class="btn btn-dark" href="/mostrar/fornecedor/">VOLTAR</a>
@stop

@section('conteudo')


<h1>Fornecedor  {{$fornecedor->id}}</h1>

<hr>
<br>

<h3><b>Nome: </b>{{$fornecedor->nome_fornecedor}}</h3>
<h3><b>Telefone: </b>{{$fornecedor->telefone}}</h3>
<h3><b>Email:   </b>R$ {{$fornecedor->email}}</h3>
<h3><b>Endereço: </b>{{$fornecedor->email}}</h3>
<h3><b>País:   </b>R$ {{$fornecedor->pais}}</h3>
<h3><b>Estado:   </b>R$ {{$fornecedor->uf}}</h3>
<h3><b>Cidade:   </b>{{$fornecedor->cidade}}</h3>
<h3><b>Atualizada em:   </b>{{$fornecedor->updated_at}}</h3>
@stop

<script>
  var msg = '{{Session::get('success')}}';
  var exist = '{{Session::has('success')}}';
  if(exist){
    alert(msg);
  }
</script>