<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    protected $table = 'contacts';
    protected $fillable = ['name','email','phone','subject','message'];

}
