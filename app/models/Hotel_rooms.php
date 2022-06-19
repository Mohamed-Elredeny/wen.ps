<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Hotel_rooms extends Model
{
    protected $table = 'hotel_rooms';
    protected $fillable = ['hotel_id','room_id','people_number','details_ar','details_en','price','image'];

    public function hotel()
    {
         return $this->belongsTo('App\models\Hotels');
    }

    public function book_rooms()
    {
        return $this->hasMany('App\models\Book_rooms' , 'room_id');
    }
    
    
}
