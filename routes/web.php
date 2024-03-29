<?php

use App\Http\Controllers\CalendarController;
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

//use Symfony\Component\Routing\Annotation\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/users/logout','Auth\LoginController@userLogout')->name('user.logout');
Route::resource('profiles', 'ProfileController');
Route::resource('bookings', 'BookingController');
Route::resource('gallery', 'GalleryController');
Route::get('/calendar', 'CalendarController@index')->name('calendar');

Route::prefix('admin')->group( function(){
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
    Route::group(['middleware' => ['auth:admin']], function() {
        Route::resource('roles','RoleController');
        Route::resource('users','UserController');
    });

    //pasword reset routes
     Route::post('/password/email','Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
     Route::get('/password/reset','Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');     
     Route::post('/password/reset ','Auth\AdminResetPasswordController@reset');           
     Route::get('/password/reset/{token}','Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');     
});


//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

//users
Route::resource('dashboard', 'User\DashboardController');


//admins

Route::resource('admins_dashboard', 'Admin\DashboardController');
Route::resource('categories', 'Admin\CategoryController');
Route::resource('admin_galleries', 'Admin\GalleryController');
Route::get('chart', 'ChartController@index')->name('charts');
Route::resource('sizes', 'SizeController');

