<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Restaurant_meal_sizes extends Model
{
    protected $table = 'restaurant_meal_sizes';
    protected $fillable = ['meal_id','size','price'];

    public function meal()
    {
         return $this->belongsTo('App\models\Restaurant_meals');
    }

    protected $casts = [

        'size'      => 'array',
        'price'     => 'array',

    ];

    public function book_meals()
    {
        return $this->hasMany('App\models\Book_meals' , 'meal_size_id');
    }

}
