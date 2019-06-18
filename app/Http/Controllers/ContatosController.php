<?php

namespace App\Http\Controllers;

use App\Contatos;
use Illuminate\Http\Request;

class ContatosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $contatos = Contatos::all();

        return view('contatos.index', compact('contatos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('contatos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
           
            'nome' => 'required|max:55',
            'sobrenome' => 'required|max:55',
            'email' => 'email|max:55',
            'telefone' => 'required|max:55'

        ]);

        $contatos = new contatos([
            
           'nome' => $request->nome,
           'sobrenome' => $request->sobrenome,
           'email' => $request->email,
           'telefone' => $request->telefone,
           'cidade' => $request->cidade,
           'estado' => $request->estado,
           'profissao' => $request->profissao
            
        ]);

        $contatos->save();

        return response()->json(['success'=>'Data is successfully added']);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contatos  $contatos
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contatos  $contatos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $contatos = Contatos::find($id);
        return view('contatos.edit', compact('contatos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contatos  $contatos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
           
            'nome' => 'required|max:55',
            'sobrenome' => 'required|max:55',
            'email' => 'email|max:55',
            'telefone' => 'required|max:55'

        ]);

        $contatos = Contatos::find($id);
        $contatos->nome = $request->nome;
        $contatos->sobrenome = $request->sobrenome;
        $contatos->email = $request->email;
        $contatos->telefone = $request->telefone;
        $contatos->cidade =  $request->cidade;
        $contatos->estado = $request->estado;
        $contatos->profissao = $request->profissao;
         $contatos->update();

         return redirect('/contatos')->with('success', 'Atualizado com Sucesso!');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contatos  $contatos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $contatos = Contatos::find($id);
        $contatos->delete();
        
        return redirect('/contatos')->with('success', 'Contato Deletado Com Sucesso!');
        
    }
}