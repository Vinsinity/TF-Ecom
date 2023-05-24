<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariantOptionValue extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_variant_id',
        'option_id',
        'option_value_id'
    ];

    public function productVariant()
    {
        return $this->belongsTo(ProductVariant::class);
    }

    public function optionValue()
    {
        return $this->belongsTo(OptionValue::class);
    }

    public function option()
    {
        return $this->belongsTo(Option::class)->distinct();
    }
}
