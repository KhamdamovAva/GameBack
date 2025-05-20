<?php

namespace App\Models\Orders;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = ['order_id', 'item_type', 'item_id', 'name', 'quantity', 'price'];

    public function item()
    {
        return $this->morphTo();
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

}
