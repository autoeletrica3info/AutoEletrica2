@extends('layouts.templatelist')

@section('titulo')
  ATENDIMENTOS
@stop

@section('href')
  <a style="font-size:22px;" href="/cadastro/atendimento/">CADASTRAR</a><br>
  <a style="font-size:22px;" href="/adicao/atendimento/">ADICIONAR PRODUTO</a>
@stop

@section('conteudo')


<table class="table">
  <thead>
    <tr>
      <th style="font-size:30px" scope="col">#</th>
      <th style="font-size:30px" scope="col">Descricao</th>
      <th style="font-size:30px" scope="col">Valor Serviço</th>
      <th style="font-size:30px" scope="col">Valor Total</th>
      <th style="font-size:30px" scope="col">Placa do Carro</th>
      <th style="font-size:30px" scope="col">Situação</th>
      <th style="font-size:30px" scope="col">Editar</th>
      <th style="font-size:30px" scope="col">Excluir</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($result as $row)
  
    <tr>
      <th style="font-size:30px" scope="row"><a href="/mostrar/atendimento/{{$row->id}}">{{$row->id}}</a></th>
      <td style="font-size:30px">{{$row->descricao}}</td>
      <td style="font-size:30px">{{$row->valor_servico}}</td>
      <td style="font-size:30px">{{$row->valor_total}}</td>
      <td style="font-size:30px">{{$row->placa}}</td>
      <td style="font-size:30px">@if ($row->situacao == 1) Solucionado 
                                 @elseif ($row->situacao == 2) Em andamento
                                 @elseif ($row->situacao == 3) Em espera @endif</td>
      <td style="font-size:30px"><a href="/editar/atendimento/{{$row->id}}"><img src="/image/editar.png" height="20" width="20"></a></td>
      <td style="font-size:30px"><a href="/excluir/atendimento/{{$row->id}}"><img src="/image/excluir.png"  height="20" width="20"></a></td>
    </tr>
  @endforeach
  
  </tbody>
</table>
@stop