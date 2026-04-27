<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FuncaoNutricionista extends Model
{
    protected $fillable = [
        'FuncaoNutricionista',
        'nome',
        'descricao',
        'nivel_acesso',
        'status',
    ];
}
