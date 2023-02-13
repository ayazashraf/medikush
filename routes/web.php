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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::view('/', 'welcome');
Auth::routes();

Route::get('/login/admin', 'Auth\AdminLoginController@showLoginForm');
Route::get('/login/user', 'Auth\LoginController@showUserLoginForm')->name('login');
Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm');
Route::get('/register/user', 'Auth\RegisterController@showUserRegisterForm');

Route::post('/login/admin', 'Auth\AdminLoginController@login');
Route::post('/login/user', 'Auth\LoginController@userLogin');
Route::post('/login', 'Auth\LoginController@userLogin')->name('login');
Route::post('/register/admin', 'Auth\RegisterController@createAdmin');
Route::post('/register/user', 'Auth\RegisterController@create');
Route::post('/logout', 'Auth\LoginController@logout');

Route::view('/home', 'home')->middleware('auth');
Route::view('/admin', 'AdminController@index');
Route::view('/user', 'user');


Route::prefix('admin')->group(function() {

    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');    
    Route::post('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');    
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('logout');        

    // Admin user routes
    Route::prefix('admins')->group(function() {        
        Route::get('/create', 'AdminController@create')->name('admins.create');
        Route::get('/destroy/{id}', 'AdminController@destroy')->name('admins.destroy');
        Route::get('/show/{admin}', 'AdminController@show')->name('admins.show');
        Route::get('/edit/{admin}', 'AdminController@edit')->name('admins.edit');
        Route::put('/update/{admin}', 'AdminController@update')->name('admins.update');
        Route::post('/store', 'AdminController@store')->name('admins.store');
        Route::get('/search','AdminController@search');
        Route::get('/', 'AdminController@index')->name('admin.home');
    });

    // Admin pages routes
    Route::prefix('pages')->group(function() {
        Route::get('/create', 'PageController@create')->name('page.create');
        Route::get('/destroy/{id}', 'PageController@destroy')->name('page.destroy');
        Route::get('/show/{page}', 'PageController@show')->name('page.show');
        Route::get('/edit/{page}', 'PageController@edit')->name('page.edit');
        Route::put('/update/{page}', 'PageController@update')->name('page.update');
        Route::post('/store', 'PageController@store')->name('page.store');                    
        Route::get('/search','PageController@search')->name('page.search');
        Route::get('/removeimage','PageController@removeImage')->name('page.removeImage');     
        Route::get('/', 'PageController@index')->name('page.home');        
    });    

    // Admin blogs routes
    Route::prefix('blogs')->group(function() {
        Route::get('/create', 'BlogController@create')->name('blogs.create');
        Route::get('/destroy/{id}', 'BlogController@destroy')->name('blogs.destroy');
        Route::get('/show/{blog}', 'BlogController@show')->name('blogs.show');
        Route::get('/edit/{blog}', 'BlogController@edit')->name('blogs.edit');
        Route::put('/update/{blog}', 'BlogController@update')->name('blogs.update');
        Route::post('/store', 'BlogController@store')->name('blogs.store');   
        Route::get('/search','BlogController@search')->name('blogs.search');    
        Route::get('/removeblogimage','BlogController@removeImage')->name('blog.removeImage');         
        Route::get('/', 'BlogController@index')->name('blogs.home');                  
    });
    
    

    // Admin Customer routes
    Route::prefix('users')->group(function() {
        Route::get('/create', 'UserController@create')->name('users.create');
        Route::get('/destroy/{id}', 'UserController@destroy')->name('users.destroy');
        Route::get('/show/{user}', 'UserController@show')->name('users.show');
        Route::get('/edit/{user}', 'UserController@edit')->name('users.edit');
        Route::put('/update/{user}', 'UserController@update')->name('users.update');
        Route::post('/store', 'UserController@store')->name('users.store');            
        Route::get('/search','UserController@search')->name('users.search');
        Route::get('/', 'UserController@index')->name('users.home');        
         
    });   

     // Admin Testimonial routes
     Route::prefix('testimonials')->group(function() {
        Route::get('/create', 'TestimonialController@create')->name('testimonials.create');
        Route::get('/destroy/{id}', 'TestimonialController@destroy')->name('testimonials.destroy');
        Route::get('/show/{testimonial}', 'TestimonialController@show')->name('testimonials.show');
        Route::get('/edit/{testimonial}', 'TestimonialController@edit')->name('testimonials.edit');
        Route::put('/update/{testimonial}', 'TestimonialController@update')->name('testimonials.update');
        Route::post('/store', 'TestimonialController@store')->name('testimonials.store');            
        Route::get('/search','TestimonialController@search')->name('testimonials.search');
        Route::get('/', 'TestimonialController@index')->name('testimonials.home');        
        
    });    

    // Admin Product routes
    Route::prefix('products')->group(function() {
        //Route::get('/create', 'BusinessItemController@create')->name('business.create');
        //Route::get('/destroy/{id}', 'BusinessController@destroy')->name('business.destroy');  
        //Route::get('/edit/{business}', 'BusinessController@edit')->name('business.edit');
        //Route::put('/update/{business}', 'BusinessController@update')->name('business.update');
        //Route::post('/store', 'BusinessController@store')->name('business.store');            
        Route::get('/search','BusinessItemController@search')->name('item.search');
        //Route::get('/photos/{business}','BusinessPhotoController@index')->name('photo.home');
        Route::get('/', 'BusinessItemController@index')->name('item.home');        
        
    });    
});