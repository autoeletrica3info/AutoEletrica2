@extends('layouts.templatecadastro')

@section('titulo')
Formulário de Exclusão de Carros
@stop

@section('form')
<hr>
<form action="/carro/{{$carro->id}}" method="post">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
    <p style="font-size: 32px">Deseja mesmo excluir {{$carro->placa}} ?</p>
    <button class="btn btn-danger" type="submit">Deletar</button>
</form>
<br>
<br>
<br>
<a href="/mostrar/carro/">Mostar Carros</a>
@stop