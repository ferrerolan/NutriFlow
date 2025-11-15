<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CustomerResource\Pages;
use App\Models\Customer;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class CustomerResource extends Resource
{
    protected static ?string $model = Customer::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationLabel = 'Pacientes';
    protected static ?string $pluralModelLabel = 'Pacientes';
    protected static ?string $modelLabel = 'Paciente';
    protected static ?string $navigationGroup = 'Área do Nutricionista';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Grid::make(2)
                ->schema([
                    Forms\Components\Section::make('🧍 Dados Pessoais')
                        ->columns(2)
                        ->schema([
                            Forms\Components\TextInput::make('name')
                                ->label('Nome completo')
                                ->required()
                                ->maxLength(100)
                                ->placeholder('Digite o nome completo'),

                            Forms\Components\Select::make('sexo')
                                ->label('Sexo')
                                ->options([
                                    'Masculino' => 'Masculino',
                                    'Feminino' => 'Feminino',
                                    'Outro' => 'Outro',
                                ])
                                ->native(false),

                            Forms\Components\DatePicker::make('data_nascimento')
                                ->label('Data de nascimento')
                                ->displayFormat('d/m/Y'),

                            Forms\Components\TextInput::make('telefone')
                                ->label('Telefone')
                                ->mask('(99) 99999-9999')
                                ->tel(),

                            Forms\Components\TextInput::make('email')
                                ->label('E-mail')
                                ->email()
                                ->placeholder('exemplo@email.com'),
                        ]),

                    Forms\Components\Section::make('📋 Informações Clínicas')
                        ->columns(2)
                        ->schema([
                            Forms\Components\Select::make('status')
                                ->label('Status do paciente')
                                ->options([
                                    'critico' => 'Crítico',
                                    'regular' => 'Regular',
                                    'avancado' => 'Avançado',
                                ])
                                ->default('regular')
                                ->native(false)
                                ->helperText('Indique o nível atual de acompanhamento do paciente.'),

                            Forms\Components\Textarea::make('observacoes')
                                ->label('Observações adicionais')
                                ->rows(5)
                                ->placeholder('Anotações sobre o acompanhamento, hábitos, histórico alimentar...'),
                        ]),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nome')
                    ->searchable()
                    ->sortable()
                    ->description(fn($record) => $record->email),

                TextColumn::make('telefone')
                    ->label('Telefone')
                    ->icon('heroicon-o-phone')
                    ->copyable(),

                TextColumn::make('data_nascimento')
                    ->label('Nascimento')
                    ->date('d/m/Y')
                    ->sortable(),

                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'critico' => 'danger',
                        'regular' => 'warning',
                        'avancado' => 'success',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn(string $state): string => match ($state) {
                        'critico' => 'Crítico',
                        'regular' => 'Regular',
                        'avancado' => 'Avançado',
                        default => ucfirst($state),
                    }),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->label('Filtrar por status')
                    ->options([
                        'critico' => 'Crítico',
                        'regular' => 'Regular',
                        'avancado' => 'Avançado',
                    ]),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('name');
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCustomers::route('/'),
            'create' => Pages\CreateCustomer::route('/create'),
            'edit' => Pages\EditCustomer::route('/{record}/edit'),
            //            'view' => Pages\ViewCustomer::route('/{record}'),
        ];
    }
}
