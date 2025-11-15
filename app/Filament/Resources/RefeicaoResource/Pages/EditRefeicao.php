<?php

namespace App\Filament\Resources\RefeicaoResource\Pages;

use App\Filament\Resources\RefeicaoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRefeicao extends EditRecord
{
    protected static string $resource = RefeicaoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
