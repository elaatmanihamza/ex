<?php

namespace App\Filament\Resources;
use Filament\Tables\Columns\TextColumn;
use App\Filament\Resources\SegmentResource\Pages;
use App\Filament\Resources\SegmentResource\RelationManagers;
use App\Models\Segment;
use App\Models\Famille;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Forms\Components\Select;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SegmentResource extends Resource
{
    protected static ?string $model = Segment::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationLabel = 'Gestion Segements';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([


                    Select::make('familles_id ')

    ->label('Familles')

    ->options(famille::all()->pluck('liblee','id')->toArray())
    ->reactive(),
                Forms\Components\TextInput::make('code')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('liblee')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([



                TextColumn::make('code')->limit(20)->sortable()->searchable()->label('Code'),
                TextColumn::make('liblee')->limit(50)->sortable()->searchable()->label('Libellé'),
                TextColumn::make('familles.liblee')->limit(50)->sortable()->searchable()->label('Famille'),
                Tables\Columns\TextColumn::make('created_at')
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
            'index' => Pages\ManageSegments::route('/'),
        ];
    }
}
