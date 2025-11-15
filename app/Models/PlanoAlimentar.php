<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlanoAlimentar extends Model
{
    protected $fillable = ['paciente_id', 'data_inicio', 'data_fim', 'objetivo'];

    public function refeicoes()
    {
        return $this->hasMany(Refeicao::class);
    }

    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }
}
