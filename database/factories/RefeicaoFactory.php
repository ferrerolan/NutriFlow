<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Refeicao>
 */
class RefeicaoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'plano_alimentar_id' => \App\Models\PlanoAlimentar::inRandomOrder()->first()->id,
            'titulo' => fake('pt_BR')->randomElement([
                'Café da manhã',
                'Almoço',
                'Jantar',
                'Lanche',
            ]),
            'tipo' => 'refeicao',
            'horario' => fake()->time(),
            'descricao' => fake('pt_BR')->sentence(8),
            'calorias' => rand(200, 800),
        ];
    }
}
