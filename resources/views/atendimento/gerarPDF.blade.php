<!DOCTYPE HTML>
<html>
<head><title>Relatório</title>
<style>
table.greyGridTable {
  border: 2px solid #FFFFFF;
  width: 100%;
  text-align: center;
  border-collapse: collapse;
}
table.greyGridTable td, table.greyGridTable th {
  border: 1px solid #FFFFFF;
  padding: 3px 4px;
}
table.greyGridTable tbody td {
  font-size: 13px;
}
table.greyGridTable td:nth-child(even) {
  background: #EBEBEB;
}
table.greyGridTable thead {
  background: #FFFFFF;
  border-bottom: 2px solid #333333;
}
table.greyGridTable thead th {
  font-size: 15px;
  font-weight: bold;
  color: #333333;
  text-align: center;
  border-left: 2px solid #333333;
}
table.greyGridTable thead th:first-child {
  border-left: none;
}

table.greyGridTable tfoot {
  font-size: 14px;
  font-weight: bold;
  color: #333333;
  border-top: 4px solid #333333;
}
table.greyGridTable tfoot td {
  font-size: 14px;
}
</style>
</head>
<body>
<h1>Auto Elétrica Boa Vista</h1>

<!--<table class="table">
  <thead>
    <tr>
      <th style="font-size:30px" scope="col">#</th>
      <th style="font-size:30px" scope="col">Descricao</th>
      <th style="font-size:30px" scope="col">Valor Serviço</th>
      <th style="font-size:30px" scope="col">Placa do Carro</th>
      <th style="font-size:30px" scope="col">Situação</th>
      <th style="font-size:30px" scope="col">Pagamento</th>
      
      
    </tr>
  </thead>
  <tbody>
  @foreach ($result as $row)
  
    <tr>
      <th style="font-size:30px" scope="row">{{$row->id}}</th>
      <td style="font-size:30px">{{$row->descricao}}</td>
      <td style="font-size:30px">R$ {{$row->valor_servico}}</td>
      <td style="font-size:30px">{{$row->placa}}</td>
      <td style="font-size:30px">@if ($row->situacao == 1) Solucionado 
                                 @elseif ($row->situacao == 2) Em andamento
                                 @elseif ($row->situacao == 3) Em espera @endif</td>
      <td style="font-size:30px"> @if($row->pagamento == 1) Não Pago 
                                  @elseif ($row ->pagamento == 2) Pago @endif</td>
      
     
    </tr>
  @endforeach
  <a href="/atendimento/pdf">GERAR PDF</a>
  
  </tbody>
</table>-->


  <table style="widht: 100%" class="greyGridTable">
  <thead>
<tr>
<th>#</</th>
<th>Relatório de Atendimento</th>
<th></th>
<th></th>
<th></th>
<th>Data de Impressão:</th>
<th>{{$date}}</th>
</tr>
</thead>
<thead>
<tr>
<th>#</</th>
<th>#</th>
<th>#</th>
<th>#</th>
<th>#</th>
<th>#</th>
<th>#</th>
</tr>
</thead>
<thead>
<tr>
<th>#</</th>
<th>Descricao</th>
<th>Valor do Serviço</th>
<th>Valor Pago</th>
<th>Placa do Carro</th>
<th>Situação</th>
<th>Pagamento</th>
</tr>
</thead>
<tbody>
@foreach ($result as $row)
<tr>
<th  scope="row">{{$row->id}}</th>
      <td >{{$row->descricao}}</td>
      <td >R$ {{$row->valor_servico}}</td>
      <td >R$ {{$row->valor_total}}</td>
      <td >{{$row->placa}}</td>
      <td >@if ($row->situacao == 1) Solucionado 
                                 @elseif ($row->situacao == 2) Em andamento
                                 @elseif ($row->situacao == 3) Em espera @endif</td>
      <td> @if($row->pagamento == 1) Não Pago 
                                  @elseif ($row ->pagamento == 2) Pago @endif</td>
</tr>
@endforeach 
</tbody>

</table>


</body>
