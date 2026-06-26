<?php

namespace App\Services\Interfaces;

interface ProdutoServiceInterface
{
    public function listarTodos();
    public function criar(array $data);
    public function atualizar(int $id, array $data);
    public function deletar(int $id);
}
