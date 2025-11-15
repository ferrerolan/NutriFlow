<?php

namespace App\Filament\Resources\FuncaoNutricionistaResource\Pages;

use App\Filament\Resources\FuncaoNutricionistaResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditFuncaoNutricionista extends EditRecord
{
    protected static string $resource = FuncaoNutricionistaResource::class;

    protected static ?string $title = 'Editar Função';

    /**
     * Define as ações do cabeçalho (botões acima do formulário)
     */
    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->label('Excluir Função')
                ->visible(fn($record) => $record !== null) // evita o erro de null
                ->successNotification(
                    Notification::make()
                        ->title('Função removida com sucesso 🗑️')
                        ->success()
                ),
        ];
    }

    /**
     * Notificação de sucesso após salvar a edição
     */
    protected function getSavedNotification(): ?Notification
    {
        return Notification::make()
            ->title('Função atualizada com sucesso! ✅')
            ->body('As alterações foram salvas e já estão disponíveis na listagem.')
            ->success();
    }

    /**
     * Redireciona para a listagem após editar ou excluir
     */
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
