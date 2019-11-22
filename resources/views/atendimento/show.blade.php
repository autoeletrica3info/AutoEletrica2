@extends('layouts.templateshow')


@section('href')

  <a style="font-size:22px;" href="/mostrar/atendimento/">VOLTAR</a>
@stop

@section('conteudo')


<h1>Atendimento  {{$atendimento->id}}</h1>

<hr>
<br>

<h3><b>Descrição: </b>{{$atendimento->descricao}}</h3>
<h3><b>Valor servico: </b>{{$atendimento->valor_servico}}</h3>
<h3><b>Data da Compra: </b>{{$atendimento->data}}</h3>
<h3><b>Carro: </b>{{$atendimento->carro_id}}</h3>
<h3><b>Criada em: </b>{{$atendimento->created_at}}</h3>
<h3><b>Atualizada em:   </b>{{$atendimento->updated_at}}</h3>
<br>
<br>
<h1>PRODUTOS<h1>
<table class="table">
  <thead>
    <tr>
      <th style="font-size:30px" scope="col">ID Produto</th>
      <th style="font-size:30px" scope="col">ID Atendimento</th>
      <th style="font-size:30px" scope="col">Quantidade</th>
      <th style="font-size:30px" scope="col">Valor Unitário</th>
      <th style="font-size:30px" scope="col">Editar</th>
      <th style="font-size:30px" scope="col">Excluir</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($result as $row)
  
    <tr>
      <th style="font-size:30px" scope="row">{{$row->produto_id}}</th>
      <th style="font-size:30px" scope="row">{{$row->atendimento_id}}</th>
      <td style="font-size:30px">{{$row->quantidade}}</td>
      <td style="font-size:30px">{{$row->preco_unitario}}</td>
      <td style="font-size:30px"><a href="/editar/atendimento/produto/{{$row->produto_id}}/{{$row->atendimento_id}}"><img src="/image/editar.png" height="20" width="20"></a></td>
      <td style="font-size:30px"><a href="/excluir/atendimento/produto/{{$row->produto_id}}/{{$row->atendimento_id}}"><img src="/image/excluir.png"  height="20" width="20"></a></td>
    </tr>
  @endforeach
  
  </tbody>
</table>

@stop