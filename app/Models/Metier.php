<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Metier extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'code',
        'libelle',

    ];


}
