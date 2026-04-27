<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PlanoAlimentarResource\Pages;
use App\Filament\Resources\PlanoAlimentarResource\RelationManagers;
use App\Models\PlanoAlimentar;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PlanoAlimentarResource extends Resource
{
    protected static ?string $model = PlanoAlimentar::class;

    protected static ?string $navigationGroup = 'Plano Nutricional';
    protected static ?string $navigationLabel = 'Planos Alimentares';
    protected static ?string $modelLabel = 'Plano Alimentar';
    protected static ?string $pluralModelLabel = 'Planos Alimentares';
    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Informações do Plano')
                ->schema([
                    Forms\Components\Select::make('paciente_id')
                        ->relationship('paciente', 'nome')
                        ->searchable()
                        ->preload()
                        ->required(),

                    Forms\Components\TextInput::make('titulo')
                        ->label('Título do plano')
                        ->placeholder('Ex: Plano de emagrecimento'),

                    Forms\Components\TextInput::make('objetivo')
                        ->label('Objetivo'),

                    Forms\Components\Select::make('status')
                        ->options([
                            'ativo' => 'Ativo',
                            'finalizado' => 'Finalizado',
                            'pausado' => 'Pausado',
                        ])
                        ->default('ativo'),
                ])
                ->columns(2),

            Forms\Components\Section::make('Período')
                ->schema([
                    Forms\Components\DatePicker::make('data_inicio')
                        ->label('Data inicial'),

                    Forms\Components\DatePicker::make('data_fim')
                        ->label('Data final'),
                ])
                ->columns(2),

            Forms\Components\Textarea::make('observacoes')
                ->label('Observações do plano')
                ->rows(4),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('titulo')
                    ->label('Plano')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('paciente.nome')
                    ->label('Paciente')
                    ->searchable(),

                Tables\Columns\TextColumn::make('objetivo')
                    ->limit(40),

                Tables\Columns\TextColumn::make('data_inicio')
                    ->date('d/m/Y'),

                Tables\Columns\TextColumn::make('data_fim')
                    ->date('d/m/Y'),

                Tables\Columns\BadgeColumn::make('status')
                    ->colors([
                        'success' => 'ativo',
                        'warning' => 'pausado',
                        'danger' => 'finalizado',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPlanoAlimentars::route('/'),
            'create' => Pages\CreatePlanoAlimentar::route('/create'),
            'edit' => Pages\EditPlanoAlimentar::route('/{record}/edit'),
        ];
    }
}
