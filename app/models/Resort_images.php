<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Resort_images extends Model
{
    protected $table = 'resort_images';
    protected $fillable = ['image','resort_id'];

    public function resort()
    {
         return $this->belongsTo('App\models\Resorts');
    }
}
