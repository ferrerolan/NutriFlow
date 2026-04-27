<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Refeicao extends Model
{
    use HasFactory;

    protected $fillable = [
        'plano_alimentar_id',
        'titulo',
        'tipo',
        'horario',
        'descricao',
        'calorias',
        'observacoes',
    ];

    public function planoAlimentar()
    {
        return $this->belongsTo(PlanoAlimentar::class);
    }
}
