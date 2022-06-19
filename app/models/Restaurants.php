<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class Restaurants extends Model implements AuthenticatableContract
{   
    use Authenticatable;

    protected $guard = 'restaurant';
    protected $table = 'restaurants';
    protected $fillable = ['name_ar','name_en','email','password','phone','orders','status','package_id',
    'end_date_package','about_restaurant_ar','about_restaurant_en','start_work','end_work','logo','link_site_google_map','address','lng','lat'];

    public function package()
    {
         return $this->belongsTo('App\models\Packages');
    }

    public function restaurant_images()
    {
        return $this->hasMany('App\models\Restaurant_images' , 'restaurant_id');
    }

    public function restaurant_categories()
    {
        return $this->hasMany('App\models\Restaurant_categories' , 'restaurant_id');
    }
    
    public function restaurant_meals()
    {
        return $this->hasMany('App\models\Restaurant_meals' , 'restaurant_id');
    }

    public function restaurant_tables()
    {
        return $this->hasMany('App\models\Restaurant_tables' , 'restaurant_id');
    }

    public function restaurant_events()
    {
        return $this->hasMany('App\models\Restaurant_events' , 'restaurant_id');
    }

    public function book_meals()
    {
        return $this->hasMany('App\models\Book_meals' , 'restaurant_id');
    }    
 
    public function book_tables()
    {
        return $this->hasMany('App\models\Book_tables' , 'restaurant_id');
    }

    public function rate_restaurant()
    {
        return $this->hasMany('App\models\Rates' , 'restaurant_id');
    } 

}
