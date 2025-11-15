<?php

namespace App\Filament\Resources\MensuracaoResource\Pages;

use App\Filament\Resources\MensuracaoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMensuracaos extends ListRecords
{
    protected static string $resource = MensuracaoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
