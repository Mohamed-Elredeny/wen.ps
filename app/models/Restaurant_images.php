<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Restaurant_images extends Model
{

    protected $table = 'restaurant_images';
    protected $fillable = ['image','restaurant_id'];

    public function restaurant()
    {
         return $this->belongsTo('App\models\Restaurants');
    }

}
