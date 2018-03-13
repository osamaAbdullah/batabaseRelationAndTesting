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

Route::get('/',['uses' => 'PagesController@index', 'as'   => 'index']);


//posts route
Route::get('/posts',['uses' => 'PostsController@index', 'as' => 'post.index']);

Route::get('/posts/create',['uses' => 'PostsController@create', 'as' => 'post.create']);

Route::post('/posts/save',['uses' => 'PostsController@save', 'as' => 'post.save']);

Route::get('/posts/{post}',['uses' => 'PostsController@delete', 'as' => 'post.delete']);

Route::get('/posts/{post}/view',['uses' => 'PostsController@view', 'as' => 'post.view']);

Route::get('/posts/{post}/edit',['uses' => 'PostsController@edit', 'as' => 'post.edit']);

Route::post('/posts/{post}/update',['uses' => 'PostsController@update', 'as' => 'post.update']);

Route::post('comment/create',['uses' => 'CommentsController@save', 'as' => 'addComment']);

Route::get('comment/{post}/show',['uses' => 'CommentsController@view', 'as' => 'viewPostWithComments']);



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
