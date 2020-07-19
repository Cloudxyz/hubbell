<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Traits\AppModel;

class ProductDetail extends Model
{
    use AppModel;
    use Notifiable;

    protected $table = 'product_details';
    public $timestamps = true;
    protected $fillable = [
        'title',
        'description',
        'product_id'
    ];

    public function product(){
        return $this->belongsTo('App\Models\Product');
    }
}
