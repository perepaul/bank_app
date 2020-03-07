<?php

use App\Http\Controllers\Admin\AdminController;
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
Route::group(['middleware' => 'web'], function () {
    Route::get('login', function(){
        return "login";
    })->name('user-login');

    Route::get('login', function(){
        return "login";
    })->name('admin-login');

    Route::get('/', function () {
        return view('front.home');
    })->name('home');

    Route::get('about', function(){
        return view('front.about');
    })->name('about');

    Route::get('contact', function(){
        return view('front.contact_us');

    })->name('contact');
});


// User area routes

Route::group(['middleware' => ['isUser'],'prefix'=>'dashboard'], function () {

    Route::namespace('User')->group(function(){

        Route::get('/', function(){
            return "lol";
        });
    });




});



Route::get('statement', function(){
    return view('front.account.statement');

});

Route::get('transactions', function(){
    return view('front.account.transactions');

});

// Route::get('dashboard', function(){
//     return view('front.user_dashboard.index');

// });





// Route::get('/home', 'HomeController@index')->name('home');

// Admin routes
Route::get('admin/login','Admin\AdminController@showAdminLogin')->name('admin-login');
Route::group(['prefix' => 'admin', "middleware"=>['isAdmin']], function () {
    Route::namespace('Admin')->group(function() {
        Route::get('/', 'AdminController@index');
        Route::get('users','AdminController@getUsers')->name('get-users');
    });

});
