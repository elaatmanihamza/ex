<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Famille extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'liblee',

        'groups_id',



    ];

    public function groups():BelongsTo
    {
        return $this->belongsTo(Group::class);
    }
}
