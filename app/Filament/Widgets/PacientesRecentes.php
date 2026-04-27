<?php

namespace App\Filament\Widgets;

use App\Models\Paciente;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class PacientesRecentes extends BaseWidget
{
    protected static ?string $heading = 'Pacientes recentes';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Paciente::query()->latest()
            )
            ->columns([
                Tables\Columns\TextColumn::make('nome')
                    ->label('Paciente')
                    ->searchable(),

                Tables\Columns\TextColumn::make('email')
                    ->label('E-mail')
                    ->searchable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Cadastro')
                    ->dateTime('d/m/Y H:i'),
            ]);
    }
}
