<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('mensuracaos', function (Blueprint $table) {
            if (! Schema::hasColumn('mensuracaos', 'data_medicao')) {
                $table->dateTime('data_medicao')->nullable()->after('paciente_id');
            }
        });
    }

    public function down(): void
    {
        Schema::table('mensuracaos', function (Blueprint $table) {
            $table->dropColumn('data_medicao');
        });
    }
};
