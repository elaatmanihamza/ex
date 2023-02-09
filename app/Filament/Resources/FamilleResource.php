<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Famille;
use App\Models\Group;

use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\FamilleResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\FamilleResource\RelationManagers;

class FamilleResource extends Resource
{
    protected static ?string $model = Famille::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationLabel = 'Gestion Familles';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\TextInput::make('code')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('liblee')
                    ->required()
                    ->maxLength(255),
                    Select::make('groupid1')

    ->label('Groupe')

    ->options(group::all()->pluck('liblee','id')->toArray())
    ->reactive(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('code')->sortable()->searchable()->label('Code'),
                Tables\Columns\TextColumn::make('liblee')->sortable()->searchable()->label('Libellé'),
                Tables\Columns\TextColumn::make('created_at')->sortable()->searchable()->label('Date de création'),

                    Tables\Columns\TextColumn::make('groupid1')->sortable()->searchable()->label('Groupe'),

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
            'index' => Pages\ManageFamilles::route('/'),
        ];
    }
}
