@extends('layouts.templatelist')

@section('titulo')
  COMPRAS
@stop

@section('href')
  <a style="font-size:22px;" href="/cadastro/compra/">CADASTRAR</a>
@stop

@section('conteudo')


<table class="table">
  <thead>
    <tr>
      <th style="font-size:30px" scope="col">#</th>
      <th style="font-size:30px" scope="col">Valor</th>
      <th style="font-size:30px" scope="col">Data da Compra</th>
      <th style="font-size:30px" scope="col">Editar</th>
      <th style="font-size:30px" scope="col">Excluir</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($compra as $comp)
    <tr>
      <th style="font-size:30px"><a style="text-decoration: none" href="/mostrar/compra/{{$comp->id}}">{{$comp->id}}</a></th>
      <td style="font-size:30px">R$ {{$comp->valor_total}}</td>
      <td style="font-size:30px">{{$comp->dt_compra}}</td>
      <td style="font-size:30px"><a href="/editar/compra/{{$comp->id}}"><img src="/image/editar.png" height="20" width="20"></a></td>
      <td style="font-size:30px"><a href="/excluir/compra/{{$comp->id}}"><img src="/image/excluir.png"  height="20" width="20"></a></td>
    </tr>
  @endforeach
  
  </tbody>
</table>
@stop