<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'order_number',
        'cargo_id',
        'discount_code_id',
        'order_status_id',
        'total_price',
        'cargo_price',
        'tax_price',
        'subtotal_price',
        'total_discount_price',
        'total_quantity',
        'user_address_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderStatus()
    {
        return $this->belongsTo(OrderStatus::class);
    }

    public function userAddress()
    {
        return $this->belongsTo(UserAddress::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function discount()
    {
        return $this->belongsTo(DiscountCode::class,'discount_code_id');
    }

    public function createdAtAgo()
    {
        return Carbon::parse($this->created_at)->ago();
    }
}
