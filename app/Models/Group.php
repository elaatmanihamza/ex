<?php

namespace App\Models;

use App\Models\Metier;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Group extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'liblee',
        'metiers_id',



    ];

    public function metiers():BelongsTo
    {
        return $this->belongsTo(Metier::class);
    }



}
