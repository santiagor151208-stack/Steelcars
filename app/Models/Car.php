<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Car extends Model
{
    protected $fillable = ['brand_id', 'model', 'year_start', 'year_end', 'engine'];

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'car_product', 'car_id', 'product_id');
    }

    public function getFullNameAttribute(): string
    {
        return "{$this->brand->name} {$this->model} ({$this->year_start}-{$this->year_end})";
    }
}
