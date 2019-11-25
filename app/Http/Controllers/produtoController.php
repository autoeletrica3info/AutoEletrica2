<?php

namespace App\Http\Controllers;

use App\produto;
use App\fornecedor;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class produtoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = DB::table('produto')
        ->join('fornecedor', 'fornecedor.id', '=', 'produto.fornecedor_id')
        ->select('fornecedor.nome_fornecedor', 'produto.*')
        ->get();
        return view('produto.list', compact('result'));
              
    }

    public function cadastro()
    {
        $listafornecedor = fornecedor::all();
        return view('produto.cadastro', ['fornecedor' => $listafornecedor]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('produto.cadastro');
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
            $table->string('marca');
            $table->string('categoria');
            $table->float('preco_custo');
            $table->float('preco_unitario');
            $table->integer('fornecedor_id')->unsigned();
        */
        $messages = array(
            'nome.required' => 'É obrigatório um nome para o produto',
            'marca.required' => 'É obrigatório uma marca para o produto',
            'categoria.required' => 'É obrigatório uma categoria para o produto',
            'preco_custo.required' => 'É obrigatório um preço de custo para o produto',
            'preco_unitario.required' => 'É obrigatório um preço unitário para o produto',
            'fornecedor_id.required' => 'É obrigatório um fornecedor para o produto',
        );
        //vetor com as especificações de validações
        $regras = array(
            'nome' => 'required|string|max:255',
            'marca' => 'required|string',
            'categoria' => 'required|string',
            'preco_custo' => 'required',
            'preco_unitario' => 'required',
            'fornecedor_id' => 'required',
        );
        //cria o objeto com as regras de validação
        $validador = Validator::make($request->all(), $regras, $messages);
        //executa as validações
        if ($validador->fails()) {
            return redirect('create/produto')
            ->withErrors($validador)
            ->withInput($request->all);
        }
        //se passou pelas validações, processa e salva no banco...
        $obj_Produto = new produto();
        $obj_Produto->nome =       $request['nome'];
        $obj_Produto->marca = $request['marca'];
        $obj_Produto->categoria = $request['categoria'];
        $obj_Produto->preco_custo = $request['preco_custo'];
        $obj_Produto->preco_unitario     = $request['preco_unitario'];
        $obj_Produto->fornecedor_id     = $request['fornecedor_id'];
        $obj_Produto->save();
        return redirect('/mostrar/produto')->with('success', 'Produto criado com sucesso!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produto = produto::where("id",$id)->get()->first();
        return view('produto.show', ['produto' => $produto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $obj_Produto = produto::find($id);
        $listafornecedor = fornecedor::all();
        

        return view('produto.edit', ['produto' => $obj_Produto, 'fornecedor' => $listafornecedor]);
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
            'nome.required' => 'É obrigatório um nome para o produto',
            'marca.required' => 'É obrigatório uma marca para o produto',
            'categoria.required' => 'É obrigatório uma categoria para o produto',
            'preco_custo.required' => 'É obrigatório um preço de custo para o produto',
            'preco_unitario.required' => 'É obrigatório um preço unitário para o produto',
            'fornecedor_id.required' => 'É obrigatório um fornecedor para o produto',
            
        );
        //vetor com as especificações de validações
        $regras = array(
            'nome' => 'required|string|max:255',
            'marca' => 'required|string',
            'categoria' => 'required|string',
            'preco_custo' => 'required',
            'preco_unitario' => 'required',
            'fornecedor_id' => 'required',
            
        );
        //cria o objeto com as regras de validação
        $validador = Validator::make($request->all(), $regras, $messages);
        //executa as validações
        if ($validador->fails()) {
            return redirect("editar/produto/$id")
            ->withErrors($validador)
            ->withInput($request->all);
        }
        //se passou pelas validações, processa e salva no banco...

        $obj_Produto = produto::findOrFail($id);
        $obj_Produto->nome =       $request['nome'];
        $obj_Produto->marca = $request['marca'];
        $obj_Produto->categoria = $request['categoria'];
        $obj_Produto->preco_custo = $request['preco_custo'];
        $obj_Produto->preco_unitario     = $request['preco_unitario'];
        $obj_Produto->fornecedor_id     = $request['fornecedor_id'];
        $obj_Produto->save();

        return redirect('/mostrar/produto')->with('success', 'Produto atualizada com sucesso!!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $obj_Produto = produto::find($id);
        return view('produto.delete', ['produto' => $obj_Produto]);
    }
    
    public function destroy($id)
    {
        $obj_Produto = produto::findOrFail($id);
        $obj_Produto->delete($id);
        return Redirect('/mostrar/produto')->with('sucess', 'Produto excluído com Sucesso!');
    }
}
