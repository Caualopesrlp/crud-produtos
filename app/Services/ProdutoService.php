<?php

namespace App\Services;

use App\Models\Produto;
use App\Repositories\Interfaces\ProdutoRepositoryInterface;
use App\Services\Interfaces\ProdutoServiceInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class ProdutoService implements ProdutoServiceInterface
{
    public function __construct(
        protected ProdutoRepositoryInterface $repository
    ) {}

    public function listarTodos(?string $search = null): LengthAwarePaginator
    {
        return $this->repository->all($search);
    }

    public function criar(array $data): Produto
    {
        return $this->repository->create($data);
    }

    public function atualizar(int $id, array $data): Produto
    {
        return $this->repository->update($id, $data);
    }

    public function deletar(int $id): int
    {
        return $this->repository->delete($id);
    }

    public function buscarPorId(int $id): Produto
    {
        return $this->repository->find($id);
    }
}
