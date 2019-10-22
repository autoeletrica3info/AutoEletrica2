<?php

namespace App\Http\Controllers;

use App\atendimento;
use App\carro;
use App\produto;
use App\atendimento_produto;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;



class atendimentoController extends Controller
{
    public function index()
    {
        #$listaatendimento = atendimento::all();

        $result = DB::table('atendimento')
        ->join('carro', 'carro.id', '=', 'atendimento.carro_id')
        ->select('carro.placa', 'atendimento.*')
        ->get();
        return view('atendimento.list', compact('result'));
        
        
        
       }


public function cadastro(){
    $listacarro = carro::all();
    $listaprodduto = produto::all();
    return view('atendimento.cadastro', ['carro' => $listacarro], ['produto' => $listaprodduto]);
}

public function adicao(){
    $listaatendimento = atendimento::all();
    $listaprodduto = produto::all();
    return view('atendimento.adicao', ['atendimento' => $listaatendimento], ['produto' => $listaprodduto]);
}

public function show($id)
    {
        $atendimento = atendimento::where("id",$id)->get()->first();
        return view('atendimento.show', ['atendimento' => $atendimento]);
    }

public function create()
{
    return view('atendimento.cadastro');
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
        //'carro_id' => 'required'
        
        
        
    );
    //cria o objeto com as regras de validação
    $validador = Validator::make($request->all(), $regras, $messages);
    //executa as validações
    if ($validador->fails()) {
        return redirect('create/atendimento')
        ->withErrors($validador)
        ->withInput($request->all);
    }
    
    //se passou pelas validações, explode request e coloca em um array...
    $resultEX = explode(':', $request['produtos']);
    $produto = $resultEX[0];
    $preco_unitario = $resultEX[1];

    //se passou pelos array, processa e salva no banco...
    $obj_Atendimento = new atendimento();
    $obj_Atendimento->descricao = $request['descricao'];
    $obj_Atendimento->valor_total = $request['valor_total'];
    $obj_Atendimento->data = $request['data_atendimento'];
    $obj_Atendimento->carro_id = $request['CBcarro'];
    $obj_Atendimento->situacao = $request['situacao'];
    $obj_Atendimento->valor_servico = $request['valor_servico'];
    $obj_Atendimento->save();
    $obj_AtendimentoProduto = new atendimento_produto();
    $obj_AtendimentoProduto->produto_id = $produto;
    $obj_AtendimentoProduto->quantidade = $request['quantidade'];
    $obj_AtendimentoProduto->preco_unitario = $preco_unitario;
    $obj_AtendimentoProduto->atendimento_id = $obj_Atendimento->id;
    $obj_AtendimentoProduto->save();

    /* 
            
            'produto_id' => 1,
            'quantidade' => 2,
            'preco_unitario' => 4.00,
            'atendimento_id' => 1
        
    */
    return redirect('/mostrar/atendimento')->with('success', 'Atendimento criado com sucesso!!');
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
}
