<?php

namespace App\Repositories;

use App\Models\Produto;
use App\Repositories\Interfaces\ProdutoRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class ProdutoRepository implements ProdutoRepositoryInterface
{
    public function all(?string $search = null, string $sort = 'nome'): LengthAwarePaginator
    {
        return Produto::when($search, function ($query, $search) {
            $query->where('nome', 'like', "%{$search}%");
        })
        ->orderBy($sort)
        ->paginate(10);
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
