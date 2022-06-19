<?php
 
namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Gifts extends Model
{
    protected $table = 'gifts';
    protected $fillable = ['name_ar','details_ar','name_en','details_en','image','points'];


    public function visitor_gifts()
    {
        return $this->hasMany('App\models\Visitor_gifts' , 'gift_id');
    }

}
