<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PublishPlansResource\Pages;
use App\Filament\Resources\PublishPlansResource\RelationManagers;
use App\Models\Publish_plans;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PublishPlansResource extends Resource
{
    protected static ?string $model = Publish_plans::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    
    protected static ?string $navigationGroup = "Publicidades";
    protected static ?string $modelLabel = 'Plano';
    protected static ?string $pluralModelLabel = 'Planos de Publicidade';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('plan')
                    ->required()
                    ->maxLength(255)
                    ->label('Nome do plano')
                    ->required(),
                Forms\Components\TextInput::make('duration')
                    ->required()
                    ->maxLength(255)
                    ->label('Duração ')
                    ->required(),
                Forms\Components\TextInput::make('price')
                    ->numeric()
                    ->default(null)
                    ->prefix('$'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('plan')
                    ->label('Nome do plano'),
                Tables\Columns\TextColumn::make('duration')
                    ->label('Duração'),
                Tables\Columns\TextColumn::make('price')
                    ->numeric()
                    ->prefix('$')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Cadastrado em')
                    ->sortable(),
                
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManagePublishPlans::route('/'),
        ];
    }
}
