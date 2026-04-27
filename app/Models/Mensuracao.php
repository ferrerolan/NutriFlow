<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mensuracao extends Model
{
    use HasFactory;

    protected $fillable = [
        'paciente_id',
        'data_medicao',
        'peso',
        'altura',
        'circunferencia_cintura',
        'circunferencia_quadril',
        'observacoes',
    ];

    protected $casts = [
        'data_medicao' => 'date',
    ];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }
}
