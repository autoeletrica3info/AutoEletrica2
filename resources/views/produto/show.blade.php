@extends('layouts.templateshow')


@section('href')

  <a class="btn btn-dark" href="/mostrar/produto/">VOLTAR</a>
@stop

@section('conteudo')


<h1>Produto  {{$produto->id}}</h1>

<hr>
<br>

<h3><b>Nome: </b>{{$produto->nome}}</h3>
<h3><b>Marca: </b>{{$produto->marca}}</h3>
<h3><b>Categoria: </b>{{$produto->categoria}}</h3>
<h3><b>Preço de Custo:   </b>R$ {{$produto->preco_custo}}</h3>
<h3><b>Preço Unitário em:   </b>R$ {{$produto->preco_unitario}}</h3>
<h3><b>ID Fornecedor:   </b>{{$produto->fornecedor_id}}</h3>
<h3><b>Atualizada em:   </b>{{$produto->updated_at}}</h3>
@stop

<script>
  var msg = '{{Session::get('success')}}';
  var exist = '{{Session::has('success')}}';
  if(exist){
    alert(msg);
  }
</script>