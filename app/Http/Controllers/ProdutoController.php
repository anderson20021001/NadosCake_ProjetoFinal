<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Categoria;


class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //dd('Produto');
        $produtos = Produto::orderBy('nome')->get();
        return view('produto.produto_index', ['produtos' => $produtos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::OrderBy('nome','ASC')->get(); //pluck('nome', 'id' );
        //dd($categorias);
        return view ('produto.produto_create' , ['categorias' => $categorias]);


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
            'categoria_id'  => 'required',
            'nome'          => 'required|min:5',
            'quantidade'    => 'required|integer',
            'preco'         => 'required',
        ], $messages);

        $produto = new Produto();
        $produto->categoria_id  = $request->categoria_id;
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
        //dd($produto);
        return view('produto.produto_show', ['produto'=> $produto]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $produto = Produto::find($id);
        $categorias = Categoria::OrderBy('nome','ASC')->get();
       return view('produto.produto_edit' , ['produto' => $produto, 'categorias' => '$categorias']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages = [
            'nome.required' => 'O :attribute é obrigatório!',
            'quantidade.required' => 'O :attribute é obrigatório!',
            'preco.required' => 'O :attribute é obrigatório!',
            'categoria_id.required' => 'O :attribute é obrigatório!',

             ];


        $Validated = $request->validate([
            'nome'          => 'required|min:5',
            'quantidade'    => 'required',
            'preco'         => 'required',
        ], $messages);

        $produto = Produto::find($id);
        $produto->nome                = $request->nome;
        $produto->quantidade          = $request->quantidade;
        $produto->preco               = $request->preco;
        $produto->save();    
        
        return direct()->route('produto.index')->with('status', 'Produto alterado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produto = Produto::find($id);
        $produto->delete();
        return redirect()->route('produto.index')->with('status', 'Produto excluido com sucesso');

    }
}
