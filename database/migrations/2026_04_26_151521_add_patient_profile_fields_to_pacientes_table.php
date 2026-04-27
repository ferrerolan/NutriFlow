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
    }

    public function down(): void
    {
        Schema::table('pacientes', function (Blueprint $table) {
            $table->dropColumn([
                'email',
                'telefone',
                'data_nascimento',
                'objetivo',
                'observacoes',
                'status',
            ]);
        });
    }
};
