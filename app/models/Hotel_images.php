<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Hotel_images extends Model
{
    protected $table = 'hotel_images';
    protected $fillable = ['image','hotel_id'];

    public function hotel()
    {
         return $this->belongsTo('App\models\Hotels');
    }
}
