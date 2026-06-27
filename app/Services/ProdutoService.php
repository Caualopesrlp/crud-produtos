<?php

namespace App\Services;

use App\Models\Produto;
use App\Services\Interfaces\ProdutoServiceInterface;
use App\Repositories\Interfaces\ProdutoRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class ProdutoService implements ProdutoServiceInterface
{
    public function __construct(
        protected ProdutoRepositoryInterface $repository
    ) {}

    public function listarTodos(): Collection
    {
        return $this->repository->all();
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
