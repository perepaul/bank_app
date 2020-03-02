<?php


use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('front.home');
})->name('home');


Route::get('news', function(){
    return view('front.news');

})->name('news');

Route::get('about', function(){
    return view('front.about');
})->name('about');

Route::get('contact', function(){
    return view('front.contact_us');

})->name('contact');

Route::get('services', function(){
    return view('front.services');

})->name('services');

// User area routes

Route::group(['middleware' => ['auth'],'prefix'=>'account'], function () {
    Route::get('/', 'UserController@index');
    Route::get('update', 'UserController@edit')->name('update-account');
});



Route::get('statement', function(){
    return view('front.account.statement');

});

Route::get('transactions', function(){
    return view('front.account.transactions');

});





Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Admin routes
