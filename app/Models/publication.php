<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class publication extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'titre',
        'body',
        'image',
        'profile_id',
    ];

    public function profile() : BelongsTo {
        return $this->belongsTo(Profile::class);
    }
}
