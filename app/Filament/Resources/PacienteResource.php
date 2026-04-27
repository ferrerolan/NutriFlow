<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PacienteResource\Pages;
use App\Filament\Resources\PacienteResource\RelationManagers\MensuracoesRelationManager;
use App\Filament\Resources\PacienteResource\RelationManagers\PlanosAlimentaresRelationManager;
use App\Filament\Resources\PacienteResource\RelationManagers\TreinosRelationManager;
use App\Models\Paciente;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PacienteResource extends Resource
{
    protected static ?string $model = Paciente::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationGroup = 'Gestão Nutricional';
    protected static ?string $navigationLabel = 'Pacientes';
    protected static ?string $modelLabel = 'Paciente';
    protected static ?string $pluralModelLabel = 'Pacientes';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Dados do Paciente')
                ->description('Informações principais para identificação e contato.')
                ->icon('heroicon-o-user')
                ->schema([
                    Forms\Components\TextInput::make('nome')
                        ->label('Nome completo')
                        ->required()
                        ->maxLength(255),

                    Forms\Components\TextInput::make('email')
                        ->label('E-mail')
                        ->email()
                        ->maxLength(255),

                    Forms\Components\TextInput::make('telefone')
                        ->label('Telefone / WhatsApp')
                        ->tel()
                        ->maxLength(30),

                    Forms\Components\DatePicker::make('data_nascimento')
                        ->label('Data de nascimento')
                        ->native(false)
                        ->displayFormat('d/m/Y'),

                    Forms\Components\Select::make('status')
                        ->label('Status do acompanhamento')
                        ->options([
                            'ativo' => 'Ativo',
                            'em_acompanhamento' => 'Em acompanhamento',
                            'inativo' => 'Inativo',
                        ])
                        ->default('ativo')
                        ->required(),
                ])
                ->columns(2),

            Forms\Components\Section::make('Objetivo Nutricional')
                ->description('Base estratégica para plano alimentar, mensurações, treinos e futuro bot.')
                ->icon('heroicon-o-sparkles')
                ->schema([
                    Forms\Components\TextInput::make('objetivo')
                        ->label('Objetivo principal')
                        ->placeholder('Ex: Perda de peso, ganho de massa, reeducação alimentar')
                        ->maxLength(255),

                    Forms\Components\Textarea::make('observacoes')
                        ->label('Observações clínicas')
                        ->placeholder('Ex: restrições alimentares, rotina, preferências, histórico relevante...')
                        ->rows(5)
                        ->columnSpanFull(),
                ])
                ->columns(1),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                Tables\Columns\TextColumn::make('nome')
                    ->label('Paciente')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('email')
                    ->label('E-mail')
                    ->searchable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('telefone')
                    ->label('WhatsApp')
                    ->searchable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('objetivo')
                    ->label('Objetivo')
                    ->limit(35)
                    ->placeholder('Não informado'),

                Tables\Columns\BadgeColumn::make('status')
                    ->label('Status')
                    ->colors([
                        'success' => 'ativo',
                        'warning' => 'em_acompanhamento',
                        'danger' => 'inativo',
                    ])
                    ->formatStateUsing(fn(?string $state): string => match ($state) {
                        'ativo' => 'Ativo',
                        'em_acompanhamento' => 'Em acompanhamento',
                        'inativo' => 'Inativo',
                        default => 'Não informado',
                    }),

                Tables\Columns\TextColumn::make('mensuracoes_count')
                    ->label('Mensurações')
                    ->counts('mensuracoes')
                    ->sortable(),

                Tables\Columns\TextColumn::make('planos_alimentares_count')
                    ->label('Planos')
                    ->counts('planosAlimentares')
                    ->sortable(),

                Tables\Columns\TextColumn::make('treinos_count')
                    ->label('Treinos')
                    ->counts('treinos')
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Criado em')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->label('Status')
                    ->options([
                        'ativo' => 'Ativo',
                        'em_acompanhamento' => 'Em acompanhamento',
                        'inativo' => 'Inativo',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->label('Visão 360')
                    ->icon('heroicon-o-eye'),

                Tables\Actions\DeleteAction::make()
                    ->label('Excluir'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->label('Excluir selecionados'),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            MensuracoesRelationManager::class,
            PlanosAlimentaresRelationManager::class,
            TreinosRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPacientes::route('/'),
            'create' => Pages\CreatePaciente::route('/create'),
            'edit' => Pages\EditPaciente::route('/{record}/edit'),
        ];
    }
}
