<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pacientes', function (Blueprint $table) {
            if (! Schema::hasColumn('pacientes', 'email')) {
                $table->string('email')->nullable()->after('nome');
            }

            if (! Schema::hasColumn('pacientes', 'telefone')) {
                $table->string('telefone')->nullable()->after('email');
            }

            if (! Schema::hasColumn('pacientes', 'data_nascimento')) {
                $table->date('data_nascimento')->nullable()->after('telefone');
            }

            if (! Schema::hasColumn('pacientes', 'objetivo')) {
                $table->string('objetivo')->nullable()->after('data_nascimento');
            }

            if (! Schema::hasColumn('pacientes', 'observacoes')) {
                $table->text('observacoes')->nullable()->after('objetivo');
            }

            if (! Schema::hasColumn('pacientes', 'status')) {
                $table->string('status')->default('ativo')->after('observacoes');
            }
        });

        Schema::table('mensuracaos', function (Blueprint $table) {
            if (! Schema::hasColumn('mensuracaos', 'observacoes')) {
                $table->text('observacoes')->nullable();
            }
        });

        Schema::table('plano_alimentars', function (Blueprint $table) {
            if (! Schema::hasColumn('plano_alimentars', 'titulo')) {
                $table->string('titulo')->nullable()->after('paciente_id');
            }

            if (! Schema::hasColumn('plano_alimentars', 'observacoes')) {
                $table->text('observacoes')->nullable();
            }

            if (! Schema::hasColumn('plano_alimentars', 'status')) {
                $table->string('status')->default('ativo');
            }
        });

        Schema::table('refeicaos', function (Blueprint $table) {
            if (! Schema::hasColumn('refeicaos', 'titulo')) {
                $table->string('titulo')->nullable()->after('plano_alimentar_id');
            }

            if (! Schema::hasColumn('refeicaos', 'tipo')) {
                $table->string('tipo')->nullable()->after('titulo');
            }

            if (! Schema::hasColumn('refeicaos', 'calorias')) {
                $table->integer('calorias')->nullable();
            }

            if (! Schema::hasColumn('refeicaos', 'observacoes')) {
                $table->text('observacoes')->nullable();
            }
        });

        Schema::table('treinos', function (Blueprint $table) {
            if (! Schema::hasColumn('treinos', 'titulo')) {
                $table->string('titulo')->nullable()->after('paciente_id');
            }

            if (! Schema::hasColumn('treinos', 'frequencia_semanal')) {
                $table->string('frequencia_semanal')->nullable();
            }

            if (! Schema::hasColumn('treinos', 'intensidade')) {
                $table->string('intensidade')->nullable();
            }

            if (! Schema::hasColumn('treinos', 'status')) {
                $table->string('status')->default('ativo');
            }
        });

        Schema::table('funcao_nutricionistas', function (Blueprint $table) {
            if (! Schema::hasColumn('funcao_nutricionistas', 'nivel_acesso')) {
                $table->string('nivel_acesso')->default('operacional');
            }

            if (! Schema::hasColumn('funcao_nutricionistas', 'status')) {
                $table->string('status')->default('ativo');
            }
        });
    }

    public function down(): void
    {
        //
    }
};
