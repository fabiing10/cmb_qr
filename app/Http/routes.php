<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'UserController@login');

//Redirect Applications
Route::get('redirect/login', ['uses' => 'HomeController@redirectURL']);

Route::get('redirect/camara', function(){
  return redirect()->to('/administrator');
});


//Super Administrator Routers
Route::group(['prefix'=>'control','middleware'=>['auth','AccessControl']],function(){

    Route::get('/', 'SuperAdminController@dashboard');
    Route::group(['prefix'=>'users'],function(){
        Route::get('/', 'SuperAdminController@users');
        Route::get('/generateCodes', 'SuperAdminController@generateCodesQR');
        Route::get('/add', 'SuperAdminController@addUser');
        Route::post('/add', 'SuperAdminController@createUser');
        Route::post('/add', 'SuperAdminController@createUser');
        Route::get('/qr/{id}', 'SuperAdminController@codeQR');

    });

});


Route::group(['prefix'=>'administrator','middleware'=>['auth','AccessAdmin']],function(){
      Route::get('/', 'AdministratorController@dashboard');
});


//Login Routers
Route::post('login', ['as' => 'auth.login', 'uses' => 'Auth\AuthController@authenticate']);
Route::get('logout', ['as' => 'auth.logout', 'uses' => 'Auth\AuthController@logout']);

Route::get ('/redirect','SocialController@redirect');
Route::get ('/callback','SocialController@callback');

Route::get ('/redirect/google','SocialController@redirectGoogle');
Route::get ('/callback/google','SocialController@callbackGoogle');

Route::get('login', 'UserController@login');
//Register Account
Route::get('register', 'UserController@register');
Route::post('register', 'UserController@createUser');
//User Account

Route::get('clave', 'UserController@dataAccess');
Route::post('clave', 'UserController@restoreDataAccess');

Route::get('password/email', 'Auth\PasswordController@getEmail');
 Route::post('password/email', 'Auth\PasswordController@postEmail');


 Route::get('password/reset/{token}','Auth\PasswordController@getReset');
 Route::post('password/reset', 'Auth\PasswordController@postReset');



//Search Routers
Route::get('events', 'UserController@viewReport');
Route::post('events', 'UserController@reportCode');
Route::get('events/{id}', 'SuperAdminController@eventFound');
Route::post('events/{id}', 'SuperAdminController@saveEvent');

Route::get('agradecimiento', 'UserController@thanks');

Route::get('/home', 'HomeController@index');
Route::get('/codigos', 'HomeController@code');
Route::get('/mapa', 'HomeController@map');
