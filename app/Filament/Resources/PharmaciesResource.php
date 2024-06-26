<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PharmaciesResource\Pages;
use App\Filament\Resources\PharmaciesResource\RelationManagers;
use App\Models\Pharmacies;
use App\Models\Provinces;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PharmaciesResource extends Resource
{
    protected static ?string $model = Pharmacies::class;

    protected static ?string $navigationIcon = 'heroicon-o-sparkles';
    protected static ?string $modelLabel = 'Farmacia';
    protected static ?string $pluralModelLabel = 'Farmacias';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Criar Farmacia')
                ->description('Dados da farmacia')
                ->collapsible()
                ->schema([
                        
                    Forms\Components\TextInput::make('name')
                        ->required()
                        ->maxLength(255),
                    
                    Forms\Components\TextInput::make('slogan')
                        ->maxLength(20)
                        ->default(null),
                    Forms\Components\TextInput::make('address')
                        ->maxLength(100)
                        ->default(null),
                    Forms\Components\TextInput::make('latitude')
                        ->required()
                        ->maxLength(25),
                    Forms\Components\TextInput::make('longitude')
                        ->required()
                        ->maxLength(25),
                    Forms\Components\TimePicker::make('open_time'),
                    Forms\Components\TimePicker::make('close_time'),
                ])->columnSpan(2)->columns(2),

                Forms\Components\Section::make('Metadados')
                ->description('Outros detalhes da farmacia')
                ->collapsible()
                ->schema([
                    Forms\Components\FileUpload::make('logo')
                        ->disk('public')->directory('pharmacies')->maxSize("1000")->columnSpanFull(),
                    Forms\Components\Select::make('province_id')
                        ->options(Provinces::all()->pluck('province','id'))
                        ->searchable()
                        ->label("Provincia"),

                    Forms\Components\Toggle::make('visible')
                        ->required(),
                    Forms\Components\TextInput::make('type')
                        ->required()
                        ->numeric()
                        ->hidden()
                        ->default(0),
                ])->columnSpan(1),   
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('logo')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slogan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('address')
                    ->searchable(),
                Tables\Columns\TextColumn::make('open_time')
                    ->searchable(),
                Tables\Columns\TextColumn::make('close_time')
                    ->searchable(),
                Tables\Columns\TextColumn::make('province.province')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\IconColumn::make('visible')
                    ->boolean(),
            ])
            ->filters([
                Tables\Filters\Filter::make("visiveis")->query( 
                    function($query){
                        return $query->where('visible',true);
                }),
                Tables\Filters\SelectFilter::make('province_id')
                        ->options(Provinces::all()->pluck('province','id'))
                        ->searchable()
                        ->label("Provincia")
                        ->searchable()
                        ->multiple(),
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
            ]);
    }
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPharmacies::route('/'),
            'create' => Pages\CreatePharmacies::route('/create'),
            'edit' => Pages\EditPharmacies::route('/{record}/edit'),
        ];
    }
}
