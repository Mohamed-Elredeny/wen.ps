<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Book_Places extends Model
{
    protected $table = 'book_places';
    protected $fillable = ['visitor_id','name','email','phone','place_id','days','date_book','money','date_from','date_to','status','resort_id'];

    public function visitor()
    {
         return $this->belongsTo('App\models\Visitors');
    }
  
    public function place()
    {
         return $this->belongsTo('App\models\Resort_resorts');
    }
    
    public function resort()
    {
         return $this->belongsTo('App\models\Resorts');
    }
}
