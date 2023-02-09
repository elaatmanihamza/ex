<?php

namespace App\Filament\Resources;

use Filament\Forms;

use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PermissionResource\Pages;
use App\Filament\Resources\PermissionResource\RelationManagers;




use Filament\Tables;



use Spatie\Permission\Models\Role;

use Filament\Forms\Components\TextInput;
use Filament\Resources\RoleResource\Page;

use Filament\Forms\Components\MultiSelect;




class PermissionResource extends Resource
{
    protected static ?string $model = Permission::class;

    protected static ?string $navigationIcon = 'heroicon-o-key';


    protected static ?string $navigationGroup="Admin Managment";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\TextInput::make('name')

                -> unique()
                ->required()
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



                ,
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
            'index' => Pages\ManagePermissions::route('/'),
        ];
    }
}
