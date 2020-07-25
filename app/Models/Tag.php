<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Traits\AppModel;

class Tag extends Model
{
    use AppModel;
    use Notifiable;

    protected $table = 'tags';
    public $timestamps = true;
    protected $fillable = [
        'name'
    ];

    public function posts(){
        return $this->belongsToMany('App\Models\Post', 'post_has_tag', 'tag_id', 'post_id');
    }
}
