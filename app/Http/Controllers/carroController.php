<?php

namespace App\Http\Controllers;

use App\carro;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
class carroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listacarro = carro::all();
        return view('carro.list', ['carro' => $listacarro]);
       
    }

    public function cadastro()
    {
        return view('carro.cadastro');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('carro.cadastro');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = array(

            'placa.required' => 'É obrigatória uma placa para o carro',
            'proprietario.required' => 'É obrigatório um proprietário para o carro',
            'marca.required' => 'É obrigatória uma marca para o carro',
            'modelo.required' => 'É obrigatório um modelo para o carro',
        
        );
        //vetor com as especificações de validações
        $regras = array(
            'placa' => 'required|string',
            'proprietario' => 'required|string',
            'marca' => 'required|string',
            'modelo' => 'required|string',
        );
        //cria o objeto com as regras de validação
        $validador = Validator::make($request->all(), $regras, $messages);
        //executa as validações
        if ($validador->fails()) {
            return redirect('create/carro')
            ->withErrors($validador)
            ->withInput($request->all);
        }
        //se passou pelas validações, processa e salva no banco...
        $obj_Carro = new carro();
        $obj_Carro->placa =       $request['placa'];
        $obj_Carro->proprietario = $request['proprietario'];
        $obj_Carro->marca = $request['marca'];
        $obj_Carro->modelo     = $request['modelo'];
        $obj_Carro->save();
        return redirect('/mostrar/carro')->with('success', 'Carro criado com sucesso!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\carro  $carro
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $carro = carro::where("id",$id)->get()->first();
        return view('carro.show', ['carro' => $carro]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\carro  $carro
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $obj_Carro = carro::find($id);
        return view('carro.edit', ['carro' => $obj_Carro]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\carro  $carro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //faço as validações dos campos
        //vetor com as mensagens de erro
        $messages = array(
            'placa.required' => 'É obrigatória uma placa para o carro',
            'proprietario.required' => 'É obrigatório um proprietário para o carro',
            'marca.required' => 'É obrigatória uma marca para o carro',
            'modelo.required' => 'É obrigatório um modelo para o carro',
            
        );
        //vetor com as especificações de validações
        $regras = array(
            'placa' => 'required|string',
            'proprietario' => 'required|string',
            'marca' => 'required|string',
            'modelo' => 'required|string',
            
        );
        //cria o objeto com as regras de validação
        $validador = Validator::make($request->all(), $regras, $messages);
        //executa as validações
        if ($validador->fails()) {
            return redirect("editar/carro/$id")
            ->withErrors($validador)
            ->withInput($request->all);
        }
        //se passou pelas validações, processa e salva no banco...
        $obj_Carro = carro::findOrFail($id);
        $obj_Carro->placa = $request['placa'];
        $obj_Carro->proprietario = $request['proprietario'];
        $obj_Carro->marca = $request['marca'];
        $obj_Carro->modelo = $request['modelo'];
        $obj_Carro->save();
        return redirect('/mostrar/carro')->with('success', 'Carro atualizado com sucesso!!');    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\carro  $carro
     * @return \Illuminate\Http\Response
     */
    public function destroy(carro $carro)
    {
        //
    }
}
