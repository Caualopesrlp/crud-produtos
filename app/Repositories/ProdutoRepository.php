<?php

namespace App\Repositories;

use App\Models\Produto;
use App\Repositories\Interfaces\ProdutoRepositoryInterface;

class ProdutoRepository implements ProdutoRepositoryInterface
{
    public function all()
    {
        return Produto::all();
    }

    public function create(array $data)
    {
        return Produto::create($data);
    }

    public function update(int $id, array $data)
    {
        $produto = Produto::findOrFail($id);
        $produto->update($data);

        return $produto;
    }

    public function delete(int $id)
    {
        return Produto::destroy($id);
    }

    public function find(int $id)
    {
        return Produto::findOrFail($id);
    }
}
