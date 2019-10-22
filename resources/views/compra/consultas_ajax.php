<?php

use App\compra;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

header('Content-type: text/html; charset=ISO-8859-1');

if(isset($_GET['id'])){
	$id_produto = $_GET['id'];


   // $result = DB::table('compra')->where("id",$id);
    $result = compra::where("id",$id_produto)->get();


	while($row = $result->fetch_array()){
	    echo "<input id= 'preco_unitario' name='preco_unitario' class='form-control input-md' required='' type='text'>";
	}
}
else if(isset($_GET['preco_unitario'])){
	$preco_unitario = $_GET['preco_unitario'];
    $quantidade = $_GET['quantidade'];
    
    $total=0;
    $total = ($preco_unitario * $quantidade); 

	echo "<input type='tel' required='required' maxlength='15' name='valor_total'>";

}

?>

