<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Traits\AppModel;

class Resource extends Model
{
    use AppModel;
    use Notifiable;

    protected $table = 'images';
    public $timestamps = true;
    protected $fillable = [
        'title_section',
        'slug',
        'extension',
        'file_original_name',
        'file_name',
        'file_path',
        'file_url',
        'order'
    ];

    public function products(){
        return $this->morphedByMany('App\Models\Product', 'resourceable');
    }

    public function categories(){
        return $this->morphedByMany('App\Models\Category', 'resourceable');
    }
}
