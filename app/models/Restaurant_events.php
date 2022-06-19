<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Restaurant_events extends Model
{
    protected $table = 'restaurant_events';
    protected $fillable = ['restaurant_id','title_ar','description_ar','title_en','description_en','image'];

    public function restaurant()
    {
         return $this->belongsTo('App\models\Restaurants');
    }
}
