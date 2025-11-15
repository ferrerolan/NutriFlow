<?php

namespace App\Filament\Resources\PlanoAlimentarResource\Pages;

use App\Filament\Resources\PlanoAlimentarResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPlanoAlimentars extends ListRecords
{
    protected static string $resource = PlanoAlimentarResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
