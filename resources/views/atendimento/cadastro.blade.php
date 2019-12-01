@extends('layouts.templatecadastro')

@section('titulo')
CADASTRO DE ATENDIMENTOS
<br>  
<a class="btn btn-dark" href="/cadastro/atendimento/produto/">ADICIONAR PRODUTO</a>
@stop

@section('script')


@stop
@section('form')
<form class="form-horizontal" method="POST" action="/cadastro/atendimento">
{{csrf_field() }}
<fieldset>
<div class="panel panel-primary">
    
    

<!-- Text input-->
<div class="row">
  <div class="col-md-6">
  <!-- Text inputText inputText inputText inputText inputText inputText inputText inputText-->


    <div class="form-group">
      <div class="col-md-11 control-label">
        <p class="help-block"><h11>*</h11> Campo Obrigatório </p>
      </div>
    </div>

    <br>
    
    <div class="form-group">

  <label class="col-md-8 control-label" for="descricao">Descricao <h11>*</h11></label>  
    <div class="col-md-8">
      <input id="descricao" name="descricao" placeholder="" class="form-control input-md" required="" type="text">
    </div>

  <br>


    <label class="col-md-8 control-label" for="data_atendimento">Data <h11>*</h11></label>  
    <div class="col-md-8">
      <input id="data_atendimento" name="data_atendimento" placeholder="" class="form-control input-md" required="" type="date">
    </div>
 

  <br>


  <label class="col-md-8 control-label" for="CBcarro">Carro <h11>*</h11></label>
  <div class="col-md-8">
    <select required id="CBcarro" name="CBcarro" class="form-control">
    <option value="">Escolha uma placa</option>
    @foreach($carro as $c)
      <option value="{{$c->id}}">{{$c->placa}}</option>
    @endforeach
    </select>
  </div>

  <br>


</div>
      <!-- Text inputText inputText inputText inputText inputText inputText inputText inputText-->
  </div>
  <div class="col-md-6">
      <!-- Text inputText inputText inputText inputText inputText inputText inputText inputText-->
      <br>
      <br>


      <div class="form-grpup">


      <label class="col-md-8 control-label" for="valor_servico">Valor Serviço <h11>*</h11></label>  
      <div class="col-md-8">
        <input id="valor_servico" name="valor_servico" placeholder="" class="form-control input-md" required="" type="float">
      </div>
      
      <br>

      <label class="col-md-2 control-label">Situação <h11>*</h11></label>
        <div class="col-md-8">
          <select required id="situacao" name="situacao" class="form-control">
            <option value="">Escolha Situação</option>
            <option value="1">Solucionado</option>
            <option value="2">Em andamento</option>
            <option value="3">Em espera</option>
          </select>
        </div>


      <br>

        

      <br>


    </div>

      <!-- Text inputText inputText inputText inputText inputText inputText inputText inputText-->
  </div>
</div>










<div class="form-group">
  <label class="col-md-2 control-label" for=""></label>  
  <div class="col-md-8">
  <div class="form-group">
    <button id="Cadastrar" name="Cadastrar" class="btn btn-success" type="Submit">Cadastrar</button>
    <button id="Cancelar" name="Cancelar" class="btn btn-danger" type="Reset">Cancelar</button>
</div>
  </div>
</div>





</fieldset>
</form>
@stop