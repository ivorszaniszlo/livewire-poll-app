<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Option extends Model
{
    use HasFactory;

    public function poll(): BelongsTo
    {
        return $this->belongsTo(Poll::class);
    }
    
    public function votes()
    {
        return $this->hasMany(Vote::class);
    }
}
