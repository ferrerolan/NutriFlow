<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FuncaoNutricionistaResource\Pages;
use App\Models\FuncaoNutricionista;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class FuncaoNutricionistaResource extends Resource
{
    protected static ?string $navigationGroup = 'Configurações';
    protected static ?string $navigationLabel = 'Funções do Nutricionista';
    protected static ?string $modelLabel = 'Função do Nutricionista';
    protected static ?string $pluralModelLabel = 'Funções do Nutricionista';
    protected static ?string $navigationIcon = 'heroicon-o-user-circle';
    protected static ?int $navigationSort = 6;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Função')
                ->schema([
                    Forms\Components\TextInput::make('nome')
                        ->label('Nome da função')
                        ->required()
                        ->maxLength(100),

                    Forms\Components\Select::make('nivel_acesso')
                        ->label('Nível de acesso')
                        ->options([
                            'administrador' => 'Administrador',
                            'nutricionista' => 'Nutricionista',
                            'assistente' => 'Assistente',
                            'operacional' => 'Operacional',
                        ])
                        ->default('operacional'),

                    Forms\Components\Select::make('status')
                        ->options([
                            'ativo' => 'Ativo',
                            'inativo' => 'Inativo',
                        ])
                        ->default('ativo'),
                ])
                ->columns(2),

            Forms\Components\Textarea::make('descricao')
                ->label('Descrição')
                ->rows(4),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nome')
                    ->label('Função')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('nivel_acesso')
                    ->label('Nível'),

                Tables\Columns\BadgeColumn::make('status')
                    ->colors([
                        'success' => 'ativo',
                        'danger' => 'inativo',
                    ]),

                Tables\Columns\TextColumn::make('descricao')
                    ->limit(50),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Criado em')
                    ->dateTime('d/m/Y H:i'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFuncaoNutricionistas::route('/'),
            'create' => Pages\CreateFuncaoNutricionista::route('/create'),
            'edit' => Pages\EditFuncaoNutricionista::route('/{record}/edit'),
        ];
    }
}
