<?php

namespace App\Filament\Resources\PacienteResource\Pages;

use App\Filament\Resources\PacienteResource;
use App\Models\Tenant;
use Filament\Resources\Pages\CreateRecord;

class CreatePaciente extends CreateRecord
{
    protected static string $resource = PacienteResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $tenant = Tenant::firstOrCreate([
            'name' => 'Nutricionista Demo',
        ], [
            'domain' => 'demo.local',
            'plan_type' => 'demo',
            'active_until' => now()->addYear(),
        ]);

        $data['tenant_id'] = $tenant->id;

        return $data;
    }
}
