@extends('layouts.templatecadastro')

@section('titulo')
CADASTRO DE ATENDIMENTOS
@stop

@section('script')

<script type="text/javascript">

        $('#valor_servico').change(function () {
            var idProduto = $('#produtos').val();
            var valor = idProduto.split(":");
            valor = valor[1];

            valor = valor * $('#quantidade').val();
            valor = valor + parseFloat($(this).val());

            $('#valor_total').val(valor);
            //$('#quantidade').val("4");
            /*
            $.get('/consulta/ajax/' + idProduto, function (cidades) {
                $('#preco_unitario').empty();
                $.each(cidades, function (value) {
                    $('#preco_unitario').append('<input id='preco_unitario' name='preco_unitario' placeholder='' class='form-control input-md' required='' type='number'>');
                });
            });
            */
        });
        

    </script>

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


  <label class="col-md-8 control-label" for="data_atendimento">Carro <h11>*</h11></label>
  <div class="col-md-8">
    <select required id="CBcarro" name="CBcarro" class="form-control">
    <option value="">Escolha uma placa</option>
    @foreach($carro as $c)
      <option value="{{$c->id}}">{{$c->placa}}</option>
    @endforeach
    </select>
  </div>

  <br>

  <label class="col-md-8 control-label" for="produtos">Produto <h11>*</h11></label>  
  <div class="col-md-8">
    <select required  id="produtos" name="produtos" class="form-control">
      <option value="">Escolha o produto</option>
      @foreach($produto as $p)
      <option value="{{$p->id}}:{{$p->preco_unitario}}" >{{$p->nome}}</option>
      @endforeach
    </select>
  </div>

</div>
      <!-- Text inputText inputText inputText inputText inputText inputText inputText inputText-->
  </div>
  <div class="col-md-6">
      <!-- Text inputText inputText inputText inputText inputText inputText inputText inputText-->
      <br>
      <br>


      <div class="form-grpup">

        <label class="col-md-8 control-label" for="descricao">Quantidade de produtos: <h11>*</h11></label>  
        <div class="col-md-8">
          <input id="quantidade" name="quantidade" placeholder="" class="form-control input-md" required="" type="number">
        </div>


      <br>

      <label class="col-md-8 control-label" for="valor_total">Valor Serviço <h11>*</h11></label>  
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

        <label class="col-md-8 control-label" for="valor_total">Valor Total <h11>*</h11></label>  
        <div class="col-md-8">
          <input id="valor_total" readonly="readonly" name="valor_total" placeholder="" class="form-control input-md" required="" type="float">
        </div>


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