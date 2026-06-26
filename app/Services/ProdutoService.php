<?php

namespace App\Services;

use App\Services\Interfaces\ProdutoServiceInterface;
use App\Repositories\Interfaces\ProdutoRepositoryInterface;

class ProdutoService implements ProdutoServiceInterface
{
    public function __construct(
        protected ProdutoRepositoryInterface $repository
    ) {}

    public function listarTodos()
    {
        return $this->repository->all();
    }

    public function criar(array $data)
    {
        return $this->repository->create($data);
    }

    public function atualizar(int $id, array $data)
    {
        return $this->repository->update($id, $data);
    }

    public function deletar(int $id)
    {
        return $this->repository->delete($id);
    }

    public function buscarPorId(int $id)
    {
        return $this->repository->find($id);
    }
}
