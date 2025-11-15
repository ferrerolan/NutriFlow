<?php

namespace App\Filament\Resources\MensuracaoResource\Pages;

use App\Filament\Resources\MensuracaoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMensuracao extends EditRecord
{
    protected static string $resource = MensuracaoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
