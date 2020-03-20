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
    Route::namespace('User')->group(function () {
        Route::get('logout', 'UserController@logout')->name('logout');
        Route::post('adduser', 'UserController@store')->name('adduser');
        Route::delete('deleteuser/{id}', 'UserController@destroy')->name('deleteuser');
        Route::post('updateuser/{id}', 'UserController@update')->name('updateuser');
        Route::get('login', 'UserController@showLogin')->name('user-login-form');
        Route::post('login', 'UserController@login')->name('user-login');
    });

    Route::namespace('Admin')->group(function () {

        Route::get('admin/login', 'AdminController@showAdminLogin')->name('admin-login-form');
        Route::post('admin/login', 'AdminController@login')->name('admin-login');
    });



    Route::get('/', 'PagesController@home')->name('home');

    Route::get('about', 'PagesController@about')->name('about');

    Route::get('contact', 'PagesController@contact')->name('contact');

    Route::post('contact', "ContactController@store")->name('contact-us');
});


// User area routes

Route::group(['middleware' => ['isUser'], 'prefix' => 'dashboard'], function () {

    Route::namespace('User')->group(function () {

        Route::get('/', 'UserController@index');
        Route::post('validate-otp', 'UserController@validateOtp');
        Route::get('transfer', 'UserController@transfer')->name('transfer');
        Route::get('send-otp', 'UserController@sendOtp')->name('send-otp');
        Route::post('validate-transfer', 'UserController@makeTransfer');
        Route::get('transfers', 'UserController@transfers')->name('transfers');
        Route::get('statement', 'UserController@statement')->name('statement');
    });
});



// Route::get('/home', 'HomeController@index')->name('home');

// Admin routes

Route::group(['prefix' => 'admin', "middleware" => ['isAdmin']], function () {
    Route::namespace('Admin')->group(function () {
        Route::get('/', 'AdminController@index');
        Route::get('users', 'AdminController@getUsers')->name('get-users');
    });
});
