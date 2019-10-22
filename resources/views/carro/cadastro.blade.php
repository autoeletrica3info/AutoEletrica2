@extends('layouts.templatecadastro')

@section('titulo')
CADASTRO DE CARROS
@stop

@section('form')
<form class="form-horizontal" method="POST" action="/cadastro/carro">
    {{csrf_field() }}
    <fieldset>



    <div class="container-fluid">
  <div class="row">
    <div class="col-md-6">
    <div class="form-group">
    <!-- aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa -->


    <div class="col-md-12 control-label">
          <p class="help-block"><h11>*</h11> Campo Obrigatório </p>
    </div>
    
    <br>

    <label class="col-md-12 control-label" style="font-size:27px" for="Proprietario">Proprietário <h11>*</h11></label>  
    <div class="col-md-8">
    <input id="proprietario" name="proprietario" placeholder="" class="form-control input-md" required="" type="text">
    </div>
    
   <br>
   
    <label class="col-md-12 control-label" for="Placa">Placa <h11>*</h11></label>  
    <div class="col-md-8">
    <input id="placa" name="placa" placeholder="ABC1234" class="form-control input-md" required="" type="text">
    </div>

    <!-- aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa -->
    </div> <!-- form-group -->
    </div> <!-- col-md-6 -->
    <div class="col-md-6">
    <div class="form-group">
    <!-- aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa -->
  <br>
  <br>
  
  <label class="col-md-12 control-label" for="Marca">Marca <h11>*</h11></label>  
    <div class="col-md-8">
    <input id="marca" name="marca" placeholder="" class="form-control input-md" required="" type="text">
    </div>
   
    <br>
   
    <label class="col-md-12 control-label"  for="Modelo">Modelo <h11>*</h11></label>  
    <div class="col-md-8">
    <input id="modelo" name="modelo" placeholder="" class="form-control input-md" required="" type="text">
    </div>
   


    <!-- aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa -->
    </div> <!-- form-group -->
    </div> <!-- col-md-6 -->
  </div> <!-- row -->
  <div class="row">
  <div class="col-md-12">
  <!-- aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa -->

  <label class="col-md-12 control-label" for="Cadastrar"></label>
  <div class="col-md-8">
    <button id="Cadastrar" name="Cadastrar" class="btn btn-success" type="Submit">Cadastrar</button>
    <button id="Cancelar" name="Cancelar" class="btn btn-danger" type="Reset">Cancelar</button>
  </div>

  <!-- aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa -->
  </div>
  </div>
</div> <!-- container -->

    

</fieldset>
</form>
@stop