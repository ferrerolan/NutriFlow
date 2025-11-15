<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    protected $model = Customer::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'telefone' => $this->faker->phoneNumber(),
            'sexo' => $this->faker->randomElement(['Masculino', 'Feminino']),
            'data_nascimento' => $this->faker->date(),
            'peso' => $this->faker->randomFloat(2, 50, 120),
            'altura' => $this->faker->randomFloat(2, 1.5, 2.0),
            'observacoes' => $this->faker->sentence(),
            'status' => $this->faker->randomElement(['critico', 'regular', 'avancado']),
        ];
    }
}
