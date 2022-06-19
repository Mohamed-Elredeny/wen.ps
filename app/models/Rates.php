<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Rates extends Model
{

    protected $table = 'rates';
    protected $fillable = ['visitor_id','hotel_id','restaurant_id','resort_id','type','rate'];

    public function hotel()
    {
         return $this->belongsTo('App\models\Hotels');
    }
    
    public function restaurant()
    {
         return $this->belongsTo('App\models\Restaurants');
    }

    public function resort()
    {
         return $this->belongsTo('App\models\Resorts');
    }

    public function visitor()
    {
         return $this->belongsTo('App\models\Visitors');
    }

}
