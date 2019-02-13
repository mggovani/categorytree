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

Route::get('/', function () {
	if (Auth::check()) {
    return redirect('category');
}else{
    return view('auth.login');
}
});

Auth::routes();
Route::group(['middleware' => ['auth']], function () {
	// Route::get('dashboard', 'HomeController@index')->name('dashboard');
	Route::get('category', 'Category\CategoryController@view')->name('category');
Route::post('category_add', 'Category\CategoryController@store')->name('category_add');
Route::get('category_data', 'Category\CategoryController@category_data')->name('category_data');
Route::get('category_edit/{id}', 'Category\CategoryController@edit')->name('category_edit');
Route::get('category_delete/{id}', 'Category\CategoryController@delete')->name('category_delete');
Route::put('category_update/{id}', 'Category\CategoryController@update')->name('category_update');

Route::get('subcategory', 'Subcategory\SubcategoryController@view')->name('subcategory');
Route::post('subcategory_add', 'Subcategory\SubcategoryController@store')->name('subcategory_add');
Route::get('subcategory_data', 'Subcategory\SubcategoryController@subcategory_data')->name('subcategory_data');
Route::get('subcategory_edit/{id}', 'Subcategory\SubcategoryController@edit')->name('subcategory_edit');
Route::get('subcategory_delete/{id}', 'Subcategory\SubcategoryController@delete')->name('subcategory_delete');
Route::put('subcategory_update/{id}', 'Subcategory\SubcategoryController@update')->name('subcategory_update');

Route::get('item', 'Item\ItemController@view')->name('item');
Route::post('item_add', 'Item\ItemController@store')->name('item_add');
Route::get('item_data', 'Item\ItemController@item_data')->name('item_data');
Route::get('item_edit/{id}', 'Item\ItemController@edit')->name('item_edit');
Route::get('item_delete/{id}', 'Item\ItemController@delete')->name('item_delete');
Route::put('item_update/{id}', 'Item\ItemController@update')->name('item_update');

Route::get('tree', 'Category\CategoryController@tree')->name('tree');
});
