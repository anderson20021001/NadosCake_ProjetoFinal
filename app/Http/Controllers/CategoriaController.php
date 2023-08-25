<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //dd('Categorias');
        $categorias = Categoria::orderBy('nome')->get();
        return view('categoria.categoria_index', ['categorias' => $categorias]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view ('categoria.categoria_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
            'nome.required' => 'O :attribute é obrigatório!',
             ];


        $Validated = $request->validate([
            'nome'          => 'required|min:5',
        ], $messages);

        $categoria = new Categoria();
        $categoria->nome          = $request->nome;
        $categoria->save();

        return redirect()->route('categoria.index')->with('status', 'Categoria criada com sucesso');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $categoria = Categoria::find($id);
        //dd($Categorias);
        return view('categoria.categoria_show', ['categoria'=> $categoria]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categoria = Categoria::find($id);
       return view('categoria.categoria_edit' , ['categoria' => $categoria]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages = [
            'nome.required' => 'O :attribute é obrigatório!',
             ];


        $Validated = $request->validate([
            'nome'          => 'required|min:5',
        ], $messages);

        $categoria = Categoria::find($id);
        $categoria->nome                = $request->nome;
        $categoria->save();    
        
        return redirect()->route('categoria.index')->with('status', 'Categorias alterado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categoria = Categoria::find($id);
        $categoria->delete();
        return redirect()->route('categoria.index')->with('status', 'Categorias excluido com sucesso');

    }
}
