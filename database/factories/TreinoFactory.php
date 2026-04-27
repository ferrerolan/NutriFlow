<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Treino>
 */
class TreinoFactory extends Factory
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
            'titulo' => 'Treino ' . fake()->randomLetter(),
            'descricao' => fake('pt_BR')->sentence(),
            'frequencia_semanal' => rand(2, 5) . 'x',
            'intensidade' => fake()->randomElement(['leve', 'moderada', 'intensa']),
            'data_inicio' => now()->subDays(10),
            'data_fim' => now()->addDays(30),
            'status' => 'ativo',
        ];
    }
}
