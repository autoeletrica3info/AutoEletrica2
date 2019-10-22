@extends('layouts.templatecadastro')

@section('titulo')
EDIÇÃO DE CARROS
@stop

@section('form')

<form class="form-horizontal" method="POST" action="/carro/{{$carro->id}}">
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
    <label style="font-size:27px" for="Proprietario">Proprietário <h11>*</h11></label>  
    <div class="col-md-8">
    <input id="proprietario" name="proprietario" value="{{$carro->proprietario}}" placeholder="" class="form-control input-md" required="" type="text">
    </div>
    </div>
    <div class="form-group">
    <label style="font-size:27px" for="Placa">Placa <h11>*</h11></label>  
    <div class="col-md-2">
    <input id="placa" name="placa" value="{{$carro->placa}}" class="form-control input-md" required="" type="text">
    </div>
    </div>
    <!--
              $table->string('placa');
              $table->string('proprietario');
              $table->string('marca');
              $table->string('modelo');
              -->
    <!-- Prepended text-->


    <!-- Prepended text-->
    <div class="form-group">
    <label style="font-size:27px" for="Marca">Marca <h11>*</h11></label>  
    <div class="col-md-2">
    <input id="marca" name="marca" value="{{$carro->marca}}" class="form-control input-md" required="" type="text">
    </div>
    </div>
    <div class="form-group">
    <label style="font-size:27px" for="Modelo">Modelo <h11>*</h11></label>  
    <div class="col-md-2">
    <input id="modelo" name="modelo" value="{{$carro->modelo}}" class="form-control input-md" required="" type="text">
    </div>
    </div>




    <!-- Select Basic -->  
    </div>


    <!-- Button (Double) -->
    <div class="form-group">
    <label  for="Cadastrar"></label>
    <div class="col-md-8">
      <button id="Cadastrar" name="Cadastrar" class="btn btn-success" type="Submit">Cadastrar</button>
      <button id="Cancelar" name="Cancelar" class="btn btn-danger" type="Reset">Cancelar</button>
    </div>
    </div>

    </div>
    </div>


</fieldset>
</form>
@stop
