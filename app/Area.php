<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    public function banner(){
        return $this->belongsToMany('App\Banner');
    }
}
