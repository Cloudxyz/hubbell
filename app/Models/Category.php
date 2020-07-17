<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Traits\AppModel;

class Category extends Model
{
    use AppModel;
    use Notifiable;

    protected $table = 'categories';
    public $timestamps = true;
    protected $fillable = [
        'name',
        'slug',
        'level_id',
        'parent_id',
        'has_products',
        'description'
    ];

    public function products(){
        return $this->belongsToMany('App\Models\Product', 'product_has_category', 'category_id', 'product_id');
    }

    public function level(){
        return $this->belongsTo('App\Models\Level');
    }

    public function parent(){
        return $this->belongsTo('App\Models\Category', 'parent_id');
    }

    public function children(){
        return $this->hasMany('App\Models\Category', 'parent_id');
    }

    public function images(){
        return $this->morphToMany('App\Models\Image', 'imageable');
    }
}
