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
        Schema::table('plano_alimentars', function (Blueprint $table) {
            if (! Schema::hasColumn('plano_alimentars', 'titulo')) {
                $table->string('titulo')->nullable();
            }

            if (! Schema::hasColumn('plano_alimentars', 'objetivo')) {
                $table->text('objetivo')->nullable();
            }

            if (! Schema::hasColumn('plano_alimentars', 'data_inicio')) {
                $table->date('data_inicio')->nullable();
            }

            if (! Schema::hasColumn('plano_alimentars', 'data_fim')) {
                $table->date('data_fim')->nullable();
            }

            if (! Schema::hasColumn('plano_alimentars', 'status')) {
                $table->string('status')->default('ativo');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('plano_alimentars', function (Blueprint $table) {
            //
        });
    }
};
