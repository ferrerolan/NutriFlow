<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PlanoAlimentar>
 */
class PlanoAlimentarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'paciente_id' => \App\Models\Paciente::inRandomOrder()->first()->id,
            'titulo' => fake('pt_BR')->randomElement([
                'Plano de Emagrecimento',
                'Plano de Hipertrofia',
                'Plano Low Carb',
            ]),
            'objetivo' => fake('pt_BR')->sentence(),
            'data_inicio' => now()->subDays(10),
            'data_fim' => now()->addDays(30),
            'status' => 'ativo',
        ];
    }
}
