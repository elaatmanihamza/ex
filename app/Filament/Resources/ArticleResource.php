<?php

namespace App\Filament\Resources;
use Filament\Forms\Components\Select;
use Filament\Resources\Tables\Columns;

use App\Filament\Resources\ArticleResource\Pages;
use App\Filament\Resources\ArticleResource\RelationManagers;
use App\Models\Article;
use App\Models\Segment;
use Filament\Tables\Columns\TextColumn;

use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ArticleResource extends Resource
{
    protected static ?string $model = Article::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationLabel = 'Gestion Articles';

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
                    Select::make('segmentid')

                    ->label('Segement')

                    ->options(segment::all()->pluck('liblee','id')->toArray())
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
                Tables\Columns\TextColumn::make('familles.liblee')->sortable()->searchable(),




                    Tables\Columns\TextColumn::make('segments.code')->sortable()->searchable()->label('Segment'),

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
            'index' => Pages\ManageArticles::route('/'),
        ];
    }
}
