@extends('layouts.templatecadastro')

@section('titulo')
Formulário de Exclusão de Produtos
@stop

@section('form')
<hr>
<form action="/produto/{{$produto->id}}" method="post">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
    <p style="font-size: 32px">Deseja mesmo excluir {{$produto->id}} ?</p>
    <button class="btn btn-danger" type="submit">Deletar</button>
</form>
<br>
<br>
<br>
<a href="/mostrar/produto/">Mostar Mensagem</a>
@stop