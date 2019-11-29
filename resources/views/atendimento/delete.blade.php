@extends('layouts.templatecadastro')

@section('titulo')
Formulário de Exclusão de Atendimentos
@stop

@section('form')
<hr>
<form action="/atendimento/{{$atendimento->id}}" method="post">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
    <p style="font-size: 32px">Deseja mesmo excluir {{$atendimento->id}} ?</p>
    <button class="btn btn-danger" type="submit">Deletar</button>
</form>
<br>
<br>
<br>
<a href="/mostrar/atendimento/">Mostar Atendimentos</a>
@stop