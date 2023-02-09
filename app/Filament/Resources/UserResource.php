<?php

namespace App\Filament\Resources;
use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use App\Models\Metier;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Hash;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Filters\TrashedFilter;
use App\Filament\Resources\UserResource\Pages;
use Filament\Forms\Components\BelongsToSelect;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\UserResource\RelationManagers;
use Webbingbrasil\FilamentAdvancedFilter\Filters\NumberFilter;





class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationLabel = 'Gestion Utilisateurs';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('Prenom')
                    ->maxLength(255),

                    select::make('Profil')
    ->options([
        'admin' => 'Admin',
        'superadmin' => 'Super Admin',
        'operateur' => 'Opérateur',
        'operateur' => 'Observateur',

    ]),


    Select::make('metiers_id')

                    ->label('Métier')
                    ->options(metier::all()->pluck('libelle','id')->toArray()),





                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\DateTimePicker::make('email_verified_at'),
                Forms\Components\TextInput::make('password')
                    ->password()
                    ->required()
                    ->password()
                    ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                    ->maxLength(255),

                    Forms\Components\CheckboxList::make('roles')

               ->relationship('roles','name')

               ->columns(2)
               ->helperText('only choose one')
            ]);
    }

    public static function table(Table $table): Table
    {





        return $table
            ->columns([

                TextColumn::make('name')->limit(20)->sortable()->searchable()->label('Nom'),
                TextColumn::make('Prenom')->limit(20)->sortable()->searchable()->label('Prénom'),
                TextColumn::make('email')->limit(50)->sortable()->searchable()->icon('heroicon-s-mail')
                ,

               TextColumn::make('metiers.libelle')->sortable(),

               Tables\Columns\TextColumn::make('roles.name')->label('Profil'),


            ])



            ->filters([



            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
           ;



    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageUsers::route('/'),
        ];
    }



}
