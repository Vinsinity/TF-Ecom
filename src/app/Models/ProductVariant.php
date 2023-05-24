<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductVariant extends Model
{
    use HasFactory;

    protected $fillable = [
        'sku',
        'product_id',
        'stock',
        'price'
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function optionValues(): BelongsToMany
    {
        return $this->belongsToMany(OptionValue::class,'product_variant_option_values');
    }

    public function getOptionValue($optionName)
    {
        $optionValue = $this->optionValues()
            ->whereHas('option', function ($query) use ($optionName) {
                $query->where('name', $optionName);
            })
            ->first();

        return $optionValue ? $optionValue->value : null;
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(ProductVariantReview::class);
    }

    public function getRatingAttribute()
    {
        return $this->reviews->avg('rating');
    }

    public function getReviewCountAttribute()
    {
        return $this->reviews->count();
    }
}
