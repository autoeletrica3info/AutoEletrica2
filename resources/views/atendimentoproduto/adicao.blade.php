@extends('layouts.templatecadastro')

@section('titulo')
ADIÇÃO DE PRODUTOS
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
<form class="form-horizontal" method="POST" action="/cadastro/atendimento/produto">
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

    <label class="col-md-8 control-label" for="produtos">Atendimentos <h11>*</h11></label>  
  <div class="col-md-8">
    <select required  id="atendimento" name="atendimento" class="form-control">
      <option value="">Escolha o atendimento</option>
      @foreach($atendimento as $a)
      <option value="{{$a->id}}" >{{$a->descricao}}</option>
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
  <br>
  <label class="col-md-8 control-label" for="descricao">Quantidade de produtos: <h11>*</h11></label>  
        <div class="col-md-8">
          <input id="quantidade" name="quantidade" placeholder="" class="form-control input-md" required="" type="number">
        </div>

</div>
      <!-- Text inputText inputText inputText inputText inputText inputText inputText inputText-->
  </div>
  
</div>










<div class="form-group">
  <label class="col-md-2 control-label" for=""></label>  
  <div class="col-md-8">
  <div class="form-group">
    <button id="Cadastrar" name="Cadastrar" class="btn btn-success" type="Submit">Adicionar</button>
    <button id="Cancelar" name="Cancelar" class="btn btn-danger" type="Reset">Cancelar</button>
</div>
  </div>
</div>





</fieldset>
</form>
@stop