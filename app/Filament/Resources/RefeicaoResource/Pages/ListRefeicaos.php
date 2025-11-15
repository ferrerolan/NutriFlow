<?php

namespace App\Filament\Resources\RefeicaoResource\Pages;

use App\Filament\Resources\RefeicaoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRefeicaos extends ListRecords
{
    protected static string $resource = RefeicaoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
