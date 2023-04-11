<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Lot extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'started_at', 'published_at', 'ended_at' ];

    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
    }
}
