<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Book_rooms extends Model
{
    protected $table = 'book_rooms';
    protected $fillable = ['visitor_id','name','email','phone','room_id','days','date_book','money','date_from','date_to','status','hotel_id'];

    public function visitor()
    {
         return $this->belongsTo('App\models\Visitors');
    }
  
    public function room()
    {
         return $this->belongsTo('App\models\Hotel_rooms');
    }

    public function hotel()
    {
         return $this->belongsTo('App\models\Hotels');
    }
    
}
