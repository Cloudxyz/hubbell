<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Traits\AppModel;

class Shop extends Model
{
    use AppModel;
    use Notifiable;

    protected $table = 'shops';
    public $timestamps = true;
    protected $fillable = [
        'name',
        'phone',
        'web',
        'email',
        'address',
        'latitude',
        'longitude'
    ];

    public function types(){
        return $this->belongsToMany('App\Models\ShopType', 'shop_has_type', 'shop_id', 'type_id');
    }

    public function products(){
        return $this->belongsToMany('App\Models\Product', 'shop_has_product', 'shop_id', 'product_id');
    }
}
