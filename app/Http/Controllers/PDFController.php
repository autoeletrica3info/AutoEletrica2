<?php

namespace App\Http\Controllers;

use App\atendimento;
use App\carro;
use Dompdf\Dompdf;
use App\produto;
use App\fornecedor;
use App\compra;
use App\atendimento_produto;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;



class PDFController extends Controller
{
   
       public function atendimentoPDF(Request $request){
       
       $id = $request['opcao'];
       $inicio = $request['dateStart'];
       $fim = $request['dateEnd'];
       //print_r($inicio);
        
       if($id == 1){
        $result = DB::table('atendimento')
        ->join('carro', 'carro.id', '=', 'atendimento.carro_id')
        ->select('carro.placa', 'atendimento.*')
        ->get();

        $date = date('j M Y H:i:s');
        $view =  \View::make('atendimento.gerarPDF', compact('result', 'date'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->setPaper('A4', 'landscape');
        
        $pdf->loadHTML($view);
        return $pdf->stream('RelatorioAtendimentos');
       }
       else if($id == 2){
       $start= date($inicio, time()); 
       $end= date($fim, time());
       
        $result = DB::table('atendimento')
        ->whereBetween('data', array($start, $end))
        ->join('carro', 'carro.id', '=', 'atendimento.carro_id')
        ->select('carro.placa', 'atendimento.*')
        ->get();

        $date = date('j M Y H:i:s');
        $view =  \View::make('atendimento.gerarPDF', compact('result', 'date'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->setPaper('A4', 'landscape');
        
        $pdf->loadHTML($view);
        return $pdf->stream('RelatorioAtendimentos');
              }
       
       }

       public function compraPDF(Request $request){

       $id = $request['opcao'];
       $inicio = $request['dateStart'];
       $fim = $request['dateEnd'];

              if($id == 1){
                     $compra = compra::all();
             
                     $date = date('j M Y H:i:s');
                     $view =  \View::make('compra.gerarPDF', compact('compra', 'date'))->render();
                     $pdf = \App::make('dompdf.wrapper');
                     $pdf->setPaper('A4', 'landscape');
                     
                     $pdf->loadHTML($view);
                     return $pdf->stream('RelatorioCompras');

                    }
                    else if($id == 2){
                    $start= date($inicio, time()); 
                    $end= date($fim, time());
                    
                     $compra = compra::whereBetween('dt_compra', array($start, $end))->get();
                     
             
                     $date = date('j M Y H:i:s');
                     $view =  \View::make('compra.gerarPDF', compact('compra', 'date'))->render();
                     $pdf = \App::make('dompdf.wrapper');
                     $pdf->setPaper('A4', 'landscape');
                     
                     $pdf->loadHTML($view);
                     return $pdf->stream('RelatorioCompras');
                           }
        
              //$dompdf = new Dompdf();
              
              
              
              
         
             }

       public function carroPDF(){
        
        //$dompdf = new Dompdf();
        $carro = carro::all();
        
        $date = date('j M Y H:i:s');
        $view =  \View::make('carro.gerarPDF', compact('carro', 'date'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->setPaper('A4', 'landscape');
        
        $pdf->loadHTML($view);
        return $pdf->stream('RelatorioCarros');
        
   
       }
       
       public function produtoPDF(){
        
        //$dompdf = new Dompdf();
        $produto = DB::table('produto')
        ->join('fornecedor', 'fornecedor.id', '=', 'produto.fornecedor_id')
        ->select('fornecedor.nome_fornecedor', 'produto.*')
        ->get();
        
        $date = date('j M Y H:i:s');
        $view =  \View::make('produto.gerarPDF', compact('produto', 'date'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->setPaper('A4', 'landscape');
        
        $pdf->loadHTML($view);
        return $pdf->stream('RelatorioProdutos');
        
   
       }
       public function fornecedorPDF(){
        
        //$dompdf = new Dompdf();
        $fornecedor = fornecedor::all();
        
        $date = date('j M Y H:i:s');
        $view =  \View::make('fornecedor.gerarPDF', compact('fornecedor', 'date'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->setPaper('A4', 'landscape');
        
        $pdf->loadHTML($view);
        return $pdf->stream('RelatorioFornecedores');
        
   
       }
       
       
}
