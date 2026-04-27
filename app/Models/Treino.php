<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Treino extends Model
{
    use HasFactory;

    protected $fillable = [
        'paciente_id',
        'titulo',
        'descricao',
        'frequencia_semanal',
        'intensidade',
        'data_inicio',
        'data_fim',
        'status',
    ];

    protected $casts = [
        'data_inicio' => 'date',
        'data_fim' => 'date',
    ];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }
}
