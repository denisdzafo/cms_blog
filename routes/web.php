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


Auth::routes();

Route::get('/','PageController@getIndex')->name('index.page');

Route::get('blog','PageController@getBlog')->name('blog.page');

Route::get('about','PageController@getAbout')->name('about.page');

Route::get('author','PageController@getAuthor')->name('author.page');

Route::get('contact','PageController@getContact')->name('contact.page');

Route::get('single-blog/{id}','PageController@getSingleBlog')->name('single.blog.page');

Route::get('admin/login','Admin\AdminLoginController@getLoginForm')->name('admin.login');

Route::post('admin/login/submit','Admin\AdminLoginController@submitLogin')->name('admin.login.submit');

Route::get('moderator/login','Moderator\ModeratorLoginController@getLoginForm')->name('moderator.login');

Route::post('moderator/login/submit','Moderator\ModeratorLoginController@submitLogin')->name('moderator.login.submit');

Route::resource('comments','CommentController');

Route::get('storage/{filename}','HomeController@getPicture')->name('blog.get.picture');

Route::middleware(['auth:admin'])->group(function (){
  Route::prefix('admin')->group(function (){
    Route::get('/', 'Admin\AdminController@index')->name('admin.dashboard');
    Route::get('users','Admin\AdminUsersController@getUsers')->name('admin.users.get');
    Route::delete('users/moderators/{id}','Admin\AdminUsersController@moderatorsPrivilege')->name('admin.users.moderators.privilege');
    Route::delete('user/delete/{id}','Admin\AdminUsersController@deleteUser')->name('admin.user.destroy');

    Route::resource('blog/categories','Admin\BlogCategories');

    Route::resource('testimonials','Admin\TestimonialContoller');

    Route::resource('tags','Admin\TagController');

    Route::resource('adminBlogs','Admin\AdminBlogController');

    Route::get('/moderators/index','Admin\ModeratorsController@index')->name('admin.moderators.index');
    Route::delete('/moderators/remove/privilege/{id}','Admin\ModeratorsController@destroy')->name('admin.modertors.remove.privilege');

    });
});

Route::middleware(['auth:moderator'])->group(function (){
  Route::prefix('moderator')->group(function (){
    Route::get('/', 'Moderator\ModeratorController@index')->name('moderator.dashboard');

    Route::get('users','Moderator\ModeratorController@getUsers')->name('moderator.users.get');
    Route::delete('users/moderators/{id}','Moderator\ModeratorController@moderatorsPrivilege')->name('moderator.users.privilege');

    Route::get('blogs','Moderator\ModeratorController@indexBlog')->name('moderator.blog');
    Route::get('blogs/edit/{id}', 'Moderator\ModeratorController@editBlog')->name('moderator.blog.edit');
    Route::put('blogs/edit/submit/{id}','Moderator\ModeratorController@updateBlog')->name('moderator.blog.update');

    Route::get('edit/profile','Moderator\ModeratorController@editProfile')->name('moderator.edit.profile');
    Route::put('edit/profile/submit/{id}','Moderator\ModeratorController@editProfileSubmit')->name('moderator.edit.profile.submit');
    });
});

Route::middleware(['auth:web'])->group(function (){
  Route::prefix('user')->group(function (){
    Route::get('/', 'User\UserController@index')->name('user.dashboard');
    Route::resource('/blogs', 'User\BlogController');

    Route::get('edit/profile','User\UserController@editProfile')->name('user.edit.profile');
    Route::put('edit/profile/submit/{id}','User\UserController@editProfileSubmit')->name('user.edit.profile.submit');

    Route::get('comments','User\UserController@getComments')->name('user.get.comments');
  });


});
