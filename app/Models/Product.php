<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Traits\AppModel;

class Product extends Model
{
    use AppModel;
    use Notifiable;

    protected $table = 'products';
    public $timestamps = true;
    protected $fillable = [
        'name',
        'catalog_id',
        'slug',
        'short_description',
        'long_description',
        'product_details',
        'resources',
        'is_active'
    ];

    public function myLists(){
        return $this->belongsToMany('App\Models\MyList', 'list_has_products', 'product_id', 'list_id');
    }

    public function categories(){
        return $this->belongsToMany('App\Models\Category', 'product_has_category', 'product_id', 'category_id');
    }

    public function images(){
        return $this->morphToMany('App\Models\Image', 'imageable');
    }

    public function resources(){
        return $this->hasMany('App\Models\Resource', 'product_id');
    }

    public function details(){
        return $this->hasMany('App\Models\ProductDetail', 'product_id');
    }
}
