<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Style extends Model
{
    //
 
     public function SubCategory(){
        return $this->hasMany('App\SubCategory');
    }



}

    
