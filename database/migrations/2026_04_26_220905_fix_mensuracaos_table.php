<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('mensuracaos', function (Blueprint $table) {

            if (!Schema::hasColumn('mensuracaos', 'data_medicao')) {
                $table->dateTime('data_medicao')->nullable();
            }

            if (!Schema::hasColumn('mensuracaos', 'peso')) {
                $table->float('peso')->nullable();
            }

            if (!Schema::hasColumn('mensuracaos', 'altura')) {
                $table->float('altura')->nullable();
            }

            if (!Schema::hasColumn('mensuracaos', 'circunferencia_cintura')) {
                $table->float('circunferencia_cintura')->nullable();
            }

            if (!Schema::hasColumn('mensuracaos', 'circunferencia_quadril')) {
                $table->float('circunferencia_quadril')->nullable();
            }

            if (!Schema::hasColumn('mensuracaos', 'observacoes')) {
                $table->text('observacoes')->nullable();
            }
        });
    }

    public function down(): void
    {
        //
    }
};
