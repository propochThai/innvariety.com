<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Conner\Tagging\Taggable;

class Post extends Model
{
   	use SoftDeletes;
   	use Taggable;
   	
    protected $fillable=[
    	'user_id,','keyword','description','title','featured','textcontent','videocontent','subcategory_id','slug'
    ];
   
    public function getFeaturedAttribute($featured)
    {
    	return asset($featured);
    }
	
    protected $dates =['deleted_at'];

    public function subcategory(){
    	return $this->belongsTo('App\SubCategory');
    }

    public function user(){
      return $this->belongsTo('App\User');
    }
    
}
