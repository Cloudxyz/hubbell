<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Traits\AppModel;

class Resource extends Model
{
    use AppModel;
    use Notifiable;

    protected $table = 'resources';
    public $timestamps = true;
    protected $fillable = [
        'title_section',
        'slug',
        'extension',
        'file_original_name',
        'file_name',
        'file_path',
        'file_url',
        'order',
        'product_id'
    ];

    public function product(){
        return $this->belongsTo('App\Models\Product');
    }
}
