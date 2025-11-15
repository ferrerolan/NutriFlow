<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('refeicaos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('plano_alimentar_id')->constrained();
            $table->time('horario')->nullable();
            $table->json('alimentos')->nullable();
            $table->text('observacoes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('refeicaos');
    }
};
