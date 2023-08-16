<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //dd('Produto');
        $produtos = Produto::get();
        return view('produto.produto_index', ['produtos' => $produtos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view ('produto.produto_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
            'nome.required' => 'O :attribute é obrigatório!',
            'quantidade.required' => 'O :attribute é obrigatório!',
            'preco.required' => 'O :attribute é obrigatório!',

             ];


        $Validated = $request->validate([
            'nome'          => 'required|min:5',
            'quantidade'    => 'required',
            'preco'         => 'required',
        ], $messages);

        $produto = new Produto();
        $produto->nome          = $request->nome       ;
        $produto->quantidade    = $request->quantidade     ;
        $produto->preco         = $request->preco ;
        $produto->save();

        return redirect()->route('produto.index')->with('status', 'Produto criado com sucesso');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $produto = Produto::find($id);
        dd($produto);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $produto = Produto::find($id);
        $produto->nome = 'Água Sanitária';
        $produto->quantidade = 90;
        $produto->preco = 7.4;
        $produto->save();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produto = Produto::find($id);
        $produto->delete();

    }
}
