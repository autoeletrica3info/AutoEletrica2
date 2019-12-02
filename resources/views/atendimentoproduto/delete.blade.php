@extends('layouts.templatecadastro')

@section('titulo')
Formulário de Exclusão de Produtos-Atendimentos
@stop

@section('form')
<hr>
<form action="/atendimento/produto/{{$result->produto_id}}/{{$result->atendimento_id}}" method="post">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
    <p style="font-size: 32px">Deseja mesmo excluir {{$result->produto_id}} ?</p>
    <button class="btn btn-danger" type="submit">Deletar</button>
</form>
<br>
<br>
<br>
<a href="/mostrar/atendimentos/">Mostar Atendimentos</a>
@stop