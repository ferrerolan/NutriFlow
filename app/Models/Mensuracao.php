<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mensuracao extends Model
{
    protected $fillable = ['paciente_id', 'data_medicao', 'peso', 'altura', 'circunferencia_cintura', 'circunferencia_quadril'];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }
}
