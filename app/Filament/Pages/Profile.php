<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use RyanChandler\FilamentProfile\Pages\Profile as BaseProfile;
class Profile  extends BaseProfile
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.profile';
}
