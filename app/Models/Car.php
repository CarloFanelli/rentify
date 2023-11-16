<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand',
        'category_id',
        'model',
        'image',
        'price',
        'seats',
        'transmission',
        'fuel_type',
        'notes',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function cars(): BelongsToMany
    {
        return $this->belongsToMany(Feature::class);
    }
}
