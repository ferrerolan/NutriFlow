<?php

namespace App\Filament\Resources\FuncaoNutricionistaResource\Pages;

use App\Filament\Resources\FuncaoNutricionistaResource;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateFuncaoNutricionista extends CreateRecord
{
    protected static string $resource = FuncaoNutricionistaResource::class;

    protected static ?string $title = 'Cadastrar Nova Função';

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['status'] = $data['status'] ?? 'ativo';
        $data['nivel_acesso'] = $data['nivel_acesso'] ?? 'operacional';

        return $data;
    }

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->title('Função cadastrada com sucesso! 🎉')
            ->body('A função foi adicionada à estrutura do nutricionista.')
            ->success();
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
