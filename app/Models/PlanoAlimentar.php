<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PlanoAlimentar extends Model
{
    use HasFactory;

    protected $fillable = [
        'paciente_id',
        'titulo',
        'objetivo',
        'data_inicio',
        'data_fim',
        'observacoes',
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

    public function refeicoes()
    {
        return $this->hasMany(Refeicao::class);
    }
}
