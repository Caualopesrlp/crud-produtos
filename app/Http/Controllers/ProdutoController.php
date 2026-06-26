<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Interfaces\ProdutoServiceInterface;
use App\Http\Requests\StoreProdutoRequest;
use App\Http\Requests\UpdateProdutoRequest;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ProdutoServiceInterface $service)
    {
        $produtos = $service->listarTodos();

        return view('produtos.index', compact('produtos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('produtos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProdutoRequest $request, ProdutoServiceInterface $service)
{
    $service->criar($request->validated());

    return redirect()
        ->route('produtos.create')
        ->with('success', 'Produto criado com sucesso!');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id, ProdutoServiceInterface $service)
    {
        $produto = $service->buscarPorId($id);

        return view('produtos.edit', compact('produto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProdutoRequest $request, int $id, ProdutoServiceInterface $service)
    {
        $service->atualizar($id, $request->validated());

        return redirect()
        ->route('produtos.index')
        ->with('success', 'Produto atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id, ProdutoServiceInterface $service)
    {
        $service->deletar($id);

        return redirect()
        ->route('produtos.index')
        ->with('success', 'Produto excluído com sucesso!');
    }
}
