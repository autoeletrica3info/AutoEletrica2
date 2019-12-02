<?php

namespace App\Http\Controllers;

use App\compra;
use App\produto;
use App\compra_produto;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;



class compraProdutoController extends Controller
{
    public function index()
    {
        #$listaatendimento = atendimento::all();

        /*$result = DB::table('atendimento')
        ->join('carro', 'carro.id', '=', 'atendimento.carro_id')
        ->select('carro.placa', 'atendimento.*')
        ->get();
        return view('atendimento.list', compact('result'));*/
       
        
       }


public function cadastro(){
    $listacompra = compra::all();
    $listaprodduto = produto::all();
    return view('compra.adicao', ['compra' => $listacompra], ['produto' => $listaprodduto]);
}


public function show($id)
    {
        $atendimentoProduto = atendimento_produto::where("id",$id)->get()->first();
        return view('atendimentoProduto.show', ['atendimento' => $atendimentoProduto]);
    }

public function create()
{
    return view('compraProduto.cadastro');
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

        
        'compra.required' => 'É obrigatório um atendimento para guardar o seu produto',
        'produtos.required' => 'É obrigatório um produto para o atendimento',
        'quantidade.required' => 'É obtigatório informar a quantidade do produto acima',
        

    );
    //vetor com as especificações de validações
    $regras = array(
    
        'produtos' => 'required',
        'quantidade' => 'required',
        'compra' => 'required',
        
        //'carro_id' => 'required'
        
        
        
    );
    //cria o objeto com as regras de validação
    $validador = Validator::make($request->all(), $regras, $messages);
    //executa as validações
    if ($validador->fails()) {
        return redirect('create/compra')
        ->withErrors($validador)
        ->withInput($request->all);
    }
    
    //se passou pelas validações, explode request e coloca em um array...
    $resultEX = explode(':', $request['produtos']);
    $produto = $resultEX[0];
    $preco_custo = $resultEX[1];

    //se passou pelos array, processa e salva no banco...
    $quantidadeA = $request['quantidade'];
    $obj_CompraProduto = new compra_produto();
    $obj_CompraProduto->produto_id = $produto;
    $obj_CompraProduto->quantidade = $request['quantidade'];
    $obj_CompraProduto->preco_custo = $preco_custo;
    $obj_CompraProduto->valor_total = $preco_custo * $quantidadeA;
    $obj_CompraProduto->compra_id = $request['compra'];
    $obj_CompraProduto->save();

    /* 
            
            'produto_id' => 1,
            'quantidade' => 2,
            'preco_unitario' => 4.00,
            'atendimento_id' => 1
        
    */
    return redirect('/mostrar/compra')->with('success', 'Compra criado com sucesso!!');
}

public function edit($id)
    {
        $obj_Atendimento = atendimento::find($id);
        $listacarro = carro::all();
        $listaproduto = produto::all();
        return view('atendimento.edit', ['atendimento' => $obj_Atendimento, 'carro' => $listacarro, 'produto' => $listaproduto]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\atendimento  $atividade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        //faço as validações dos campos
        //vetor com as mensagens de erro
        $messages = array(
        'descricao.required' => 'É obrigatório uma descricao para o atendimento',
        'valor_total.required' => 'É obrigatório um calor para o atendimento',
        'valor_servico.required' => 'É obtigatório informar o valor do serviço',
        'data_atendimento.required' => 'É obrigatório uma data para o atendimento',
        'produtos.required' => 'É obrigatório um produto para o atendimento',
        'quantidade.required' => 'É obtigatório informar a quantidade do produto acima',
            
        );
        //vetor com as especificações de validações
        $regras = array(
            'descricao' => 'required|string|max:255',
        'valor_total' => 'required',
        'data_atendimento' => 'required',
        'produtos' => 'required',
        'quantidade' => 'required',
        'valor_servico' => 'required',
            
        );
        //cria o objeto com as regras de validação
        $validador = Validator::make($request->all(), $regras, $messages);
        //executa as validações
        if ($validador->fails()) {
            return redirect("editar/atendimento/$id")
            ->withErrors($validador)
            ->withInput($request->all);
        }
        //se passou pelas validações, processa e salva no banco...
        $resultEX = explode(':', $request['produtos']);
        $produto = $resultEX[0];
        $preco_unitario = $resultEX[1];

    $obj_Atendimento = atendimento::findOrFail($id);
    $obj_Atendimento->descricao = $request['descricao'];
    $obj_Atendimento->valor_total = $request['valor_total'];
    $obj_Atendimento->data = $request['data_atendimento'];
    $obj_Atendimento->carro_id = $request['CBcarro'];
    $obj_Atendimento->situacao = $request['situacao'];
    $obj_Atendimento->valor_servico = $request['valor_servico'];
    $obj_Atendimento->save();
    $obj_AtendimentoProduto = atendimento_produto::where('atendimento_id',$id)->get();
    
        //dd($obj_AtendimentoProduto);

    $obj_AtendimentoProduto->produto_id = $produto;
    $obj_AtendimentoProduto->quantidade = $request['quantidade'];
    $obj_AtendimentoProduto->preco_unitario = $preco_unitario;
    $obj_AtendimentoProduto->atendimento_id = $obj_Atendimento->id;
    $obj_AtendimentoProduto->save();
        return redirect('/mostrar/atendimento')->with('success', 'Atendimento atualizada com sucesso!!');
    }

    public function delete($id, $id2)
    {
       $obj_CompraProduto = compra_produto::where("produto_id", $id)->where("compra_id", $id2)->get()->first();
       return view('compraproduto.delete', ['result' => $obj_CompraProduto]);
    }
    
    public function destroy($id, $id2)
    {
        $obj_CompraProduto = compra_produto::where('produto_id', $id)->where('compra_id', $id2);
        $obj_CompraProduto->delete($id, $id2);
        return Redirect('/mostrar/compra')->with('sucess', 'Produto da Compra excluída com Sucesso!');
    }
}
