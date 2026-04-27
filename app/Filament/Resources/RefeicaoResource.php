<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RefeicaoResource\Pages;
use App\Filament\Resources\RefeicaoResource\RelationManagers;
use App\Models\Refeicao;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RefeicaoResource extends Resource
{
    protected static ?string $model = Refeicao::class;

    protected static ?string $navigationGroup = 'Plano Nutricional';
    protected static ?string $navigationLabel = 'Refeições';
    protected static ?string $modelLabel = 'Refeição';
    protected static ?string $pluralModelLabel = 'Refeições';
    protected static ?string $navigationIcon = 'heroicon-o-cake';
    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Informações da Refeição')
                ->schema([
                    Forms\Components\Select::make('plano_alimentar_id')
                        ->relationship('planoAlimentar', 'titulo')
                        ->searchable()
                        ->preload()
                        ->required(),

                    Forms\Components\TextInput::make('titulo')
                        ->label('Título')
                        ->placeholder('Ex: Café da manhã'),

                    Forms\Components\Select::make('tipo')
                        ->options([
                            'cafe_manha' => 'Café da manhã',
                            'lanche_manha' => 'Lanche da manhã',
                            'almoco' => 'Almoço',
                            'lanche_tarde' => 'Lanche da tarde',
                            'jantar' => 'Jantar',
                            'ceia' => 'Ceia',
                        ]),

                    Forms\Components\TimePicker::make('horario')
                        ->label('Horário sugerido'),

                    Forms\Components\TextInput::make('calorias')
                        ->numeric()
                        ->suffix('kcal'),
                ])
                ->columns(2),

            Forms\Components\Textarea::make('descricao')
                ->label('Descrição da refeição')
                ->rows(5)
                ->required(),

            Forms\Components\Textarea::make('observacoes')
                ->label('Observações')
                ->rows(3),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('titulo')
                    ->label('Refeição')
                    ->searchable(),

                Tables\Columns\TextColumn::make('planoAlimentar.titulo')
                    ->label('Plano'),

                Tables\Columns\TextColumn::make('tipo')
                    ->label('Tipo'),

                Tables\Columns\TextColumn::make('horario')
                    ->label('Horário'),

                Tables\Columns\TextColumn::make('calorias')
                    ->suffix(' kcal'),

                Tables\Columns\TextColumn::make('descricao')
                    ->limit(40),
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
            'index' => Pages\ListRefeicaos::route('/'),
            'create' => Pages\CreateRefeicao::route('/create'),
            'edit' => Pages\EditRefeicao::route('/{record}/edit'),
        ];
    }
}
