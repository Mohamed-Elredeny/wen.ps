<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Book_meals extends Model
{
    protected $table = 'book_meals';
    protected $fillable = ['visitor_id','name','email','phone','meal_id','meal_size_id','size','money','status','date_book','restaurant_id'];

    public function visitor()
    {
         return $this->belongsTo('App\models\Visitors');
    }
  
    public function meal()
    {
         return $this->belongsTo('App\models\Restaurant_meals');
    }

    public function meal_size()
    {
         return $this->belongsTo('App\models\Restaurant_meal_sizes');
    }

    public function restaurant()
    {
         return $this->belongsTo('App\models\Restaurants');
    }
}
