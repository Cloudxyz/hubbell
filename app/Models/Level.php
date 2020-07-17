<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Traits\AppModel;

class Level extends Model
{
    use AppModel;
    use Notifiable;

    protected $table = 'categories_levels';
    public $timestamps = true;
    protected $fillable = [
        'name'
    ];

    public function categories(){
        return $this->hasMany('App\Models\Category');
    }
}
