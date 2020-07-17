<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use AppModel;
    use Notifiable;

    protected $table = 'subcategories';
    public $timestamps = true;
    protected $fillable = [
        'name',
        'slug',
        'description',
        'category_id'
    ];
}
