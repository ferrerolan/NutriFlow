<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    protected $fillable = ['nome', 'email', 'telefone'];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function pacientes()
    {
        return $this->hasMany(Paciente::class);
    }
}
