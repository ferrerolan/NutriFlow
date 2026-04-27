<?php

namespace App\Filament\Resources\FuncaoNutricionistaResource\Pages;

use App\Filament\Resources\FuncaoNutricionistaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFuncaoNutricionistas extends ListRecords
{
    protected static string $resource = FuncaoNutricionistaResource::class;

    protected static ?string $title = 'Funções do Nutricionista';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Nova Função')
                ->icon('heroicon-o-plus')
                ->color('success'),
        ];
    }
}
