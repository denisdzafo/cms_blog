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
    return view('welcome');
});

Auth::routes();

Route::get('admin/login','Admin\AdminLoginController@getLoginForm')->name('admin.login');

Route::post('admin/login/submit','Admin\AdminLoginController@submitLogin')->name('admin.login.submit');

Route::get('moderator/login','Moderator\ModeratorLoginController@getLoginForm')->name('moderator.login');

Route::post('moderator/login/submit','Moderator\ModeratorLoginController@submitLogin')->name('moderator.login.submit');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', 'Admin\AdminController@index')->name('admin.dashboard');

Route::middleware(['auth:admin'])->group(function (){
  Route::prefix('admin')->group(function (){
    Route::get('/', 'Admin\AdminController@index')->name('admin.dashboard');
    Route::get('users','Admin\AdminUsersController@getUsers')->name('admin.users.get');
    Route::delete('users/moderators/{id}','Admin\AdminUsersController@moderatorsPrivilege')->name('admin.users.moderators.privilege');

    Route::resource('blog/categories','Admin\BlogCategories');
  });
});

Route::middleware(['auth:moderator'])->group(function (){
  Route::prefix('moderator')->group(function (){
    Route::get('/', 'Moderator\ModeratorController@index')->name('moderator.dashboard');


  });
});
