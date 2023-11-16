<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand',
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
}
