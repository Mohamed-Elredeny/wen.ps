<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Hotel_services extends Model
{
    protected $table = 'hotel_services';
    protected $fillable = ['hotel_id','name_ar','name_en'];

    public function hotel()
    {
         return $this->belongsTo('App\models\Hotels');
    }
    
}
