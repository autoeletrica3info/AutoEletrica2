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
<th>Relatório de Produtos</th>
<th>#</th>
<th>#</th>
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
<th>#</th>
<th>#</th>
</tr>
</thead>
<thead>
<tr>
<th>#</</th>
<th>Nome</th>
<th>Marca</th>
<th>Categoria</th>
<th>Preço de Custo</th>
<th>Preço de Unitário </th>
<th>Fornecedor</th>
</tr>
</thead>
<tbody>
@foreach ($produto as $row)
    <tr>
      <th scope="row">{{$row->id}}</th>
      <td>{{$row->nome}}</td>
      <td>{{$row->marca}}</td>
      <td>{{$row->categoria}}</td>
      <td>R$ {{$row->preco_custo}}</td>
      <td>R$ {{$row->preco_unitario}}</td>
      <td>{{$row->nome_fornecedor}}</td>
    </tr>
  @endforeach
</tbody>

</table>


</body>
