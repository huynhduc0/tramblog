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
Route::get('homepage', ['as'=>'homepage', 'uses'=>'Home@index']);
Route::get('view/{id}', ['as'=>'view', 'uses'=>'Home@viewAPost']);
Route::get('category/{category}', ['as'=>'category', 'uses'=>'Home@viewPostsViaCategory']);
Route::get('dn', ['as'=>'dn', 'uses'=>'UserController@login']);
Route::get('out', ['as'=>'out', 'uses'=>'UserController@out']);
Route::post('checklogin', ['as'=>'checklogin', 'uses'=>'UserController@checklogin']);
Route::post('register', ['as'=>'register', 'uses'=>'RegisterController@register']);
Auth::routes();
Route::get('/home', 'Home@index')->name('home');
Route::get('loadmore/{offset}/{limit}', ['as'=>'loadmore', 'uses'=>'Home@loadmore']);
Route::post('post_comment', ['as'=>'post_comment', 'uses'=>'Home@post_comment']);
Route::get('bio', 'Home@bio')->name('bio');
Route::get('writepost', ['as'=>'writepost', 'uses'=>'Home@writepost']);
Route::post('savepost', ['as'=>'savepost', 'uses'=>'Home@savepost']);
Route::get('suapost/{id}', ['as'=>'suapost', 'uses'=>'Home@suapost']);
Route::post('updatepost/{id}', ['as'=>'updatepost', 'uses'=>'Home@updatepost']);
Route::post('changestatus', ['as'=>'changestatus', 'uses'=>'Home@changestatus']);
Route::get('bio', ['as'=>'bio', 'uses'=>'Home@bio']);
Route::post('savebio', ['as'=>'savebio', 'uses'=>'Home@savebio']);
Route::get('search/{key}', ['as'=>'search', 'uses'=>'Home@search']);
Route::get('notify', function ()
{
	return view('test');
});
Route::get('test', function () {
    event(new App\Events\StatusNotify('Someone'));
    return "Event has been sent!";
});
Route::get('ad', ['as'=>'ad', 'uses'=>'AdminController@index']);
Route::get('duyet/{id}', ['as'=>'duyet', 'uses'=>'AdminController@duyet']);
Route::get('chan/{id}', ['as'=>'chan', 'uses'=>'AdminController@chan']);
Route::get('duyetloai/{id}', ['as'=>'duyetloai', 'uses'=>'AdminController@duyetloai']);
Route::get('chanloai/{id}', ['as'=>'chanloai', 'uses'=>'AdminController@chanloai']);
Route::get('admin_type',['as'=>'admin_type', 'uses'=>'AdminController@type']);
Route::post('addtype', ['as'=>'addtype', 'uses'=>'AdminController@addtype']);
Route::post('updatetype', ['as'=>'updatetype', 'uses'=>'AdminController@updatetype']);
Route::post('changetype_acc', ['as'=>'changetype_acc', 'uses'=>'AdminController@changetype_acc']);