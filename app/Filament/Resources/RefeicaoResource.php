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

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
