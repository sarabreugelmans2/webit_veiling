<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Item extends Model implements hasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable = ['name', 'description', 'start_price', 'featured', 'lot_id' ];


    public function lot(): BelongsTo
    {
        return $this->belongsTo(Lot::class);
    }

    public function bids(): HasMany
    {
        return $this->hasMany(Bid::class);
    }

    public function highestBid(): HasOne
    {
        return $this->bids()->one()->ofMany('amount', 'max');
    }

    public function scopeFeatured(Builder $query): void
    {
        $query->where('featured', true);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('pet_images')->useDisk('public');
    }

}
