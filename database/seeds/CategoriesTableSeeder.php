<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\SubCategory;
class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$category = App\Category::create([
            'name' => 'อิสระแห่งความบันเทิง',
            'slug' => 'อิสระแห่งความบันเทิง'  
        ]);

        App\SubCategory::create([
        	'category_id' => $category->id,
            'name' => 'Clip Hot Star',
            'slug' => 'clip-hot-star'
        ]);
        

        
      

         
    }
}
