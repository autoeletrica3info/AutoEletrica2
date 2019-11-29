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
<th>Relatório de Fornecedores</th>
<th></th>
<th></th>
<th></th>
<th></th>
<th>Data de Impressão:</th>
<th>{{$date}}</th>
</tr>
</thead>
<thead>
<tr>
<th>#</th>
<th>#</th>
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
<th>Fornecedor</th>
<th>Email</th>
<th>Telefone</th>
<th>Endereço</th>
<th>País</th>
<th>Estado</th>
<th>Cidade</th>
</tr>
</thead>
<tbody>
@foreach ($fornecedor as $forn)
<tr>
<th scope="row">{{$forn->id}}</th>
      <td>{{$forn->nome_fornecedor}}</td>
      <td>{{$forn->email}}</td>
      <td>{{$forn->telefone}}</td>
      <td>{{$forn->endereco}}</td>
      <td>{{$forn->pais}}</td>
      <td>{{$forn->uf}}</td>
      <td>{{$forn->cidade}}</td>
</tr>
@endforeach 
</tbody>

</table>


</body>
