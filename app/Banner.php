<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
     protected $fillable=[
    	'name','width','hight','area_code','linkimage','linkurl','contact_email','expire_date'
    ];

    public function getLinkImageAttribute($linkimage)
    {
        return asset($linkimage);
    }

    public function areas() {
        return $this->belongsToMany('App\Area');
    }

 
}
