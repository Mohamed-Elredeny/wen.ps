<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class Hotels extends Model implements AuthenticatableContract
{
    use Authenticatable;

    protected $guard = 'hotel';
    protected $table = 'hotels';
    protected $fillable = ['name_ar','name_en','email','password','phone','orders','status','package_id',
    'end_date_package','about_hotel_ar','about_hotel_en','start_work','end_work','logo','link_site_google_map','address','lng','lat'];

    public function package()
    {
         return $this->belongsTo('App\models\Packages');
    }

    public function hotel_images()
    {
        return $this->hasMany('App\models\Hotel_images' , 'hotel_id');
    }

    public function hotel_rooms()
    {
        return $this->hasMany('App\models\Hotel_rooms' , 'hotel_id');
    }

    public function hotel_events()
    {
        return $this->hasMany('App\models\Hotel_events' , 'hotel_id');
    }    

    public function book_rooms()
    {
        return $this->hasMany('App\models\Book_rooms' , 'hotel_id');
    }

    public function hotel_services()
    {
        return $this->hasMany('App\models\Hotel_services' , 'hotel_id');
    }

    public function rate_hotel()
    {
        return $this->hasMany('App\models\Rates' , 'hotel_id');
    } 


}
