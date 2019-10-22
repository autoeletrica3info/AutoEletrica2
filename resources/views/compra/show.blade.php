@extends('layouts.templateshow')


@section('href')

  <a style="font-size:22px;" href="/mostrar/compra/">VOLTAR</a>
@stop

@section('conteudo')


<h1>Compra  {{$compra->id}}</h1>

<hr>
<br>

<h3><b>Valor Total: </b>R$ {{$compra->valor_total}}</h3>
<h3><b>Data da Compra: </b>{{$compra->dt_compra}}</h3>
<h3><b>Criada em: </b>{{$compra->created_at}}</h3>
<h3><b>Atualizada em:   </b>{{$compra->updated_at}}</h3>
@stop