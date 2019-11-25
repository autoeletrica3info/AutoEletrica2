@extends('layouts.templatecadastro')

@section('titulo')
Formulário de Exclusão de Produtos-Atendimentos
@stop

@section('form')
<hr>
<form action="/fornecedor/{{$fornecedor->id}}" method="post">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
    <p style="font-size: 32px">Deseja mesmo excluir {{$fornecedor->id}} ?</p>
    <button class="btn btn-danger" type="submit">Deleter</button>
</form>
<br>
<br>
<br>
<a href="/mostrar/fornecedor/">Mostar Fornecedores</a>
@stop