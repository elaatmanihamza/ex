<?php

namespace App\Models;
use Spatie\Permission\Traits\HasRoles;
use App\Models\Famille;
use Illuminate\Database\Eloquent\Model;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Segment extends Model
{
    use HasFactory,HasRoles;

    protected $fillable = [

        'id',
        'code',
        'liblee',

        'familles_id',


    ];










    public function familles():BelongsTo
    {
        return $this->belongsTo(Famille::class);
    }

    public function canAccessFilament(): bool
    {
        //return str_ends_with($this->email, '@yourdomain.com') && $this->hasVerifiedEmail();
        return $this->hasRole(['admin','super-admin']);
    }


}
