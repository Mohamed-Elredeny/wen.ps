<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Book_tables extends Model
{

    protected $table = 'book_tables';
    protected $fillable = ['visitor_id','name','email','phone','table_id','status','date_book','time_book','restaurant_id'];

    public function visitor()
    {
         return $this->belongsTo('App\models\Visitors');
    }
  
    public function table()
    {
         return $this->belongsTo('App\models\Restaurant_tables');
    }

    public function restaurant()
    {
         return $this->belongsTo('App\models\Restaurants');
    }
 
}
