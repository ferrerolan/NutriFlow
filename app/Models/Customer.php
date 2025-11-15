<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'telefone',
        'sexo',
        'data_nascimento',
        'peso',
        'altura',
        'observacoes',
        'status', // se o campo existir na tabela
    ];
}
