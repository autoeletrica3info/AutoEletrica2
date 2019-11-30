@extends('layouts.templatecadastro')

@section('titulo')
Formulário de Exclusão de Compra
@stop

@section('form')
<hr>
<form action="/compra/{{$compra->id}}" method="post">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
    <p style="font-size: 32px">Deseja mesmo excluir {{$compra->id}} ?</p>
    <button class="btn btn-danger" type="submit">Deletar</button>
</form>
<br>
<br>
<br>
<a href="/mostrar/compra/">Mostar Atendimentos</a>
@stop