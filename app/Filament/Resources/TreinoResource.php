<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TreinoResource\Pages;
use App\Filament\Resources\TreinoResource\RelationManagers;
use App\Models\Treino;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TreinoResource extends Resource
{
    protected static ?string $model = Treino::class;

    protected static ?string $navigationGroup = 'Acompanhamento';
    protected static ?string $navigationLabel = 'Treinos';
    protected static ?string $modelLabel = 'Treino';
    protected static ?string $pluralModelLabel = 'Treinos';
    protected static ?string $navigationIcon = 'heroicon-o-bolt';
    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Informações do Treino')
                ->schema([
                    Forms\Components\Select::make('paciente_id')
                        ->relationship('paciente', 'nome')
                        ->searchable()
                        ->preload()
                        ->required(),

                    Forms\Components\TextInput::make('titulo')
                        ->label('Título')
                        ->placeholder('Ex: Treino inicial'),

                    Forms\Components\Select::make('frequencia_semanal')
                        ->label('Frequência semanal')
                        ->options([
                            '1x' => '1x por semana',
                            '2x' => '2x por semana',
                            '3x' => '3x por semana',
                            '4x' => '4x por semana',
                            '5x' => '5x por semana',
                            '6x' => '6x por semana',
                        ]),

                    Forms\Components\Select::make('intensidade')
                        ->options([
                            'leve' => 'Leve',
                            'moderada' => 'Moderada',
                            'intensa' => 'Intensa',
                        ]),

                    Forms\Components\Select::make('status')
                        ->options([
                            'ativo' => 'Ativo',
                            'pausado' => 'Pausado',
                            'finalizado' => 'Finalizado',
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

            Forms\Components\Textarea::make('descricao')
                ->label('Descrição do treino')
                ->rows(5),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('titulo')
                    ->label('Treino')
                    ->searchable(),

                Tables\Columns\TextColumn::make('paciente.nome')
                    ->label('Paciente')
                    ->searchable(),

                Tables\Columns\TextColumn::make('frequencia_semanal')
                    ->label('Frequência'),

                Tables\Columns\TextColumn::make('intensidade'),

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
            'index' => Pages\ListTreinos::route('/'),
            'create' => Pages\CreateTreino::route('/create'),
            'edit' => Pages\EditTreino::route('/{record}/edit'),
        ];
    }
}
