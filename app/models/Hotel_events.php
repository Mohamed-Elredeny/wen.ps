<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Hotel_events extends Model
{
    protected $table = 'hotel_events';
    protected $fillable = ['hotel_id','title_ar','description_ar','title_en','description_en','image'];

    public function hotel()
    {
         return $this->belongsTo('App\models\Hotels');
    }
    
}
