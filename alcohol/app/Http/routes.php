<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@authenticate');
Route::get('logout', 'Auth\AuthController@getLogout');

// Using A Route Closure...
Route::get('admin', [
    'middleware' => 'auth',
    'uses' => 'AdminController@dashboard'
]);
// Admin routes
Route::group([ 'prefix' => 'admin', 'middleware' => 'auth'], function() {
	Route::get('dashboard', 'AdminController@dashboard');	
	// Categories
	Route::get('categories', 'AdminController@getCategories');
	Route::get('category/add', 'AdminController@addCategory');
	Route::post('category/add', 'AdminController@storeCategory');
	Route::get('category/{id}/edit', 'AdminController@editCategory');
	Route::post('category/{id}/edit', 'AdminController@updateCategory');
	Route::delete('category/{id}/delete', 'AdminController@deleteCategory');
	
	// Categories
	Route::get('sub_categories', 'AdminController@getSubCategories');
	Route::get('sub_category/add', 'AdminController@addSubCategory');
	Route::get('sub_category/add/{id}', 'AdminController@addSubCategory');
	Route::post('sub_category/add', 'AdminController@storeSubCategory');
	Route::get('sub_category/{id}/edit', 'AdminController@editSubCategory');
	Route::post('sub_category/{id}/edit', 'AdminController@updateSubCategory');
	Route::delete('sub_category/{id}/delete', 'AdminController@deleteSubCategory');
});

// user route
Route::get('/', function() 
{
	 $categories = \App\Category::paginate(15);
     return View::make("ace_admin.views.home", ['categories' => $categories]);
});

// GET route
Route::get('login', function() {
  return View::make('login');
});

// GET route
Route::get('get_form', function() {
	/*$category_id = Input::get('category_id');
	if(Request::ajax()){
	  	$sub_categories = \App\SubCategory::where("category_id", $category_id)->lists("alcohol_content_per_item","liter_per_item","description","name", "id");
	  	$sub_category_select = \App\SubCategory::where("category_id", $category_id)->lists("name", "id");
	    return View::make("ace_admin.views.get_form", ['sub_categories' => $sub_categories, 'sub_category_select' => $sub_category_select]);
	} */
	return View::make("ace_admin.views.get_form");  
});

Route::get('/documentation', function()
{
	return View::make('documentation');
});