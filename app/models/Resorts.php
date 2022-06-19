<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class Resorts extends Model implements AuthenticatableContract
{
    use Authenticatable;
    
    protected $guard = 'resort';
    protected $table = 'resorts';
    protected $fillable = ['name_ar','name_en','email','password','phone','orders','status','package_id',
    'end_date_package','about_resort_ar','about_resort_en','start_work','end_work','logo','link_site_google_map','address','lng','lat'];

    public function package()
    {
         return $this->belongsTo('App\models\Packages');
    }

    public function resort_images()
    {
        return $this->hasMany('App\models\Resort_images' , 'resort_id');
    }

    public function resort_categories()
    {
        return $this->hasMany('App\models\Resort_categories' , 'resort_id');
    }

    public function resort_resorts()
    {
        return $this->hasMany('App\models\Resort_resorts' , 'resort_id');
    }

    public function resort_events()
    {
        return $this->hasMany('App\models\Resort_events' , 'resort_id');
    }

    public function book_places()
    {
        return $this->hasMany('App\models\Book_places' , 'resort_id');
    } 

    public function rate_resort()
    {
        return $this->hasMany('App\models\Rates' , 'resort_id');
    } 

}
