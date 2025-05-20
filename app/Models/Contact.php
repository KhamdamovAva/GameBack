<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'fullname',
        'phone',
        'status'
    ];
    public static function getEnumValues($column = 'status')
    {
        $type = DB::selectOne("SHOW COLUMNS FROM users WHERE Field = ?", [$column])->Type;
        preg_match('/enum\((.*)\)$/', $type, $matches);
        $enumValues = str_getcsv($matches[1], ",", "'");

        return $enumValues;
    }
}
