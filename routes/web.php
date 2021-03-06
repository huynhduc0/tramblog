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
Route::get('admin_shop_add',['as'=>'admin_shop_add', 'uses'=>'AdminController@shop']);
Route::get('admin_shop',['as'=>'admin_shop', 'uses'=>'AdminController@shop_list']);
Route::post('addtype', ['as'=>'addtype', 'uses'=>'AdminController@addtype']);
Route::post('updatetype', ['as'=>'updatetype', 'uses'=>'AdminController@updatetype']);
Route::post('changetype_acc', ['as'=>'changetype_acc', 'uses'=>'AdminController@changetype_acc']);
Route::post('postaddproduct', ['as'=>'postaddproduct','uses'=>'AdminController@postaddproduct']);
Route::get('duyethang/{id}', ['as'=>'duyethang', 'uses'=>'AdminController@duyethang']);
Route::get('chanhang/{id}', ['as'=>'chanhang', 'uses'=>'AdminController@chanhang']);
Route::get('admin_product',['as'=>'admin_product', 'uses'=>'AdminController@admin_product']);
Route::post('addtypeproduct', ['as'=>'addtypeproduct', 'uses'=>'AdminController@addtypeproduct']);

Route::get('hienhang/{id}', ['as'=>'duyet', 'uses'=>'AdminController@hienhang']);
Route::get('anhang/{id}', ['as'=>'chan', 'uses'=>'AdminController@anhang']);
Route::get('duyetloaihang/{id}', ['as'=>'duyetloai', 'uses'=>'AdminController@duyetloaihang']);
Route::get('chanloaihang/{id}', ['as'=>'chanloai', 'uses'=>'AdminController@chanloaihang']);
Route::post('updatetypeproduct', ['as'=>'updatetypeproduct', 'uses'=>'AdminController@updatetypeproduct']);

Route::get('suaproduct/{id}', ['as'=>'suaproduct', 'uses'=>'AdminController@suaproduct']);
Route::post('saveproduct/{id}', ['as'=>'saveproduct', 'uses'=>'AdminController@saveproduct']);

Route::get('shop/home',['as'=>'shop/home','uses'=>'ShopController@index']);
Route::get('shop/viewshop',['as'=>'shop/viewshop','uses'=>'ShopController@viewshop']);
Route::get('shop/brand/{brand}',['as'=>'shop/viewshop','uses'=>'ShopController@viewShopViaBrand']);
Route::get('shop/detail/{id}',['as'=>'shop/detail','uses'=>'ShopController@viewProduct']);
Route::post('shop/addCart',['as'=>'shop/addCart','uses'=>'ShopController@addCart']);
Route::get('shop/cart',['as'=>'shop/cart','uses'=>'ShopController@cart']);
Route::get('shop/checkout',['as'=>'shop/checkout','uses'=>'ShopController@checkout']);
Route::post('shop/updateCart',['as'=>'shop/updateCart','uses'=>'ShopController@updateCart']);
Route::post('shop/deleteCart',['as'=>'shop/deleteCart','uses'=>'ShopController@deleteCart']);
Route::get('shop/getTinhThanhPho',['as'=>'shop/getTinhThanhPho','uses'=>'ShopController@getTinhThanhPho']);
Route::get('shop/getQuanHuyen/{matp}',['as'=>'shop/getQuanHuyen','uses'=>'ShopController@getQuanHuyen']);
Route::get('shop/getXaPhuong/{maqh}',['as'=>'shop/getXaPhuong','uses'=>'ShopController@getXaPhuong']);
Route::post('shop/makeorder',['as'=>'shop/makeorder','uses'=>'ShopController@makeorder']);
Route::post('shop/rate',['as'=>'shop/rate','uses'=>'ShopController@rate']);
Route::get('shop/ratestar/{id}/{start}',['as'=>'shop/ratestart','uses'=>'ShopController@ratestar']);

Route::get('shop/random',['as'=>'shop/random','uses'=>'ShopController@random']);

