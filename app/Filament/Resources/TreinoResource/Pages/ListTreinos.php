<?php

namespace App\Filament\Resources\TreinoResource\Pages;

use App\Filament\Resources\TreinoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTreinos extends ListRecords
{
    protected static string $resource = TreinoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
