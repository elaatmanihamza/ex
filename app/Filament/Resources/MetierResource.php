<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Metier;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;

use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\MetierResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\MetierResource\RelationManagers;
use App\Filament\Resources\MetierResource\Widgets\MetierStatsOverview;
//use App\Filament\Resources\MetierResource\Widgets\MetierStatsOverview;

class MetierResource extends Resource
{
    protected static ?string $model = Metier::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationLabel = 'Gestion Métiers';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('code')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('libelle')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('code')->sortable()->searchable()->label('Code'),
                Tables\Columns\TextColumn::make('libelle')->sortable()->searchable()->label('libellé'),
                Tables\Columns\TextColumn::make('created_at')->sortable()->searchable()->label('Date de Création')
                    ->dateTime(),

            ])
            ->filters([
                //
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
            'index' => Pages\ManageMetiers::route('/'),
        ];
    }

    public static function getWidgets(): array
    {

        return [
            MetierStatsOverview::class,
        ];

    }
}
