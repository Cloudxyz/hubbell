<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Traits\AppModel;

class Post extends Model
{
    use AppModel;
    use Notifiable;

    protected $table = 'posts';
    public $timestamps = true;
    protected $fillable = [
        'title',
        'slug',
        'short_description',
        'long_description',
        'is_feature',
        'is_active'
    ];

    public function images(){
        return $this->morphToMany('App\Models\Image', 'imageable');
    }

    public function tags(){
        return $this->belongsToMany('App\Models\Tag', 'post_has_tag', 'post_id', 'tag_id');
    }
}
