<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FuncaoNutricionistaResource\Pages;
use App\Models\FuncaoNutricionista;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class FuncaoNutricionistaResource extends Resource
{
    protected static ?string $model = FuncaoNutricionista::class;
    protected static ?string $navigationIcon = 'heroicon-o-briefcase';
    protected static ?string $navigationGroup = 'Nutricionista';
    protected static ?string $navigationLabel = 'Funções';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('nome')
                ->label('Nome da Função')
                ->required()
                ->maxLength(100),
            Forms\Components\Textarea::make('descricao')
                ->label('Descrição')
                ->maxLength(500),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->sortable(),
                Tables\Columns\TextColumn::make('nome')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('descricao')->limit(50),
                Tables\Columns\TextColumn::make('created_at')->label('Criado em')->dateTime('d/m/Y H:i'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFuncaoNutricionistas::route('/'),
            'create' => Pages\CreateFuncaoNutricionista::route('/create'),
            'edit' => Pages\EditFuncaoNutricionista::route('/{record}/edit'),
        ];
    }
}
