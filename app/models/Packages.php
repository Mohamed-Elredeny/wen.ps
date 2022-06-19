<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Packages extends Model
{
    protected $table = 'packages';
    protected $fillable = ['name_ar','name_en','price','duration','details_ar','details_en','image'];

    public function restaurants()
    {
        return $this->hasMany('App\models\Restaurants' , 'package_id');
    }

    public function hotels()
    {
        return $this->hasMany('App\models\Hotels' , 'package_id');
    }

    public function resorts()
    {
        return $this->hasMany('App\models\Resorts' , 'package_id');
    }

}
