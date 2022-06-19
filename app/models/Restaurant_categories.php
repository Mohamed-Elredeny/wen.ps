<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Restaurant_categories extends Model
{
    protected $table = 'restaurant_categories';
    protected $fillable = ['name_ar','name_en','size','image','restaurant_id'];

    public function restaurant()
    {
         return $this->belongsTo('App\models\Restaurants');
    }

    public function restaurant_meals()
    {
        return $this->hasMany('App\models\Restaurant_meals' , 'category_id');
    }


    protected $casts = [

        'size'      => 'array',

    ];


}
