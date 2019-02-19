<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    //
    protected $fillable=[
    	'slug','title','description','keyword'
    ];
    public function posts(){
    	return $this->hasMany('App\Post');
    }
    public function category(){
    	return $this->belongsTo('App\Category');
    }

    public function style(){
        return $this->belongsTo('App\Style');
    }



}

    
