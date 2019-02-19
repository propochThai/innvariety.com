<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [
		'uses' => 'FrontEndController@index',
		'as' => 'index'

	]);
Route::get('/category/{slug}',[
		'uses' => 'FrontEndController@category',
		'as' => 'list.category'
	]);
Route::get('/tag/{slug}',[
		'uses' => 'FrontEndController@tag',
		'as' => 'list.tag'
	]);

Route::get('/lists', [
		'uses' => 'FrontEndController@lists',
		'as' => 'lists'

	]);
Route::get('/view/{id}', [
		'uses' => 'FrontEndController@view',
		'as' => 'view'

	]);


Auth::routes();





Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){

	Route::get('/home', [
		'uses' => 'HomeController@index',
		'as' => 'home'
	]);

	Route::get('/posts',[
		'uses' => 'PostsController@index',
		'as' => 'posts'
	]);

	Route::get('/posts/trashed',[
		'uses' => 'PostsController@trashed',
		'as' => 'trashed'
	]);

	Route::get('/posts/kill/{id}',[
		'uses' => 'PostsController@kill',
		'as' => 'post.kill'
	]);
	Route::get('/posts/restore/{id}',[
		'uses' => 'PostsController@restore',
		'as' => 'post.restore'
	]);



	Route::get('/post/create',[
		'uses' => 'PostsController@create',
		'as' => 'post.create'
	]);

	Route::get('/post/edit/{id}',[
		'uses' => 'PostsController@edit',
		'as' => 'post.edit'
	]);

	Route::post('/post/update/{id}',[
		'uses' => 'PostsController@update',
		'as' => 'post.update'
	]);

	Route::get('/post/results',[
		'uses' => 'PostsController@search',
		'as' => 'post.search'
	]);
	Route::get('/post/delete/{id}',[
		'uses' => 'PostsController@destroy',
		'as' => 'post.delete'
	]);

	Route::post('/post/store',[
		'uses' => 'PostsController@store',
		'as' => 'post.store'
	]);


	Route::get('/categories',[
		'uses' => 'CategoriesController@index',
		'as' => 'categories'
	]);

	Route::get('/category/create',[
		'uses' => 'CategoriesController@create',
		'as' => 'category.create'
	]);

	Route::get('/category/edit/{id}',[
		'uses' => 'CategoriesController@edit',
		'as' => 'category.edit'

	]);
	Route::get('/category/delete/{id}',[
		'uses' => 'CategoriesController@destroy',
		'as' => 'category.delete'

	]);
	Route::POST('/category/update/{id}',[
		'uses' => 'CategoriesController@update',
		'as' => 'category.update'

	]);

	Route::post('/category/store',[
		'uses' => 'CategoriesController@store',
		'as' => 'category.store'
	]);


	Route::get('/subcategory',[
		'uses' => 'SubCategoriesController@index',
		'as' => 'subcategories'
	]);

	Route::get('/subcategory/create',[
		'uses' => 'SubCategoriesController@create',
		'as' => 'subcategory.create'
	]);
	Route::post('/subcategory/store',[
		'uses' => 'SubCategoriesController@store',
		'as' => 'subcategory.store'
	]);


	Route::get('/subcategory/edit/{id}',[
		'uses' => 'SubCategoriesController@edit',
		'as' => 'subcategory.edit'

	]);
	Route::POST('/subcategory/update/{id}',[
		'uses' => 'SubCategoriesController@update',
		'as' => 'subcategory.update'

	]);

	Route::get('/subcategory/delete/{id}',[
		'uses' => 'SubCategoriesController@destroy',
		'as' => 'subcategory.delete'

	]);

	Route::get('/ajax-subcat',[
		'uses' => 'SubCategoriesController@showsubcat'
		]);

	Route::get('users', [
		'uses' => 'UsersController@index',
		'as' => 'users'
		]);
	Route::get('user/edit/{id}', [
		'uses' => 'UsersController@edit',
		'as' => 'user.edit'
		]);
	Route::POST('/user/update/{id}',[
		'uses' => 'UsersController@update',
		'as' => 'user.update'

	]);
	Route::get('/user/create',[
		'uses' => 'UsersController@create',
		'as' => 'user.create'
	]);
	Route::post('/user/store',[
		'uses' => 'UsersController@store',
		'as' => 'user.store'
	]);

	Route::get('/user/delete/{id}',[
		'uses' => 'UsersController@destroy',
		'as' => 'user.delete'

	]);

	Route::get('banners', [
		'uses' => 'BannersController@index',
		'as' => 'banners'
		]);
	Route::get('/banner/create',[
		'uses' => 'BannersController@create',
		'as' => 'banner.create'
	]);
	Route::post('/banner/store',[
		'uses' => 'BannersController@store',
		'as' => 'banner.store'
	]);
	Route::get('/banner/edit/{id}', [
		'uses' => 'BannersController@edit',
		'as' => 'banner.edit'
		]);

	Route::get('/banner/delete/{id}',[
		'uses' => 'BannersController@destroy',
		'as' => 'banner.delete'

	]);
	Route::POST('/banner/update/{id}',[
		'uses' => 'BannersController@update',
		'as' => 'banner.update'

	]);

	Route::get('/banner/delete/{id}',[
		'uses' => 'BannersController@destroy',
		'as' => 'banner.delete'

	]);

	Route::get('/site/edit/', [
		'uses' => 'SiteController@edit',
		'as' => 'site.edit'
		]);
	Route::POST('/site/update/{id}',[
		'uses' => 'SiteController@update',
		'as' => 'site.update'

	]);

	Route::get('/site/hilightnews/', [
		'uses' => 'SiteController@edithilightnews',
		'as' => 'site.hilightnews'
		]);
	Route::POST('/site/hilightnews/{id}',[
		'uses' => 'SiteController@updatehilightnews',
		'as' => 'site.updatehilightnews'

	]);


	Route::get('/gallery/editform/{id}',[
		'uses' => 'GalleryController@editform',
		'as' => 'gallery.editform'
	]);

	Route::POST('/gallery/store/{id}',[
		'uses' => 'GalleryController@store',
		'as' => 'gallery.store'

	]);
	Route::get('/gallery/delete/{id}',[
		'uses' => 'GalleryController@destroy',
		'as' => 'gallery.delete'

	]);

	/*
	Route::get('/ajax-subcat', function(){
		$cat_id = Input::get('category_id');
		$subcategories = SubCategories::where('category_id','=',$cat_id);
		use Illuminate\Http\Request;
	});
	*/

});
