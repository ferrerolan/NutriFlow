<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MensuracaoResource\Pages;
use App\Models\Mensuracao;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class MensuracaoResource extends Resource
{
    protected static ?string $model = Mensuracao::class;

    protected static ?string $navigationIcon = 'heroicon-o-chart-bar';
    protected static ?string $navigationGroup = 'Acompanhamento';
    protected static ?string $navigationLabel = 'Mensurações';
    protected static ?string $modelLabel = 'Mensuração';
    protected static ?string $pluralModelLabel = 'Mensurações';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Paciente e Data')
                ->description('Vincule a medição ao paciente correto.')
                ->icon('heroicon-o-user')
                ->schema([
                    Forms\Components\Select::make('paciente_id')
                        ->label('Paciente')
                        ->relationship('paciente', 'nome')
                        ->searchable()
                        ->preload()
                        ->required(),

                    Forms\Components\DatePicker::make('data_medicao')
                        ->label('Data da medição')
                        ->native(false)
                        ->displayFormat('d/m/Y')
                        ->required(),
                ])
                ->columns(2),

            Forms\Components\Section::make('Dados Corporais')
                ->description('Registre os principais indicadores físicos do paciente.')
                ->icon('heroicon-o-chart-bar')
                ->schema([
                    Forms\Components\TextInput::make('peso')
                        ->label('Peso')
                        ->numeric()
                        ->suffix('kg'),

                    Forms\Components\TextInput::make('altura')
                        ->label('Altura')
                        ->numeric()
                        ->suffix('m'),

                    Forms\Components\TextInput::make('circunferencia_cintura')
                        ->label('Cintura')
                        ->numeric()
                        ->suffix('cm'),

                    Forms\Components\TextInput::make('circunferencia_quadril')
                        ->label('Quadril')
                        ->numeric()
                        ->suffix('cm'),
                ])
                ->columns(2),

            Forms\Components\Section::make('Observações')
                ->description('Anotações importantes para acompanhamento futuro.')
                ->schema([
                    Forms\Components\Textarea::make('observacoes')
                        ->label('Observações da avaliação')
                        ->rows(4)
                        ->columnSpanFull(),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('data_medicao', 'desc')
            ->columns([
                Tables\Columns\TextColumn::make('paciente.nome')
                    ->label('Paciente')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('data_medicao')
                    ->label('Data')
                    ->date('d/m/Y')
                    ->sortable(),

                Tables\Columns\TextColumn::make('peso')
                    ->label('Peso')
                    ->suffix(' kg')
                    ->sortable(),

                Tables\Columns\TextColumn::make('altura')
                    ->label('Altura')
                    ->suffix(' m')
                    ->toggleable(),

                Tables\Columns\TextColumn::make('circunferencia_cintura')
                    ->label('Cintura')
                    ->suffix(' cm')
                    ->toggleable(),

                Tables\Columns\TextColumn::make('circunferencia_quadril')
                    ->label('Quadril')
                    ->suffix(' cm')
                    ->toggleable(),

                Tables\Columns\TextColumn::make('observacoes')
                    ->label('Observações')
                    ->limit(40)
                    ->placeholder('Sem observações')
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('paciente_id')
                    ->label('Paciente')
                    ->relationship('paciente', 'nome')
                    ->searchable()
                    ->preload(),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->label('Editar'),

                Tables\Actions\DeleteAction::make()
                    ->label('Excluir'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->label('Excluir selecionados'),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMensuracaos::route('/'),
            'create' => Pages\CreateMensuracao::route('/create'),
            'edit' => Pages\EditMensuracao::route('/{record}/edit'),
        ];
    }
}
