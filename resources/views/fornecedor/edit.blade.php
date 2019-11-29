

@extends('layouts.templatecadastro')

@section('titulo')
EDIÇÃO DE FORNECEDORES
@stop

@section('form')
<form class="form-horizontal" method="POST" action="/fornecedor/{{$fornecedor->id}}">
{{csrf_field() }}
{{ method_field('PUT') }}
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

  <label class="col-md-12 control-label" for="Nome">Nome <h11>*</h11></label>  
  <div class="col-md-8">
  <input value="{{$fornecedor->nome_fornecedor}}" id="nome" name="nome" placeholder="" class="form-control input-md" required="" type="text">
  </div>

  <br>

  <label class="col-md-12 control-label" for="prependedtext">Telefone <h11>*</h11></label>
  <div class="col-md-8">
    <input value="{{$fornecedor->telefone}}" id="prependedtext" name="prependedtext" class="form-control" placeholder="XX XXXXX-XXXX" required="" type="text" maxlength="13" pattern="\[0-9]{2}\ [0-9]{4,6}-[0-9]{3,4}$"
    OnKeyPress="formatar('## #####-####', this)">
  </div>

  <br>

  <label class="col-md-12 control-label" for="prependedtext">Email </label>
  <div class="col-md-8">
      <input id="email" value="{{$fornecedor->email}}" name="email" class="form-control" placeholder="email@email.com" required="" type="text" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" >
  </div>


    <!-- aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa -->
    </div> <!-- form-group -->
    </div> <!-- col-md-6 -->
    <div class="col-md-6">
    <div class="form-group">
    <!-- aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa -->
  <br>
  <br>
 
  <label class="col-md-12 control-label" for="prependedtext">Endereço </label>
  <div class="col-md-8">
    <input id="endereço" value="{{$fornecedor->endereco}}" name="endereço" class="form-control" placeholder="" required="" type="text">
  </div>

  <br>

  <label class="col-md-12 control-label" for="prependedtext">País </label>
  <div class="col-md-8">
    <input id="pais" value="{{$fornecedor->pais}}" name="pais" class="form-control" placeholder="" required="" type="text">
  </div>

  <br>

  <label class="col-md-12 control-label" for="prependedtext">Cidade </label>
  <div class="col-md-8">
    <input id="cidade" value="{{$fornecedor->cidade}}" name="cidade" class="form-control" placeholder="" required=""   type="text">
  </div>
    
  <br>
    
    <label class="col-md-12 control-label" for="prependedtext">Estado </label>
   <div class="col-md-8">
      <input id="uf" name="uf" value="{{$fornecedor->uf}}" class="form-control" placeholder="" required=""   type="text">   
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
    <button id="Cadastrar" name="Atualizar" class="btn btn-success" type="Submit">Atualizar</button>
    <button id="Cancelar" name="Cancelar" class="btn btn-danger" type="Reset">Cancelar</button>
  </div>

  <!-- aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa -->
  </div>
  </div>
</div> <!-- container -->

</fieldset>
</form>
@stop