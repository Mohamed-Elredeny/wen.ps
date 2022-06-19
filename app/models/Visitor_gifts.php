<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Visitor_gifts extends Model
{
   
    protected $table = 'visitor_gifts';
    protected $fillable = ['gift_id','visitor_id','status'];


    public function visitor()
    {
         return $this->belongsTo('App\models\Visitors');
    }
  
    public function gift()
    {
         return $this->belongsTo('App\models\Gifts');
    }

}
