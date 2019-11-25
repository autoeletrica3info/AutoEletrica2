

@extends('layouts.templatecadastro')

@section('titulo')
CADASTRO DE COMPRAS <br>
<a style="font-size:22px;" href="/cadastro/compra/produto/">ADICIONAR PRODUTO</a>
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
    
    <label class="col-md-12 control-label" for="Descricao">Descrição <h11>*</h11></label>  
    <div class="col-md-8">
    <input id="descricao" name="descricao" placeholder="" class="form-control input-md" required="" type="text">
    </div>
    


      <!-- Text inputText inputText inputText inputText inputText inputText inputText inputText-->
  </div>
  <div class="col-md-6">
      <!-- Text inputText inputText inputText inputText inputText inputText inputText inputText-->
      <br>
      <br>


      <div class="form-grpup">

        


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