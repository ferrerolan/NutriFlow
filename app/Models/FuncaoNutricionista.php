<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FuncaoNutricionista extends Model  // ✅ correto, igual ao nome do arquivo
{
    protected $fillable = ['FuncaoNutricionista', 'descricao'];
}
