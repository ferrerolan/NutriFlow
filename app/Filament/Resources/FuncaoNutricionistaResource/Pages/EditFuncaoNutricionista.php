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

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['status'] = $data['status'] ?? 'ativo';
        $data['nivel_acesso'] = $data['nivel_acesso'] ?? 'operacional';

        return $data;
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->label('Excluir Função')
                ->modalHeading('Excluir função')
                ->modalDescription('Tem certeza que deseja excluir esta função? Essa ação não poderá ser desfeita.')
                ->modalSubmitActionLabel('Sim, excluir')
                ->successNotification(
                    Notification::make()
                        ->title('Função removida com sucesso 🗑️')
                        ->body('A função foi removida da estrutura do NutriFlow.')
                        ->success()
                ),
        ];
    }

    protected function getSavedNotification(): ?Notification
    {
        return Notification::make()
            ->title('Função atualizada com sucesso! ✅')
            ->body('As alterações foram salvas e já estão disponíveis no sistema.')
            ->success();
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
