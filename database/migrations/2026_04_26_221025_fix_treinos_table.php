<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('treinos', function (Blueprint $table) {
            if (! Schema::hasColumn('treinos', 'titulo')) {
                $table->string('titulo')->nullable();
            }

            if (! Schema::hasColumn('treinos', 'descricao')) {
                $table->text('descricao')->nullable();
            }

            if (! Schema::hasColumn('treinos', 'frequencia_semanal')) {
                $table->string('frequencia_semanal')->nullable();
            }

            if (! Schema::hasColumn('treinos', 'intensidade')) {
                $table->string('intensidade')->nullable();
            }

            if (! Schema::hasColumn('treinos', 'data_inicio')) {
                $table->date('data_inicio')->nullable();
            }

            if (! Schema::hasColumn('treinos', 'data_fim')) {
                $table->date('data_fim')->nullable();
            }

            if (! Schema::hasColumn('treinos', 'status')) {
                $table->string('status')->default('ativo');
            }
        });
    }

    public function down(): void
    {
        //
    }
};
