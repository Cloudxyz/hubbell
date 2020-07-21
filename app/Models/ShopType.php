<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Traits\AppModel;

class ShopType extends Model
{
    use AppModel;
    use Notifiable;

    protected $table = 'shops_types';
    public $timestamps = true;
    protected $fillable = [
        'name',
        'phone'
    ];

    public function shops(){
        return $this->belongsToMany('App\Models\Shop', 'shop_has_type', 'type_id', 'shop_id');
    }
}
