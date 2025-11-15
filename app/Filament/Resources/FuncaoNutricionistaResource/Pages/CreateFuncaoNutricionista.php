<?php

namespace App\Filament\Resources\FuncaoNutricionistaResource\Pages;

use App\Filament\Resources\FuncaoNutricionistaResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateFuncaoNutricionista extends CreateRecord
{
    protected static string $resource = FuncaoNutricionistaResource::class;

    protected static ?string $title = 'Cadastrar Nova Função';

    /**
     * Mensagem exibida após criação bem-sucedida.
     */
    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->title('Função cadastrada com sucesso! 🎉')
            ->body('A função foi adicionada à lista de cargos do nutricionista.')
            ->success();
    }

    /**
     * Após salvar, redireciona para a listagem principal.
     */
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
