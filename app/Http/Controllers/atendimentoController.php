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
    $listaproduto = produto::all();
    return view('atendimento.cadastro', ['carro' => $listacarro], ['produto' => $listaproduto]);
}

public function adicao(){
    $listaatendimento = atendimento::all();
    $listaproduto = produto::all();
    return view('atendimento.adicao', ['atendimento' => $listaatendimento], ['produto' => $listaproduto]);
}

public function show($id)
    {

        $atendimento = atendimento::where("id",$id)->get()->first();
        $atendimentoProduto = atendimento_produto::where("atendimento_id",$id)->get();
        return view('atendimento.show', ['atendimento' => $atendimento], ['result' => $atendimentoProduto]);
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
        'valor_servico.required' => 'É obtigatório informar o valor do serviço',
        'data_atendimento.required' => 'É obrigatório uma data para o atendimento',
        'CBcarro.required' => 'É obrigatório uma data para o atendimento',
        'situacao.required' => 'É obrigatório uma situacao para o atendimento',
        

    );
    //vetor com as especificações de validações
    $regras = array(
        'descricao' => 'required|string|max:255',
        'data_atendimento' => 'required',
        'valor_servico' => 'required',
        'CBcarro' => 'required',
        'situacao' => 'required',
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

    //se passou pelos array, processa e salva no banco...
    $total =0;
    $obj_Atendimento = new atendimento();
    $obj_Atendimento->descricao = $request['descricao'];
    $obj_Atendimento->data = $request['data_atendimento'];
    $obj_Atendimento->carro_id = $request['CBcarro'];
    $obj_Atendimento->situacao = $request['situacao'];
    $obj_Atendimento->valor_total = $total;
    $obj_Atendimento->pagamento = 1;
    $obj_Atendimento->valor_servico = $request['valor_servico'];
    $obj_Atendimento->save();
   /* $obj_AtendimentoProduto = new atendimento_produto();
    $obj_AtendimentoProduto->produto_id = $produto;
    $obj_AtendimentoProduto->quantidade = $request['quantidade'];
    $obj_AtendimentoProduto->preco_unitario = $preco_unitario;
    $obj_AtendimentoProduto->atendimento_id = $obj_Atendimento->id;
    $obj_AtendimentoProduto->save(); */

    /* 
            
            'produto_id' => 1,
            'quantidade' => 2,
            'preco_unitario' => 4.00,
            'atendimento_id' => 1
        
    */
    return redirect('/cadastro/atendimento/produto')->with('success', 'Atendimento criado com sucesso!!');
}

public function edit($id)
    {
        $obj_Atendimento = atendimento::find($id);
        $listacarro = carro::all();
        

        return view('atendimento.edit', ['atendimento' => $obj_Atendimento, 'carro' => $listacarro]);
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
        'valor_servico.required' => 'É obtigatório informar o valor do serviço',
        'data_atendimento.required' => 'É obrigatório uma data para o atendimento',
        'situacao.required' => 'É obrigatório uma situação para o atendimento',
            
        );
        //vetor com as especificações de validações
        $regras = array(
        'descricao' => 'required|string|max:255',
        'data_atendimento' => 'required',
        'valor_servico' => 'required',
        'situacao' => 'required',
            
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

    $obj_Atendimento = atendimento::findOrFail($id);
    $obj_Atendimento->descricao = $request['descricao'];
    $obj_Atendimento->data = $request['data_atendimento'];
    $obj_Atendimento->carro_id = $request['CBcarro'];
    $obj_Atendimento->situacao = $request['situacao'];
    $obj_Atendimento->valor_servico = $request['valor_servico'];
    $obj_Atendimento->save();

        return redirect('/mostrar/atendimento')->with('success', 'Atendimento atualizada com sucesso!!');
    }

    public function delete($id)
    {
        $obj_Atendimento = atendimento::find($id);
        return view('atendimento.delete', ['atendimento' => $obj_Carro]);
    }
    
    public function destroy($id)
    {
        $obj_Atendimento = atendimento::findOrFail($id);
        $id_produto = $request['idProduto'];
        $obj_Atendimento_Produto = atendimento_produto::where('atendimento_id', $id)->where('produto_id', $id_produto);
        $obj_Atendimento->delete($id);
        return Redirect('/mostrar/carro')->with('sucess', 'Atividade excluída com Sucesso!');
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
                return redirect("editar/atendimento/$id")
                ->withErrors($validador)
                ->withInput($request->all);
            }
            //se passou pelas validações, processa e salva no banco...
    
            $pago = 2;
            $obj_Atendimento = atendimento::findOrFail($id);
            $obj_Atendimento->pagamento = $pago;
            $obj_Atendimento->valor_total = $request['valor_tot'];
            $obj_Atendimento->save();
    
            return redirect('/mostrar/atendimento')->with('success', 'Atendimento atualizada com sucesso!!');
        
    
           
        
        
    }
}
