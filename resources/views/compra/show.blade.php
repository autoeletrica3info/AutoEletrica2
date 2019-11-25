@extends('layouts.templateshow')


@section('href')

  <a style="font-size:22px;" href="/mostrar/compra/">VOLTAR</a>
@stop

@section('conteudo')


<h1>Compra  {{$compra->id}}</h1>

<hr>
<br>

<h3><b>Valor Total: </b>R$ <input readonly="true" class="servico" value="{{$compra->valor_total}}"/></h3>
<h3><b>Data da Compra: </b>{{$compra->dt_compra}}</h3>
<h3><b>Criada em: </b>{{$compra->created_at}}</h3>
<h3><b>Atualizada em:   </b>{{$compra->updated_at}}</h3>
<br>
<br>
<h1>PRODUTOS<h1>
<table class="table">
  <thead>
    <tr>
      <th style="font-size:30px" scope="col">ID Produto</th>
      <th style="font-size:30px" scope="col">ID Compra</th>
      <th style="font-size:30px" scope="col">Quantidade</th>
      <th style="font-size:30px" scope="col">Valor Unitário</th>
      <th style="font-size:30px" scope="col">Valor Final</th>
      <th style="font-size:30px" scope="col">Editar</th>
      <th style="font-size:30px" scope="col">Excluir</th>
      
    </tr>
  </thead>
  <tbody>
  @foreach ($result as $row)
  
    <tr>
      <th style="font-size:30px" scope="row">{{$row->produto_id}}</th>
      <th style="font-size:30px" scope="row">{{$row->compra_id}}</th>
      <td style="font-size:30px">{{$row->quantidade}}</td>
      <td style="font-size:30px">{{$row->preco_unitario}}</td>
      <td style="font-size:30px" class="valor_calculado">{{$row->valor_total}}</td>
      <td style="font-size:30px"><a href="/editar/compra/produto/{{$row->produto_id}}/{{$row->compra_id}}"><img src="/image/editar.png" height="20" width="20"></a></td>
      <td style="font-size:30px"><a href="/excluir/compra/produto/{{$row->produto_id}}/{{$row->compra_id}}"><img src="/image/excluir.png"  height="20" width="20"></a></td>
    </tr>
  @endforeach
  
  </tbody>
</table>
<br>
<br>

<form class="form-horizontal" method="POST" action="/pagar/compra/{{$compra->id}}">
{{csrf_field() }}
{{ method_field('PUT') }}
<fieldset>
<div class="panel panel-primary">
<a onclick="funcao1()" style="font-size:15px" class="soma" >SOMAR</a>

<label class="col-md-8 control-label" for="valor_total">Valor Total <h11>*</h11></label>  
      <div class="col-md-2">
        <input id="valor_tot" readonly="true" name="valor_tot" placeholder="" class="form-control input-md" required="" type="float">
      </div>
      <div class="form-group">
  <label class="col-md-2 control-label" for=""></label>   
  <div class="col-md-8">
  <div class="form-group">
    <button id="Cadastrar" name="Cadastrar" class="btn btn-success" type="Submit">Pagar</button>
    <button id="Cancelar" name="Cancelar" class="btn btn-danger" type="Reset">Cancelar</button>
</div>
  </div>
</div>





</fieldset>
</form>
<script>
function funcao1()
{


var valorCalculado = 0;
var final = 0;
var servico = $('.servico').val();
$( ".valor_calculado" ).each(function() {
  valorCalculado += parseInt($( this ).text());
  final = parseFloat(valorCalculado) + parseFloat(servico);
});
if(valorCalculado == 0.00){
  $('#valor_tot').val(parseFloat(servico));
} 
else{
  $('#valor_tot').val(final);
}

//alert(servico);
//alert(valorCalculado);

 
}
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
@stop