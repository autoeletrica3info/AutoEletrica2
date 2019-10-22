@extends('layouts.templatecadastro')

@section('titulo')
ADIÇÃO DE PRODUTOS
@stop

@section('script')

<script type="text/javascript">
    $(document).ready(function() {
        $('#conjunto1').hide();
        $('#conjunto2').hide();
        $('#conjunto3').hide();
        $('#conjunto4').hide();
        $('#conjuntoSOMA').hide();


        $('#CBatendimento').change(function() {
           $('#conjunto1').show();
           $('#quantidade1').change(function() {
            
            var idProduto1 = $('#produtos1').val();
            var input1 = idProduto1.split(":");
            input1 = input1[1];

            var quantidade1 = $('#quantidade1').val();
            var soma;
            soma = parseFloat(input1) * parseFloat(quantidade1);
           $('#conjuntoSOMA').show();
           $('#valor_total').val(soma);
               
         });
        });
        
        $('#click').click(function() {
           $('#conjunto2').show();
           $('#quantidade2').change(function() {
            
            var idProduto1 = $('#produtos1').val();
            var input1 = idProduto1.split(":");
            input1 = input1[1];
            
            var idProduto2 = $('#produtos2').val();
            var input2 = idProduto2.split(":");
            input2 = input2[1];

            var quantidade1 = $('#quantidade1').val();
            var quantidade2 = $('#quantidade2').val();

            var soma;
            soma = (parseFloat(input1) * parseFloat(quantidade1)) + (parseFloat(input2) * parseFloat(quantidade2));
           $('#conjuntoSOMA').show();
           $('#valor_total').val(soma);
               
         });
        });

        $('#click2').click(function() {      
           $('#conjunto3').show();
           $('#quantidade3').change(function() {
            
            var idProduto1 = $('#produtos1').val();
            var input1 = idProduto1.split(":");
            input1 = input1[1];
            
            var idProduto2 = $('#produtos2').val();
            var input2 = idProduto2.split(":");
            input2 = input2[1];

            var idProduto3 = $('#produtos3').val();
            var input3 = idProduto3.split(":");
            input3 = input3[1];

            var quantidade1 = $('#quantidade1').val();
            var quantidade2 = $('#quantidade2').val();
            var quantidade3 = $('#quantidade3').val();

            var soma;
            soma = (parseFloat(input1) * parseFloat(quantidade1)) + (parseFloat(input2) * parseFloat(quantidade2))+
            (parseFloat(input3) * parseFloat(quantidade3));
           $('#conjuntoSOMA').show();
           $('#valor_total').val(soma);
               
         });  
        });

        $('#click3').click(function() {
            $('#conjunto4').show();
            $('#quantidade4').change(function() {
            
            var idProduto1 = $('#produtos1').val();
            var input1 = idProduto1.split(":");
            input1 = input1[1];
            
            var idProduto2 = $('#produtos2').val();
            var input2 = idProduto2.split(":");
            input2 = input2[1];

            var idProduto3 = $('#produtos3').val();
            var input3 = idProduto3.split(":");
            input3 = input3[1];

            var idProduto4 = $('#produtos4').val();
            var input4 = idProduto4.split(":");
            input4 = input4[1];

            var quantidade1 = $('#quantidade1').val();
            var quantidade2 = $('#quantidade2').val();
            var quantidade3 = $('#quantidade3').val();
            var quantidade4 = $('#quantidade4').val();

            var soma;
            soma = (parseFloat(input1) * parseFloat(quantidade1)) + (parseFloat(input2) * parseFloat(quantidade2))+
            (parseFloat(input3) * parseFloat(quantidade3)) + (parseFloat(input4) * parseFloat(quantidade4));
           $('#conjuntoSOMA').show();
           $('#valor_total').val(soma);
               
         });           
        });

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

  
 

  <br>


  <label class="col-md-8 control-label" for="data_atendimento">Atendimentos <h11>*</h11></label>
  <div class="col-md-8">
    <select required id="CBatendimento" name="CBatendimento" class="form-control">
    <option value="">Escolha um atendimento</option>
    @foreach($atendimento as $a)
      <option value="{{$a->id}}">{{$a->descricao}}</option>
    @endforeach
    </select>
  </div>

  <br>
  <br>
  <br>
  <br>

<div id="conjunto1">
  <label class="col-md-8 control-label" for="produtos">Produto <h11>*</h11></label>  
  <div class="col-md-8">
    <select required  id="produtos1" name="produtos" class="form-control">
      <option value="">Escolha o produto</option>
      @foreach($produto as $p)
      <option value="{{$p->id}}:{{$p->preco_unitario}}" >{{$p->nome}}</option>
      @endforeach
    </select>
  </div>
  <br>
  <label class="col-md-8 control-label" for="descricao">Quantidade de produtos: <h11>*</h11></label>  
    <div class="col-md-8">
    <input id="quantidade1" name="quantidade1" placeholder="" class="form-control input-md" required="" type="number">
    </div>
    <br>
    <img id="click" src="/image/editar.png" height="50" width="50">
</div>

<br>

<div id="conjunto2" >
  <label class="col-md-8 control-label" for="produtos">Produto <h11>*</h11></label>  
  <div class="col-md-8">
    <select required  id="produtos2" name="produtos" class="form-control">
      <option value="">Escolha o produto</option>
      @foreach($produto as $p)
      <option value="{{$p->id}}:{{$p->preco_unitario}}" >{{$p->nome}}</option>
      @endforeach
    </select>
  </div>
  <br>
  <label class="col-md-8 control-label" for="descricao">Quantidade de produtos: <h11>*</h11></label>  
    <div class="col-md-8">
    <input id="quantidade2" name="quantidade1" placeholder="" class="form-control input-md" required="" type="number">
    </div>
    <br>
    <img id="click2" src="/image/editar.png" height="50" width="50">
</div>



</div>
      <!-- Text inputText inputText inputText inputText inputText inputText inputText inputText-->
  </div>
  <div class="col-md-6">
      <!-- Text inputText inputText inputText inputText inputText inputText inputText inputText-->
      <br>
      <br>


      <div class="form-grpup">

      <br>

<div id="conjunto3">
  <label class="col-md-8 control-label" for="produtos">Produto <h11>*</h11></label>  
  <div class="col-md-8">
    <select required  id="produtos3" name="produtos" class="form-control">
      <option value="">Escolha o produto</option>
      @foreach($produto as $p)
      <option value="{{$p->id}}:{{$p->preco_unitario}}" >{{$p->nome}}</option>
      @endforeach
    </select>
  </div>
  <br>
  <label class="col-md-8 control-label" for="descricao">Quantidade de produtos: <h11>*</h11></label>  
    <div class="col-md-8">
    <input id="quantidade3" name="quantidade1" placeholder="" class="form-control input-md" required="" type="number">
    </div>
    <br>
    <img id="click3" src="/image/editar.png" height="50" width="50">
</div>

<br>

<div id="conjunto4">
  <label class="col-md-8 control-label" for="produtos">Produto <h11>*</h11></label>  
  <div class="col-md-8">
    <select required  id="produtos4" name="produtos" class="form-control">
      <option value="">Escolha o produto</option>
      @foreach($produto as $p)
      <option value="{{$p->id}}:{{$p->preco_unitario}}" >{{$p->nome}}</option>
      @endforeach
    </select>
  </div>
  <br>
  <label class="col-md-8 control-label" for="descricao">Quantidade de produtos: <h11>*</h11></label>  
    <div class="col-md-8">
    <input id="quantidade4" name="quantidade1" placeholder="" class="form-control input-md" required="" type="number">
    </div>
    <br>
    <img id="click3" src="/image/editar.png" height="50" width="50">
</div>


      <br>

      <!--<label class="col-md-8 control-label" for="valor_total">Valor Serviço <h11>*</h11></label>  
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
-->
        


      <br>
    <div id="conjuntoSOMA">
        <label class="col-md-8 control-label" for="valor_total">Valor Total <h11>*</h11></label>  
        <div class="col-md-8">
            <input id="valor_total" readonly="readonly" name="valor_total" placeholder="" class="form-control input-md" required="" type="float">
        </div>
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