<?php

namespace App\Repositories\Interfaces;

interface ProdutoRepositoryInterface
{
    public function all(?string $search = null, string $sort = 'nome');
    public function create(array $data);
    public function update(int $id, array $data);
    public function delete(int $id);
}