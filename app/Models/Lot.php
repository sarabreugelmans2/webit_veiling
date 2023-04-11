<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Lot extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'started_at', 'published_at', 'ended_at' ];
    protected $casts = [ 'started_at'=>'datetime', 'ended_at'=>'datetime', 'published_at'=>'datetime'];


    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
    }

    public function scopeActive(Builder $query): void
    {
        $query->whereDate('started_at', '<=', now());
    }

    public function scopePublished(Builder $query): void
    {
        $query->whereDate('published_at', '<=', now());
    }


}
