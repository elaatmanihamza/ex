<?php

namespace App\Filament\Resources;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Spatie\Permission\Models\Role;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Spatie\Permission\Models\Permission;
use Filament\Resources\RoleResource\Page;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\MultiSelect;
use App\Filament\Resources\RoleResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use App\Filament\Resources\RoleResource\RelationManagers;
 use App\Filament\Resources\RoleResource\RelationManagers\PermissionsRelationManager;

class RoleResource extends Resource
{
    protected static ?string $model = Role::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup="Admin Managment";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //

                Forms\Components\TextInput::make('name'),


                Select::make('permissions')
                ->multiple()
                ->relationship('permissions','name')
               ->preload()

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //


                TextColumn:: make('id'),

                TextColumn:: make('name'),
                TextColumn:: make('created_at')
                ->dateTime('d-M-Y')

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
            'index' => Pages\ManageRoles::route('/'),
        ];
    }


    public static function getRelations():array
    {

       return[


            PermissionsRelationManager::class,
       ];
    }





}
