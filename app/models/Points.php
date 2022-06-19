<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Points extends Model
{
    protected $table = 'points';
    protected $fillable = ['hotel_point','restaurant_point','resort_point'];
    
}
