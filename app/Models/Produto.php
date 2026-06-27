<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = [
        'nome',
        'preco',
        'descricao'
    ];

    protected function casts(): array
    {
        return [
            'preco' => 'decimal:2',
        ];
    }
}
