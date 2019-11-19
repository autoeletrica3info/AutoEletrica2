@extends('layouts.templatecadastro')

@section('titulo')
Formulário de Exclusão de Mensagens
@stop

@section('form')
<hr>
<form action="/carro/{{$carro->id}}" method="post">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
    <p style="font-size: 32px">Deseja mesmo excluir {{$carro->placa}} ?</p>
    <button class="btn btn-danger" type="submit">Deleter</button>
</form>
<br>
<br>
<br>
<a href="/mostrar/atividades/">Mostar Mensagem</a>
@stop