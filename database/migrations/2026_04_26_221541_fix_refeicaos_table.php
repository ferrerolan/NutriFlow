<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('refeicaos', function (Blueprint $table) {

            if (! Schema::hasColumn('refeicaos', 'titulo')) {
                $table->string('titulo')->nullable();
            }

            if (! Schema::hasColumn('refeicaos', 'tipo')) {
                $table->string('tipo')->nullable();
            }

            if (! Schema::hasColumn('refeicaos', 'horario')) {
                $table->time('horario')->nullable();
            }

            if (! Schema::hasColumn('refeicaos', 'descricao')) {
                $table->text('descricao')->nullable();
            }

            if (! Schema::hasColumn('refeicaos', 'calorias')) {
                $table->integer('calorias')->nullable();
            }
        });
    }

    public function down(): void
    {
        //
    }
};
