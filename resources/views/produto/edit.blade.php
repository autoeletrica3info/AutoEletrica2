

@extends('layouts.templatecadastro')

@section('titulo')
CADASTRO DE PRODUTOS
@stop



@section('form')
<form class="form-horizontal" method="POST" action="/produto/{{$produto->id}}">
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
  <input id="nome" name="nome" value="{{$produto->nome}}" placeholder="" class="form-control input-md" required="" type="text">
  </div>

  <br>

  <label class="col-md-12 control-label" for="Marca">Marca <h11>*</h11></label>  
  <div class="col-md-8">
  <input id="marca" name="marca" value="{{$produto->marca}}" placeholder="" class="form-control input-md" required="" type="text">
  </div>

  <br>

  <label class="col-md-12 control-label" for="Categoria">Categoria <h11>*</h11></label>  
  <div class="col-md-8">
  <input id="categoria" name="categoria" value="{{$produto->categoria}}" placeholder="" class="form-control input-md" required="" type="text">
  </div>

    <!-- aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa -->
    </div> <!-- form-group -->
    </div> <!-- col-md-6 -->
    <div class="col-md-6">
    <div class="form-group">
    <!-- aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa -->

  <br>

  <br>
  
  <label class="col-md-12 control-label" for="Preco_c">Preço Custo <h11>*</h11></label>  
  <div class="col-md-8">
  <input type="float" value="{{$produto->preco_custo}}" class="form-control input-md" required="required" maxlength="15" name="preco_custo">
  </div>

  <br>

  <label class="col-md-12 control-label" for="Preco">Preço <h11>*</h11></label>  
  <div class="col-md-8">
  <input type="float" value="{{$produto->preco_unitario}}" class="form-control input-md" required="required" maxlength="15" name="preco_unitario">
  </div>

  <br>
    
  <label class="col-md-12 control-label" for="selectbasic">Fornecedor <h11>*</h11></label>
  <div class="col-md-8">
    <select required id="fornecedor_id" name="fornecedor_id" class="form-control">
    <option value=""></option>
    @foreach($fornecedor as $forn)
      <option value="{{$forn->id}}">{{$forn->nome_fornecedor}}</option>
    @endforeach
    </select>
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