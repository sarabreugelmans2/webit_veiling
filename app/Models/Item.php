<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Item extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'start_price', 'featured', 'lot_id' ];


    public function lot(): BelongsTo
    {
        return $this->belongsTo(Lot::class);
    }

    public function bids(): HasMany
    {
        return $this->hasMany(Bid::class);
    }
}
