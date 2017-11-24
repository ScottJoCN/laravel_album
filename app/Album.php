<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    //
    protected $fillable = ['name' , 'intro' ,'cover'];
    // one to many model
    public function photos(){
    	return $this->hasMany('App\Photo');
    }
}
