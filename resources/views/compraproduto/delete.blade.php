@extends('layouts.templatecadastro')

@section('titulo')
Formulário de Exclusão de Produtos-Compra
@stop

@section('form')
<hr>
<form action="/compra/produto/{{$result->produto_id}}/{{$result->compra_id}}" method="post">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
    <p style="font-size: 32px">Deseja mesmo excluir o produto de ID: {{$result->produto_id}} ?</p>
    <button class="btn btn-danger" type="submit">Deletar</button>
</form>
<br>
<br>
<br>
<a href="/mostrar/compra/">Mostar Atendimentos</a>
@stop