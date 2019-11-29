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




  <table style="widht: 100%" class="greyGridTable">
  <thead>
<tr>
<th>#</</th>
<th>Relatório de Carros</th>
<th>#</th>
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
</tr>
</thead>
<thead>
<tr>
<th>#</</th>
<th>Proprietário</th>
<th>Placa</th>
<th>Marca</th>
<th>Modelo</th>
</tr>
</thead>
<tbody>
@foreach ($carro as $car)
    <tr>
      <th scope="row">{{$car->id}}</th>
      <td>{{$car->proprietario}}</td>
      <td>{{$car->placa}}</td>
      <td>{{$car->marca}}</td>
      <td>{{$car->modelo}}</td>
    </tr>
  @endforeach
</tbody>

</table>


</body>
