@extends('layouts.templatelist')

@section('titulo')
  CARROS
@stop

@section('conteudo')
<a class="btn btn-dark" href="/cadastro/carro/">CADASTRAR</a>
<a class="btn btn-success" href="/carro/pdf">GERAR PDF</a>
<br>
<br>
<table class="table">
  <thead>
    <tr>
      <th style="font-size:30px" scope="col">#</th>
      <th style="font-size:30px" scope="col">Proprietário</th>
      <th style="font-size:30px" scope="col">Placa</th>
      <th style="font-size:30px" scope="col">Marca</th>
      <th style="font-size:30px" scope="col">Modelo</th>
      <th style="font-size:30px" scope="col">Editar</th>
      <th style="font-size:30px" scope="col">Excluir</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($carro as $car)
    <tr>
      <th style="font-size:30px" scope="row"><a style="text-decoration: none" href="/mostrar/carro/{{$car->id}}">{{$car->id}}</a></th>
      <td style="font-size:30px">{{$car->proprietario}}</td>
      <td style="font-size:30px">{{$car->placa}}</td>
      <td style="font-size:30px">{{$car->marca}}</td>
      <td style="font-size:30px">{{$car->modelo}}</td>
      <td style="font-size:30px"><a href="/editar/carro/{{$car->id}}"><img src="/image/editar.png" height="20" width="20"></a></td>
      <td style="font-size:30px"><a href="/excluir/carro/{{$car->id}}"><img src="/image/excluir.png"  height="20" width="20"></a></td>
    </tr>
  @endforeach
  
  </tbody>

</table>
@stop

<script>
  var msg = '{{Session::get('success')}}';
  var exist = '{{Session::has('success')}}';
  if(exist){
    alert(msg);
  }
</script>