<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiscountCode extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'code','amount', 'type', 'start_date', 'end_date'];

    protected $casts = [
        'type' => 'string'
    ];

    const TYPE_PRICE = 'price';
    const TYPE_PERCENTAGE = 'percentage';
}
