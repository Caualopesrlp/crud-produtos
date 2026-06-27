<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use App\Models\Produto;
use App\Repositories\Interfaces\ProdutoRepositoryInterface;

class ProdutoRepository implements ProdutoRepositoryInterface
{
    public function all(): Collection
    {
        return Produto::all();
    }

    public function create(array $data): Produto
    {
        return Produto::create($data);
    }

    public function update(int $id, array $data): Produto
    {
        $produto = Produto::findOrFail($id);
        $produto->update($data);

        return $produto;
    }

    public function delete(int $id): int
    {
        return Produto::destroy($id);
    }

    public function find(int $id): Produto
    {
        return Produto::findOrFail($id);
    }
}
