<?php

namespace App\Models;

use App\Helpers\Helper;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Product extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = [
        'name',
        'description',
        'brand_id'
    ];

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function variants(): HasMany
    {
        return $this->hasMany(ProductVariant::class);
    }

    public function options(): BelongsToMany
    {
        return $this->belongsToMany(Option::class,'product_options')->withTimestamps();
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class,'category_product')->withTimestamps();
    }

    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class);
    }

    public function brand(): HasOne
    {
        return $this->hasOne(Brand::class,'id','brand_id');
    }

    public function getVariantOptionsAttribute(): array
    {
        $variants = $this->variants;
        $options = [];

        foreach ($variants as $variant) {
            $optionValues = $variant->optionValues;

            foreach ($optionValues as $optionValue) {

                $option = $optionValue->option;
                $value = $optionValue->value;

                if (!isset($options[$option->name])) {
                    $options[$option->name] = [
                        'type' => $option->type->name,
                        'values' => []
                    ];
                }

                if (!in_array($value, $options[$option->name]['values'])) {
                    $options[$option->name]['values'][] = $value;
                }
            }
        }
        return $options;
    }

    public function getVariationsAttribute(): array
    {
        $variants = $this->variants;
        $data = [];

        foreach ($variants as $variant) {
            $optionValues = $variant->optionValues;

            foreach ($optionValues as $optionValue) {

                $option = $optionValue->option;
                $value = array('id' => $optionValue->id, 'name' => $optionValue->value);

                if (!isset($data[$option->name])) {
                    $data[$option->name] = [
                        'type' => $option->type->name,
                        'option' => [
                            'id' => $option->id,
                            'name' => $option->name,
                        ],
                        'values' => []
                    ];
                }

                if (!in_array($value, $data[$option->name]['values'])) {
                    $data[$option->name]['values'][] = $value;
                }
            }
        }
        return $data;
    }

    public function getPriceRangeAttribute(): array
    {
        $variants = $this->variants;
        $prices = [];

        foreach ($variants as $variant) {
            $prices[] = $variant->price;
        }

        $minPrice = min($prices);
        $maxPrice = max($prices);

        return [
            'min' => Helper::calculatePrice($minPrice),
            'max' => Helper::calculatePrice($maxPrice),
        ];
    }

    public function variantReviews(): HasManyThrough
    {
        return $this->hasManyThrough(
            ProductVariantReview::class,
            ProductVariant::class,
            'product_id',
            'product_variant_id',
            'id',
            'id'
        );
    }

    public function getAverageRatingAttribute()
    {
        return $this->variantReviews->avg('rating');
    }

    public function getSummaryAttribute()
    {
        $description = strip_tags($this->description); // HTML taglarını temizle

        if (strlen($description) <= 100) {
            return $description; // 100 karakterden az ise direk description'u döndür
        }

        // 100 karakterden fazla ise son kelimeyi tamamlayacak şekilde kes
        $summary = substr($description, 0, 100);
        $lastSpace = strrpos($summary, " ");
        $summary = substr($summary, 0, $lastSpace);

        return $summary . '...'; // Özeti döndür
    }

    public function discounts()
    {
        return $this->belongsToMany(Discount::class, 'product_discounts');
    }
}
