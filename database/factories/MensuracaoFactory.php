<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mensuracao>
 */
class MensuracaoFactory extends Factory
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
            'data_medicao' => now()->subDays(rand(1, 90)),
            'peso' => rand(60, 110),
            'altura' => rand(150, 190) / 100,
            'circunferencia_cintura' => rand(70, 110),
            'circunferencia_quadril' => rand(80, 120),
            'observacoes' => fake('pt_BR')->sentence(),
        ];
    }
}
