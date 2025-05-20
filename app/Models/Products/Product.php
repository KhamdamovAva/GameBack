<?php
namespace App\Models\Products;

use App\Models\User;
use App\Models\Brand;
use App\Models\Attachment;
use App\Models\Statuses\Status;
use App\Models\Desktops\Desktop;
use App\Models\Orders\OrderItem;
use App\Models\Categories\Category;
use App\Models\Attributes\Attribute;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContact;

class Product extends Model implements TranslatableContact
{
    use Translatable;
    public $translatedAttributes = [
        'name',
        'description',
    ];
    protected $fillable = ['user_id', 'images', 'price', 'brand_id', 'discount', 'category_id', 'type'];
    public function attributes(){
        return $this->belongsToMany(Attribute::class);
    }
    public function orderItems()
    {
        return $this->morphMany(OrderItem::class, 'item');
    }
    public function statuses(){
        return $this->belongsToMany(Status::class);
    }
    public function images(){
        return $this->morphMany(Attachment::class, 'attachment');
    }
    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function relatedProducts()
    {
        return Product::where('category_id', $this->category_id)
            ->where('id', '!=', $this->id)
            ->take(4) // 4 ta mahsulotni chiqarish uchun
            ->get();
    }
    public function desktops(){
        return $this->belongsToMany(Desktop::class);
    }


}
