<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable=[
      'post_id','imageurl','image_no'
    ];
    public function subcategory(){
      return $this->belongsTo('App\Post');
    }
}
