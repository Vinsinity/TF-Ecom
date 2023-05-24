<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_discounts');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_discounts');
    }

    public function brands()
    {
        return $this->belongsToMany(Brand::class, 'brand_discounts');
    }
}
