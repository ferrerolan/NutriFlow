<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $fillable = ['tenant_id', 'nome', 'email', 'telefone', 'data_nascimento'];

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

    public function mensuracoes()
    {
        return $this->hasMany(Mensuracao::class);
    }

    public function planosAlimentares()
    {
        return $this->hasMany(PlanoAlimentar::class);
    }

    public function treinos()
    {
        return $this->hasMany(Treino::class);
    }
}
