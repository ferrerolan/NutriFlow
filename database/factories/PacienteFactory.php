<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PacienteFactory extends Factory
{
    public function definition(): array
    {
        $faker = fake('pt_BR');

        return [
            //'tenant_id' => 1,
            'nome' => $faker->name(),
            'email' => $faker->unique()->safeEmail(),
            'telefone' => $faker->cellphoneNumber(),
            'data_nascimento' => $faker->date(),
            'objetivo' => $faker->randomElement([
                'Perda de peso',
                'Ganho de massa muscular',
                'Reeducação alimentar',
                'Melhora da saúde',
            ]),
            'observacoes' => $faker->sentence(),
            'status' => $faker->randomElement(['ativo', 'em_acompanhamento']),
        ];
    }
}
