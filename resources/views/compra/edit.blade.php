

@extends('layouts.templatecadastro')

@section('titulo')
EDIÇÃO DE COMPRAS
@stop

@section('form')
<form class="form-horizontal" method="POST" action="/compra/{{$compra->id}}">
{{csrf_field() }}
{{ method_field('PUT') }}
<fieldset>
<div class="panel panel-primary">
   
<div class="form-group">
<!--
<div class="form-group">   
<div class="col-md-4 control-label">
    <img id="logo" src="http://blogdoporao.com.br/wp-content/uploads/2016/12/Faculdade-pitagoras.png"/>
</div>
<div class="col-md-4 control-label">
    <h1>Cadastro de Cliente</h1>
    
</div>
</div>
    -->
<div class="col-md-11 control-label">
        <p class="help-block"><h11>*</h11> Campo Obrigatório </p>
</div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-2 control-label" for="Nome">Valor Total <h11>*</h11></label>  
  <div class="col-md-8">
  <input type="tel" value="{{$compra->valor_total}}" required="required" maxlength="15" name="valor_total" pattern="([0-9]{1,3}\.)?[0-9]{1,3},[0-9]{2}$">
  </div>
</div>

<!-- Prepended text-->
<div class="form-group">
  <label class="col-md-2 control-label" for="Nome">Data <h11>*</h11></label>  
  <div class="col-md-8">
  <input id="data" value="{{$compra->dt_compra}}" name="data" placeholder="" class="form-control input-md" required="" type="date">
  </div>
</div>


<!-- Select Basic -->  
  </div>
 
 
<!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-2 control-label" for="Cadastrar"></label>
  <div class="col-md-8">
    <button id="Cadastrar" name="Cadastrar" class="btn btn-success" type="Submit">Atualizar</button>
    <button id="Cancelar" name="Cancelar" class="btn btn-danger" type="Reset">Cancelar</button>
  </div>
</div>

</div>
</div>


</fieldset>
</form>
@stop