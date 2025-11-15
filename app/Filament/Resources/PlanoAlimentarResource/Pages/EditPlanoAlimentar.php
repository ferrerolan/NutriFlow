<?php

namespace App\Filament\Resources\PlanoAlimentarResource\Pages;

use App\Filament\Resources\PlanoAlimentarResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPlanoAlimentar extends EditRecord
{
    protected static string $resource = PlanoAlimentarResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
