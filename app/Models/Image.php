<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Traits\AppModel;

class Image extends Model
{
    use AppModel;
    use Notifiable;

    protected $table = 'images';
    protected $fillable = [
        'slug',
        'extension',
        'file_original_name',
        'file_name',
        'file_path',
        'file_url',
        'order'
    ];

    public function products(){
        return $this->morphedByMany('App\Models\Product', 'imageable');
    }

    public function categories(){
        return $this->morphedByMany('App\Models\Category', 'imageable');
    }

    public function posts(){
        return $this->morphedByMany('App\Models\Post', 'imageable');
    }
}
