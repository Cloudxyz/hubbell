<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Traits\AppModel;

class MyList extends Model
{
    use AppModel;
    use Notifiable;

    protected $table = 'lists';
    public $timestamps = true;
    protected $fillable = [
        'name',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function products(){
        return $this->belongsToMany('App\Models\Product', 'list_has_product', 'list_id', 'product_id');
    }
}
