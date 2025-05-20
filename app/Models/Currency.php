<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class currency extends Model
{
    protected $fillable = [
        'user_id',
        'currency',
        'conversions',
        'Code',
        'Ccy',
        'Nominal',
        'Rate',
        'Diff',
        'Date'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
