<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Treino extends Model
{
    protected $fillable = ['paciente_id', 'descricao', 'data_inicio', 'data_fim'];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }
}
