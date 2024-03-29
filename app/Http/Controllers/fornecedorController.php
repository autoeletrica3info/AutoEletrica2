<?php

namespace App\Http\Controllers;

use App\fornecedor;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class fornecedorController extends Controller
{
    public function index()
    {
        $listafornecedor = fornecedor::all();
        return view('fornecedor.list', ['fornecedor' => $listafornecedor]);
       
    }

    public function cadastro()
    {
        return view('fornecedor.cadastro');
    }
 
public function create()
{
    //return view('fornecedor.cadastro');
}
public function show($id)
    {
        $fornecedor = fornecedor::where("id",$id)->get()->first();
        return view('fornecedor.show', ['fornecedor' => $fornecedor]);
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
        'nome.required' => 'É obrigatório um nome para o fornecedor',
        'email.required' => 'É obrigatório um email para o fornecedor',
        'telefone.required' => 'É obrigatório um telefone para o fornecedor',
        'endereço.required' => 'É obrigatório o endereço do fornecedor',
        'pais.required' => 'É obrigatório o endereço do fornecedor',
        'uf.required' => 'É obrigatório um estado para o fornecedor',
        'cidade.required' => 'É obrigatória uma cidade para o fornecedor',
    );
    //vetor com as especificações de validações
    $regras = array(
        'nome' => 'required|string|max:255',
        'email' => 'required',
        'endereço' => 'required|string',
        'pais' => 'required|string',
        'uf' => 'required|string',
        'telefone' => 'required',
        'cidade' => 'required|string',
    );
    //cria o objeto com as regras de validação
    $validador = Validator::make($request->all(), $regras, $messages);
    //executa as validações
    if ($validador->fails()) {
        return redirect('create/fornecedor')
        ->withErrors($validador)
        ->withInput($request->all);
    }
    //se passou pelas validações, processa e salva no banco...
    $obj_Fornecedor = new fornecedor();
    $obj_Fornecedor->nome_fornecedor = $request['nome'];
    $obj_Fornecedor->email = $request['email'];
    $obj_Fornecedor->endereco = $request['endereço'];
    $obj_Fornecedor->pais = $request['pais'];
    $obj_Fornecedor->uf     = $request['uf'];
    $obj_Fornecedor->telefone = $request['telefone'];
    $obj_Fornecedor->cidade     = $request['cidade'];
    $obj_Fornecedor->save();
    return redirect('/mostrar/fornecedor')->with('success', 'Fornecedor criado com sucesso!!');
}
public function edit($id)
    {
        $obj_Fornecedor = fornecedor::find($id);
        return view('fornecedor.edit', ['fornecedor' => $obj_Fornecedor]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\carro  $carro
     * @return \Illuminate\Http\Response
     */
    
    public function update(Request $request,  $id)
    {
        //faço as validações dos campos
        //vetor com as mensagens de erro
        $messages = array(
            'nome.required' => 'É obrigatório um nome para o fornecedor',
            'email.required' => 'É obrigatório um email para o fornecedor',
            'endereço.required' => 'É obrigatório o endereço do fornecedor',
            'pais.required' => 'É obrigatório o endereço do fornecedor',
            'uf.required' => 'É obrigatório um estado para o fornecedor',
            'pais' => 'required|string',
            'cidade.required' => 'É obrigatória uma cidade para o fornecedor',
            
        );
        //vetor com as especificações de validações
        $regras = array(
            'nome' => 'required|string|max:255',
        'email' => 'required',
        'endereço' => 'required|string',
        'uf' => 'required|string',
        'cidade' => 'required|string',
            
        );
        //cria o objeto com as regras de validação
        $validador = Validator::make($request->all(), $regras, $messages);
        //executa as validações
        if ($validador->fails()) {
            return redirect("editar/fornecedor/$id")
            ->withErrors($validador)
            ->withInput($request->all);
        }
        //se passou pelas validações, processa e salva no banco...

    $obj_Fornecedor = fornecedor::findOrFail($id);
    $obj_Fornecedor->nome_fornecedor =       $request['nome'];
    $obj_Fornecedor->email = $request['email'];
    $obj_Fornecedor->endereco = $request['endereço'];
    $obj_Fornecedor->pais = $request['pais'];
    $obj_Fornecedor->uf     = $request['uf'];
    $obj_Fornecedor->cidade     = $request['cidade'];
    $obj_Fornecedor->save();

        return redirect('/mostrar/fornecedor')->with('success', 'Fornecedor atualizado com sucesso!!');
    }

    public function delete($id)
    {
        $obj_Fornecedor = fornecedor::find($id);
        return view('fornecedor.delete', ['fornecedor' => $obj_Fornecedor]);
    }
    
    public function destroy($id)
    {
        $obj_Fornecedor = fornecedor::findOrFail($id);
        $obj_Fornecedor->delete($id);
        return Redirect('/mostrar/fornecedor')->with('sucess', 'Fornecedor excluída com Sucesso!');
    }

}