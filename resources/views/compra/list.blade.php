@extends('layouts.templatelist')

@section('titulo')
  COMPRAS
@stop


@section('conteudo')
<a class="btn btn-dark" href="/cadastro/compra/">CADASTRAR</a>
<button onclick="show()" class="btn btn-success" >GERAR PDF</button>
<br>
<br>
<table class="table">
  <thead>
    <tr>
      <th style="font-size:30px" scope="col">#</th>
      <th style="font-size:30px" scope="col">Descricao</th>
      <th style="font-size:30px" scope="col">Data da Compra</th>
      <th style="font-size:30px" scope="col">Valor Total</th>
      <th style="font-size:30px" scope="col">Pagamento</th>
      <th style="font-size:30px" scope="col">Editar</th>
      <th style="font-size:30px" scope="col">Excluir</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($compra as $comp)
    <tr>
      <th style="font-size:30px"><a style="text-decoration: none" href="/mostrar/compra/{{$comp->id}}">{{$comp->id}}</a></th>
      <td style="font-size:30px">{{$comp->descricao}}</td>
      <td style="font-size:30px">{{$comp->dt_compra}}</td>
      <td style="font-size:30px">{{$comp->valor_total}}</td>
      <td style="font-size:30px"> @if($comp->pagamento == 1) Não Pago 
                                  @elseif ($comp->pagamento == 2) Pago @endif</td>
      <td style="font-size:30px"><a href="/editar/compra/{{$comp->id}}"><img src="/image/editar.png" height="20" width="20"></a></td>
      <td style="font-size:30px"><a href="/verificar/compra/{{$comp->id}}"><img src="/image/excluir.png"  height="20" width="20"></a></td>
    </tr>
  @endforeach
  
  </tbody>

</table>

<div id="divA" style="display:none; background-color: white; position: absolute; width: 38%; left:28%; top: 5%; border: 8px solid #1C6EA4;
border-radius: 3px 25px 3px 23px; padding: 14px">
<form class="form-horizontal" method="POST" action="/compra/pdf">
{{csrf_field() }}
<fieldset>
<div class="panel panel-primary">
    

<!-- Text input-->
<div class="row">
  <div class="col-md-6">    
    <div class="form-group">

        <div class="col-md-12">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
          <select required id="opcao" name="opcao" class="form-control">
          <option value="">Você deseja um relatório:</option>
            <option value="1">Completo</option>
            <option value="2">Personalizado</option>
          </select>
        </div>
 

    </div>
  </div>
  <div class="col-md-6">
  <div class="form-group">
      <div id="personalizado">
          <label class="col-md-8 control-label" for="dataStart">Data Inicial <h11>*</h11></label>  
          <div class="col-md-8">
            <input id="dateStart" name="dateStart" class="form-control input-md" disabled required="" type="date">
          </div>
          <br>
          <label class="col-md-8 control-label" for="dataEnd">Data Final <h11>*</h11></label>  
          <div class="col-md-8">
            <input id="dateEnd" name="dateEnd" class="form-control input-md" disabled type="date">
          </div>
        </div>
      </div>
  </div>
</div>



<div class="form-group">
  <label class="col-md-2 control-label" for=""></label>  
  <div class="col-md-8">
  <div class="form-group">
    <button id="Cadastrar" name="Cadastrar" class="btn btn-success" type="Submit">Gerar PDF</button>
    <button id="Cancelar" name="Cancelar" class="btn btn-danger" onClick="hide('divA')" type="Reset">Fechar</button>
</div>
  </div>
</div>


</fieldset>
</form>
              
            </div>

  <script type='text/javascript'>
  var msg = '{{Session::get('success')}}';
  var exist = '{{Session::has('success')}}';
  if(exist){
    alert(msg);
  }
  
  $(document).ready(function() {
  $('#personalizado').hide();
  $('#opcao').change(function() {
    if ($('#opcao').val() == 2) {
      $('#personalizado').show();
      $('#dateEnd').prop("disabled", false);
      $('#dateStart').prop("disabled", false);
  $('#dateEnd').style.disable("false");
    } else {
      $('#personalizado').hide();
      $('#dateEnd').prop("disabled", true);
      $('#dateStart').prop("disabled", true);
    }
  });
});

    function show() {
      divA.style.display='inline-block';
    }

    function hide(obj) {
        var el = document.getElementById(obj);
        el.style.display = 'none';
    }

  

  </script>
@stop