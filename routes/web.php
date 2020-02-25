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
    return view('welcome');
});

Route::get('/test',function(){
    return view('dashboard.test');
});
Route::get('preview',function(){
    return view('front.home');
});

Route::get('preview', function(){
    return view('front.home');
});

Route::get('about', function(){
    return view('front.about');
});

Route::get('contact', function(){
    return view('front.contact_us');

});

Route::get('users', function(){
    return view('front.account.update_info');

});


Route::get('statement', function(){
    return view('front.account.statement');

});

Route::get('transactions', function(){
    return view('front.account.transactions');

});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

