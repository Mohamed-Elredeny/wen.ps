<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Restaurant_tables extends Model
{
    protected $table = 'restaurant_tables';
    protected $fillable = ['restaurant_id','table_id','people_number','image','status'];

    public function restaurant()
    {
         return $this->belongsTo('App\models\Restaurants');
    }

    public function book_tables()
    {
        return $this->hasMany('App\models\Book_tables' , 'table_id');
    }


}
