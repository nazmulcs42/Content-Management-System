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

/**start unathenticate routes*/

Route::get('/', 'ItemController@itemShow')->name('item.show');

Route::get('/item/video/details/{data}', 'ItemController@videoDetails')->name('item.video.details');
Route::get('/item/image/details/{data}', 'ItemController@imageDetails')->name('item.image.details');

/**END unathenticate routes*/



Auth::routes();

/**start user's routes*/
//user login-logout
Route::get('/home', 'ItemController@itemShow')->name('home');
Route::get('/user/logout', 'auth\LoginController@userLogout')->name('user.logout');
/**END user's routes*/




/**start admin's routes*/

//admin reset passward

Route::get('admin/password/reset', 'admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('admin/password/email', 'admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('admin/password/reset/{token}', 'admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
Route::post('admin/password/reset', 'admin\ResetPasswordController@reset')->name('admin.password.update');

//admin registration 

Route::get('/admin/register', 'admin\RegisterController@showRegistrationForm')->name('admin.register');
Route::post('/admin/register', 'admin\RegisterController@register')->name('admin.register.submit');


//admin login-logout

Route::get('/admin/login', 'admin\LoginController@showLoginForm')->name('admin.login');
Route::post('/admin/login', 'admin\LoginController@login')->name('admin.login.submit');
Route::get('/admin/logout', 'admin\LoginController@logout')->name('admin.logout');
Route::post('/admin/logout', 'admin\LoginController@logout')->name('admin.logout.submit');
Route::get('/admin', 'AdminController@index')->name('admin.dashboard');

Route::get('/admin/addItem', 'AdminController@addItem')->name('admin.addItem');
Route::post('/admin/addItem', 'AdminController@storeItem')->name('admin.addItem.submit');
Route::get('/admin/item/status', 'AdminController@itemStatusForm')->name('admin.item.status');
Route::get('/admin/item/status/{id}/{status}', 'AdminController@updateItemStatus')->name('admin.item.status.update');


Route::get('admin/item/video/details/{data}', 'AdminController@videoDetails')->name('admin.item.video.details');
Route::get('admin/item/image/details/{data}', 'AdminController@imageDetails')->name('admin.item.image.details');

/**END admin's routes*/

