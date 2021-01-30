<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', '\App\Http\Livewire\Welcome')->name('welcome');
Route::get('/about', '\App\Http\Livewire\About')->name('about');
Route::get('/contact', '\App\Http\Livewire\Contact')->name('contact');
Route::get('/enquiry', '\App\Http\Livewire\Enquiry')->name('enquiry');
Route::get('/product/{slug}', '\App\Http\Livewire\ProductDetail')->name('product.show');
Route::get('/category/{slug}', '\App\Http\Livewire\Category')->name('shop.category');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home'); //

Route::group([
    'prefix' => 'dashboard',
    'as' => 'dashboard.',
    'namespace' => 'Backend',
    'middleware' => ['auth', 'checkadmin']
], function () {

    Route::get('/index', 'DashboardController@index')->name('index');
    Route::resource('slideshows', 'SlideshowController', ['except' => ['show']]);
    Route::resource('/categories', 'CategoryController', ['except' => ['show']]);
    Route::get('/categories/json', 'CategoryController@getCategoriesJson')->name('categories.json');
    Route::resource('/product', 'ProductController', ['except' => ['show']]);
    Route::get('/products/json', 'ProductController@getProductsJson')->name('products.json');

    Route::post('/product/image/upload', 'ProductController@uploadImage')->name('product.image.upload-image');
    Route::post('/product/image/delete', 'ProductController@deleteImage')->name('product.image.delete-image');

    Route::post('/product/specification/delete', 'ProductController@deleteSpecification')->name('product.specification.delete');

    Route::get('/settings', 'ConfigurationController@getConfiguration')->name('settings');
    Route::post('/settings', 'ConfigurationController@postConfiguration')->name('settings.update');
    Route::get('/search-product', 'ProductController@searchProduct')->name('search.product');

    Route::resource('team', 'TeamController', ['except' => ['show']]);
    Route::get('/get-team', 'TeamController@getTeamJson')->name('team.json');

    Route::resource('page', 'PageController', ['except' => ['show']]);
    Route::get('/get-pages', 'PageController@getPagesJson')->name('pages.json');
});


