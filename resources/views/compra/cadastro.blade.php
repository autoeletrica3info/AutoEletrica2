

@extends('layouts.templatecadastro')

@section('titulo')
CADASTRO DE COMPRAS
@stop

@section('script')


<!--<script type="text/javascript">
    $('#produto').change(function() {
      var idProduto = $(this).val();

      $.get('/consulta/ajax' + idProduto, function(produtos) {
        $('#preco_unitario').empty();
        $.each(preco_unitario, function(key, value){
          $('#preco_unitario').append('<option value=' + value.id + '>' + value.nome + '</optin>');
        });
      }));
    });

  </script>-->

  <script type="text/javascript">

$('#quantidade').change(function () {
    var idProduto = $('#produtos').val();
    var valor = idProduto.split(":");
    valor = valor[1];

    valor = valor * $('#quantidade').val();

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
<form class="form-horizontal" method="POST" action="/cadastro/compra">
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

  <label class="col-md-8 control-label" for="descricao">Quantidade do produto: <h11>*</h11></label>  
  <div class="col-md-8">
    <input id="quantidade" name="quantidade" placeholder="" class="form-control input-md" required="" type="number">
  </div>

  <br>



      <!-- Text inputText inputText inputText inputText inputText inputText inputText inputText-->
  </div>
  <div class="col-md-6">
      <!-- Text inputText inputText inputText inputText inputText inputText inputText inputText-->
      <br>
      <br>


      <div class="form-grpup">

        

        <label class="col-md-8 control-label" for="valor_total">Valor Total <h11>*</h11></label>  
        <div class="col-md-8">
          <input id="valor_total" readonly="readonly" name="valor_total" placeholder="" class="form-control input-md" required="" type="float">
        </div>

        <br>

        <label class="col-md-8 control-label" for="data">Data <h11>*</h11></label>  
    <div class="col-md-8">
      <input id="data" name="data" placeholder="" class="form-control input-md" required="" type="date">
    </div>
        
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