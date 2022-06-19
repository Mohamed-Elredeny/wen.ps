<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Resort_resorts extends Model
{
    protected $table = 'resort_resorts';
    protected $fillable = ['resort_id','category_id','name_ar','details_ar','name_en','details_en','price','image'];

    public function resort()
    {
         return $this->belongsTo('App\models\Resorts');
    }
    
    public function book_places()
    {
        return $this->hasMany('App\models\Book_places' , 'place_id');
    }    

}
