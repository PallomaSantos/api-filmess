<?php

namespace App\Http\Controllers;

use App\Models\Filme;
use Illuminate\Http\Request;

class FilmeController extends Controller
{
    /**
     * 1. Listar todos os filmes (READ ALL)
     */
    public function index()
    {
        return Filme::all();
    }

    /**
     * 2. Criar um novo filme (CREATE)
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'diretor' => 'required|string|max:255',
            'ano_lancamento' => 'required|integer|min:1888',
            'genero' => 'required|string|max:100',
        ]);

        $filme = Filme::create($request->all());

        return response()->json($filme, 201);
    }

    /**
     * 3. Exibir um filme específico (READ ONE)
     */
    public function show(Filme $filme)
    {
        return $filme;
    }

    /**
     * 4. Atualizar um filme (UPDATE)
     */
    public function update(Request $request, Filme $filme)
    {
        $request->validate([
            'titulo' => 'string|max:255',
            'diretor' => 'string|max:255',
            'ano_lancamento' => 'integer|min:1888',
            'genero' => 'string|max:100',
        ]);

        $filme->update($request->all());

        return response()->json($filme, 200);
    }

    /**
     * 5. Deletar um filme (DELETE)
     */
    public function destroy(Filme $filme)
    {
        $filme->delete();

        return response()->json(['message' => 'Filme deletado com sucesso!'], 200);
    }
}