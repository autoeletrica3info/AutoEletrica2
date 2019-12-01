@extends('layouts.templateshow')


@section('href')

  <a class="btn btn-dark" href="/mostrar/carro/">VOLTAR</a>
@stop

@section('conteudo')

<h1>Compra  {{$carro->id}}</h1>

<hr>
<br>

<h3><b>Proprietário: </b>{{$carro->proprietario}}</h3>
<h3><b>Placa: </b>{{$carro->placa}}</h3>
<h3><b>Marca: </b>{{$carro->marca}}</h3>
<h3><b>Modelo: </b>{{$carro->modelo}}</h3>
<h3><b>Criada em: </b>{{$carro->created_at}}</h3>
<h3><b>Atualizada em:   </b>{{$carro->updated_at}}</h3>


@stop
<script>
  var msg = '{{Session::get('success')}}';
  var exist = '{{Session::has('success')}}';
  if(exist){
    alert(msg);
  }
</script>