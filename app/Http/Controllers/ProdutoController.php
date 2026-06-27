<?php

namespace App\Http\Controllers;

use App\Services\Interfaces\ProdutoServiceInterface;
use App\Http\Requests\StoreProdutoRequest;
use App\Http\Requests\UpdateProdutoRequest;

class ProdutoController extends Controller
{
    public function __construct(
        protected ProdutoServiceInterface $service
    ){}
    
    public function index()
    {
        $search = request('search');

        $produtos = $this->service->listarTodos($search);

        return view('produtos.index', compact('produtos'));
    }

    public function create()
    {
        return view('produtos.create');
    }

    public function store(StoreProdutoRequest $request)
    {
        $this->service->criar($request->validated());

        return redirect()
            ->route('produtos.create')
            ->with('success', 'Produto criado com sucesso!');
    }

    public function show(string $id)
    {
        
    }

    public function edit(int $id)
    {
        $produto = $this->service->buscarPorId($id);

        return view('produtos.edit', compact('produto'));
    }

    public function update(UpdateProdutoRequest $request, int $id)
    {
        $this->service->atualizar($id, $request->validated());

        return redirect()
            ->route('produtos.index')
            ->with('success', 'Produto atualizado com sucesso!');
    }

    public function destroy(int $id)
    {
        $this->service->deletar($id);

        return redirect()
            ->route('produtos.index')
            ->with('success', 'Produto excluído com sucesso!');
    }
}
