<?php

use Illuminate\Support\Facades\Route;
// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     return view('frontend.templates.default');
// });

Route::get('/', 'Frontend\SiteController@homeapp');

// KONTAK
Route::get('/kontak', 'Frontend\\SiteController@kontak');

// BLOG
Route::get('/blog', 'Frontend\\SiteController@blog');

// BLOGSINGLE
Route::get('/blogsingle', 'Frontend\\SiteController@blogsingle');

// GALERY
Route::get('/galery', 'Frontend\\SiteController@galery');

// GALERY
Route::get('/loggin', 'Frontend\\SiteController@loggin');

// GALERY
Route::get('/registter', 'Frontend\\SiteController@registter');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');