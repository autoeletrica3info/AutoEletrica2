<?php

namespace App\Http\Controllers;

use App\compra;
use App\produto;
use App\compra_produto;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class compraController extends Controller
{



public function index()
{
    $listacompra = compra::all();
    return view('compra.list', ['compra' => $listacompra]);
       
}


public function cadastro()
{
    $listaproduto = produto::all();
    return view('compra.cadastro', ['produto' => $listaproduto]);
}



 
public function create()
{
    //return view('compra.cadastro');
}
/**
 * Store a newly created resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\Response
 */
public function store(Request $request)
{
                    /*
                $table->string('nome');
                $table->string('email')->unique();
                $table->string('endereço');
                $table->string('uf');
                $table->string('cidade');
                */ 
    //faço as validações dos campos
    //vetor com as mensagens de erro
    $messages = array(
        'descricao.required' => 'É obrigatório uma descricao para a compra',
        'data.required' => 'É obrigatório uma data para a compra',
        
        
    );
    //vetor com as especificações de validações
    $regras = array(
        'descricao' => 'required',
        'data' => 'required',
     

    );
    //cria o objeto com as regras de validação
    $validador = Validator::make($request->all(), $regras, $messages);
    //executa as validações
    if ($validador->fails()) {
        return redirect('create/compra')
        ->withErrors($validador)
        ->withInput($request->all);
    }
    //se passou pelas validações, processa e salva no banco...
    $total =0;
    $pago = 1;
    $obj_Compra = new compra();
    $obj_Compra->descricao = $request['descricao'];
    $obj_Compra->dt_compra = $request['data'];
    $obj_Compra->valor_total = $total;
    $obj_Compra->pagamento = $pago;
    $obj_Compra->save();
    /*$obj_CompraProduto = new compra_produto();
    $obj_CompraProduto->produto_id = $produto;
    $obj_CompraProduto->compra_id = $obj_Compra->id;
    $obj_CompraProduto->preco_unitario = $preco_unitario;
    $obj_CompraProduto->quantidade = $request['quantidade'];
    $obj_CompraProduto->save();*/
    return redirect('/cadastro/compra/produto')->with('success', 'Compra registrada com sucesso!!');
}

public function adicao(){
    $listacompra = compra::all();
    $listaproduto = produto::all();
    return view('compra.adicao', ['compra' => $listacompra], ['produto' => $listaproduto]);
}

public function show($id)
    {
        $compra = compra::where("id",$id)->get()->first();
        $result = compra_produto::where("compra_id",$id)->get();
        
        return view('compra.show', ['compra' => $compra, 'result' => $result]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\compra  $atividade
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $obj_Compra = compra::find($id);
        return view('compra.edit', ['compra' => $obj_Compra]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\compra  $atividade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        //faço as validações dos campos
        //vetor com as mensagens de erro
        $messages = array(
        'descricao.required' => 'É obrigatório uma descricao para a compra',
        'valor_total.required' => 'É obrigatório um calor para a compra',
        'data_compra.required' => 'É obrigatório uma data para a compra',
    
            
        );
        //vetor com as especificações de validações
        $regras = array(
        'descricao' => 'required|string|max:255',
        'valor_total' => 'required',
        'data_compra' => 'required',
        
            
        );
        //cria o objeto com as regras de validação
        $validador = Validator::make($request->all(), $regras, $messages);
        //executa as validações
        if ($validador->fails()) {
            return redirect("editar/compra/$id")
            ->withErrors($validador)
            ->withInput($request->all);
        }
        //se passou pelas validações, processa e salva no banco...

    $obj_Compra = compra::findOrFail($id);
    $obj_Compra->descricao = $request['descricao'];
    $obj_Compra->valor_total = $request['valor_total'];
    $obj_Compra->dt_compra = $request['data_compra'];
    $obj_Compra->save();
    
        return redirect('/mostrar/compra')->with('success', 'Compra atualizada com sucesso!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\compra  $atividade
     * @return \Illuminate\Http\Response
     */

    public function verificar($id)
    {   
        $compraProduto = compra_produto::where("compra_id",$id)->get();
        //dd($atendimentoProduto);
        $mostrar="/mostrar/compra/".$id;
        $excluir="/excluir/compra/".$id;
        

        if(!$compraProduto->isEmpty()){
            return Redirect($mostrar)->with('success', 'Exclua os produtos relacionados!!');

        } else{
            return Redirect($excluir);
        }
    }

    public function delete($id)
    {
        $obj_Compra = compra::find($id);
        return view('compra.delete', ['compra' => $obj_Compra]);
    }
    
    public function destroy($id)
    {
        $obj_Compra = compra::findOrFail($id);
        $obj_Compra->delete($id);
        return Redirect('/mostrar/compra')->with('sucess', 'Compra excluída com Sucesso!');
    }

    public function pagamento(Request $request,  $id)
    {
       //faço as validações dos campos
        //vetor com as mensagens de erro
        $messages = array(

            'valor_tot.required' => 'É obrigatório uma situação para o atendimento',
                
            );
            //vetor com as especificações de validações
            $regras = array(
            'valor_tot' => 'required',
                
            );
            //cria o objeto com as regras de validação
            $validador = Validator::make($request->all(), $regras, $messages);
            //executa as validações
            if ($validador->fails()) {
                return redirect("editar/compra/$id")
                ->withErrors($validador)
                ->withInput($request->all);
            }
            //se passou pelas validações, processa e salva no banco...
    
            $pago = 2;
            $obj_Compra = compra::findOrFail($id);
            $obj_Compra->pagamento = $pago;
            $obj_Compra->valor_total = $request['valor_tot'];
            $obj_Compra->save();
    
            return redirect('/mostrar/compra')->with('success', 'Compra paga com sucesso!!');
     
    }

    /*public function gerarPdf(){
        $pgTitulo = $_GET["titulo"];
        $pgTxt = $_GET["txt"];
        $pgData = $_GET["data"];
        $dompdf = new Dompdf();
        $textofinal = "Título atividade: ".$pgTitulo."<br> Texto Atividade: ".$pgTxt."<br> Data Atividade: ".$pgData ; 
        $dompdf->loadHtml($textofinal);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        return$dompdf->stream();
    }

    public function gerar(){
        
        return view('atividade.gerarPdf');
    }*/
}
