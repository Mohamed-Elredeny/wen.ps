<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class Visitors extends Model implements AuthenticatableContract
{
    use Authenticatable;

    protected $guard = 'visitor';
    protected $table = 'visitors';
    protected $fillable = ['name','email','password','phone','status','image'];


    public function book_rooms()
    {
        return $this->hasMany('App\models\Book_rooms' , 'visitor_id');
    }

    public function book_places()
    {
        return $this->hasMany('App\models\Book_places' , 'visitor_id');
    }

    public function book_meals()
    {
        return $this->hasMany('App\models\Book_meals' , 'visitor_id');
    }

    public function visitor_gifts()
    {
        return $this->hasMany('App\models\Visitor_gifts' , 'visitor_id');
    }

    public function rate_visitor()
    {
        return $this->hasMany('App\models\Rates' , 'visitor_id');
    } 

}
