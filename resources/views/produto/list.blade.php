@extends('layouts.templatelist')

@section('titulo')
  PRODUTOS
@stop

@section('href')
  <a style="font-size:22px;" href="/cadastro/produto/">CADASTRAR</a>
@stop

@section('conteudo')


<table class="table">
  <thead>
    <tr>
      <th style="font-size:30px" scope="col">#</th>
      <th style="font-size:30px" scope="col">Nome</th>
      <th style="font-size:30px" scope="col">Marca</th>
      <th style="font-size:30px" scope="col">Categoria</th>
      <th style="font-size:30px" scope="col">Preço de Custo</th>
      <th style="font-size:30px" scope="col">Preço Unitário</th>
      <th style="font-size:30px" scope="col">Fornecedor</th>
      <th style="font-size:30px" scope="col">Editar</th>
      <th style="font-size:30px" scope="col">Excluir</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($result as $row)
    
    
    <tr>
      <th style="font-size:30px" scope="row"><a href="/mostrar/produto/{{$row->id}}">{{$row->id}}</a></th>
      <td style="font-size:30px">{{$row->nome}}</td>
      <td style="font-size:30px">{{$row->marca}}</td>
      <td style="font-size:30px">{{$row->categoria}}</td>
      <td style="font-size:30px">R$ {{$row->preco_custo}}</td>
      <td style="font-size:30px">R$ {{$row->preco_unitario}}</td>
      <td style="font-size:30px">{{$row->nome_fornecedor}}</td>
      <td style="font-size:30px"><a href="/editar/produto/{{$row->id}}"><img src="/image/editar.png" height="20" width="20"></a></td>
      <td style="font-size:30px"><a href="/excluir/produto/{{$row->id}}"><img src="/image/excluir.png"  height="20" width="20"></a></td>
    </tr>
    
  @endforeach
  
  </tbody>
</table>
@stop