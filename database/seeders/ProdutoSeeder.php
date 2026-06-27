<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Produto;


class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 15; $i++) {
            Produto::create([
                'nome' => "Produto $i",
                'preco' => rand(10, 500),
                'descricao' => "Descrição do produto $i"
            ]);
        }
    }
}
