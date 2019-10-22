@extends('layouts.templateshow')


@section('href')

  <a style="font-size:22px;" href="/mostrar/atendimento/">VOLTAR</a>
@stop

@section('conteudo')


<h1>Compra  {{$atendimento->id}}</h1>

<hr>
<br>

<h3><b>Descrição: </b>{{$atendimento->descricao}}</h3>
<h3><b>Valor servico: </b>{{$atendimento->valor_servico}}</h3>
<h3><b>Valor Total: </b>{{$atendimento->valor_total}}</h3>
<h3><b>Data da Compra: </b>{{$atendimento->data}}</h3>
<h3><b>Carro: </b>{{$atendimento->carro_id}}</h3>
<h3><b>Criada em: </b>{{$atendimento->created_at}}</h3>
<h3><b>Atualizada em:   </b>{{$atendimento->updated_at}}</h3>

@stop