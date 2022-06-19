<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Restaurant_meals extends Model
{
    protected $table = 'restaurant_meals';
    protected $fillable = ['restaurant_id','category_id','name_ar','component_ar','name_en','component_en','image'];

    public function restaurant()
    {
         return $this->belongsTo('App\models\Restaurants');
    }

    public function category()
    {
         return $this->belongsTo('App\models\Restaurant_categories');
    }

    public function meal_sizes()
    {
        return $this->hasMany('App\models\Restaurant_meal_sizes' , 'meal_id');
    }

    public function book_meals()
    {
        return $this->hasMany('App\models\Book_meals' , 'meal_id');
    }

    
}
