<?php

namespace App\Models\Orders;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'fullname',
        'phone',
        'delivery_method_id',
        'address',
        'comment',
        'status'
    ];
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

}
