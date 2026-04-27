<?php

namespace Database\Seeders;

use App\Models\FuncaoNutricionista;
use App\Models\Mensuracao;
use App\Models\Paciente;
use App\Models\PlanoAlimentar;
use App\Models\Refeicao;
use App\Models\Tenant;
use App\Models\Treino;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $tenant = Tenant::firstOrCreate([
            'name' => 'Clínica NutriFlow Demo',
        ], [
            'domain' => 'demo.local',
            'plan_type' => 'demo',
            'active_until' => now()->addYear(),
        ]);

        User::factory()->create([
            'name' => 'Administrador',
            'email' => 'admin@nutriflow.local',
            'password' => Hash::make('12345678'),
        ]);

        FuncaoNutricionista::create([
            'FuncaoNutricionista' => 'Nutricionista Responsável',
            'nome' => 'Nutricionista Responsável',
            'descricao' => 'Profissional responsável pelo acompanhamento nutricional dos pacientes.',
            'nivel_acesso' => 'nutricionista',
            'status' => 'ativo',
        ]);

        Paciente::factory(10)
            ->create([
                'tenant_id' => $tenant->id,
            ])
            ->each(function (Paciente $paciente) {
                Mensuracao::factory(3)->create([
                    'paciente_id' => $paciente->id,
                ]);

                Treino::factory(1)->create([
                    'paciente_id' => $paciente->id,
                ]);

                PlanoAlimentar::factory(1)
                    ->create([
                        'paciente_id' => $paciente->id,
                    ])
                    ->each(function (PlanoAlimentar $plano) {
                        Refeicao::factory(4)->create([
                            'plano_alimentar_id' => $plano->id,
                        ]);
                    });
            });
    }
}
