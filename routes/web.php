<?php

Route::get('/','PagesController@home')->name('index');
Route::get('blog/{post}','PostsController@show');

Route::get('posts',function(){
	return App\Post::all();
});


//group especifica un grupo de rutas 'admin/'
Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>'auth'], function(){
	//Rutas de administracion admin/posts, Admin/Controller
	Route::get('/','AdminController@index')->name('dashboard');
	Route::get('posts','PostsController@index')->name('admin.posts.index');
	Route::get('posts/create','PostsController@create')->name('admin.posts.create');
	Route::post('posts','PostsController@store')->name('admin.posts.store');
	Route::get('posts/{post}','PostsController@edit')->name('admin.posts.edit');
	Route::put('posts/{post}','PostsController@update')->name('admin.posts.update');

	Route::post('posts/{post}/photos','PhotosController@store')->name('admin.posts.photos.store');
});

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
//Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
//Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');