<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Refeicao extends Model
{
    protected $fillable = ['plano_alimentar_id', 'descricao', 'horario'];

    public function planoAlimentar()
    {
        return $this->belongsTo(PlanoAlimentar::class);
    }
}
