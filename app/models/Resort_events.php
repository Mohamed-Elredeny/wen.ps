<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Resort_events extends Model
{
    protected $table = 'resort_events';
    protected $fillable = ['resort_id','title_ar','description_ar','title_en','description_en','image'];

    public function resort()
    {
         return $this->belongsTo('App\models\Resorts');
    }
}
