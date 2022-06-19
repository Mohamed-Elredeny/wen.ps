<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Resort_categories extends Model
{
    protected $table = 'resort_categories';
    protected $fillable = ['resort_id','name_ar','name_en','image'];

    public function resort()
    {
         return $this->belongsTo('App\models\Resorts');
    }

}
