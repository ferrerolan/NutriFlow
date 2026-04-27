<?php

namespace App\Filament\Widgets;

use App\Models\Paciente;
use App\Models\Mensuracao;
use App\Models\PlanoAlimentar;
use App\Models\Refeicao;
use App\Models\Treino;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Pacientes', Paciente::count())
                ->description('Total de pacientes cadastrados')
                ->icon('heroicon-o-users')
                ->color('success'),

            Stat::make('Mensurações', Mensuracao::count())
                ->description('Registros de evolução corporal')
                ->icon('heroicon-o-chart-bar')
                ->color('info'),

            Stat::make('Planos Alimentares', PlanoAlimentar::count())
                ->description('Planos nutricionais criados')
                ->icon('heroicon-o-clipboard-document-list')
                ->color('warning'),

            Stat::make('Refeições', Refeicao::count())
                ->description('Refeições cadastradas')
                ->icon('heroicon-o-cake')
                ->color('success'),

            Stat::make('Treinos', Treino::count())
                ->description('Treinos vinculados aos pacientes')
                ->icon('heroicon-o-bolt')
                ->color('danger'),
        ];
    }
}
