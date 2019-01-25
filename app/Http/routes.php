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

//Super Administrator Routers
Route::group(['prefix'=>'control','middleware'=>['auth','AccessControl']],function(){

    Route::get('/', 'SuperAdminController@dashboard');

    Route::group(['prefix'=>'veterinary'],function(){
      Route::get('/', 'SuperAdminController@veterinary');
      Route::get('/reporte/excel', 'SuperAdminController@reportVeterinary');
      Route::post('/add', 'SuperAdminController@veterinarySave');
      Route::get('/add', 'SuperAdminController@addVeterinary');
      Route::get('/{veterinaryId}', 'SuperAdminController@veterinaryId');
      Route::get('delete/{veterinaryId}', 'SuperAdminController@deleteVeterinary');
      Route::post('add/headquarter/{veterinaryId}', 'SuperAdminController@addHeadquarter');
    });

    Route::group(['prefix'=>'admin'],function(){
        Route::post('/', 'SuperAdminController@adminSave');
        Route::get('/', 'SuperAdminController@admin');
    });

    Route::group(['prefix'=>'codes'],function(){
        Route::get('/', 'SuperAdminController@codes');
        Route::post('/', 'SuperAdminController@codeSave');
        Route::get('/assign/{code}', 'SuperAdminController@getVeterinariansToAssign');
        Route::get('/assign/{headquarter}/{code}', 'SuperAdminController@assignCode');
        Route::get('/delete/{codeId}', 'SuperAdminController@deleteCode');
        Route::get('/qr/{codeId}', 'SuperAdminController@codeQR');
        Route::get('/generate', 'SuperAdminController@generateCodesQR');

    });

    Route::group(['prefix'=>'pets'],function(){
        Route::get('/', 'SuperAdminController@pets');
        Route::get('/reporte/excel', 'SuperAdminController@report');
        Route::get('/profile/{id}', 'SuperAdminController@petProfile');
        Route::get('/profile/clinicHistory/{id}', 'SuperAdminController@getClinicHistory');
    });

    Route::group(['prefix'=>'users'],function(){
        Route::get('/', 'SuperAdminController@users');
        Route::get('/generateCodes', 'SuperAdminController@generateCodesQR');
        Route::get('/add', 'SuperAdminController@addUser');
        Route::post('/add', 'SuperAdminController@createUser');
        Route::post('/add', 'SuperAdminController@createUser');
        Route::get('/qr/{id}', 'SuperAdminController@codeQR');
        /*
        Route::get('/reporte/excel', 'SuperAdminController@reportUsers');
        Route::get('/profile/{id}', 'SuperAdminController@userProfile');
        Route::get('/transfer/{id}', 'SuperAdminController@getTransfer');
        Route::post('/transfer', 'SuperAdminController@setTransfer');
        Route::post('/delete', 'SuperAdminController@deleteUser');
        */
    });

});

/*
// Administrator Routers
Route::group(['prefix'=>'administrator','middleware'=>['auth','AccessAdmin']],function(){

      //Access Dashboard
      Route::get('/', 'AdministratorController@dashboard');

      //Codes Routers
      Route::group(['prefix'=>'codes'],function(){
          Route::get('/', 'AdministratorController@codes');
          Route::post('/assign/headquarter', 'AdministratorController@assignHeadquarter');
          Route::get('/required/{id}', 'AdministratorController@requestCodes');
          Route::get('/required/save/{code}/{pet}', 'AdministratorController@requestAssign');
          Route::get('/assign/{code}', 'AdministratorController@assignPets');
          Route::get('/assign/{pet}/{code}', 'AdministratorController@saveAssign');
      });

      //Clients Routers
      Route::group(['prefix'=>'clients'],function(){

          Route::get('/', 'AdministratorController@clients');
          Route::get('/profile/{id}', 'AdministratorController@clientProfile');
          Route::post('/assignPet', 'AdministratorController@assignPetUser');
          Route::get('/delete/{id}', 'AdministratorController@clientDelete');
          Route::get('/add', 'AdministratorController@addClient');
          Route::post('/add', 'AdministratorController@clientSave');
          //Route::get('/{id}', 'AdministratorController@clientId');
          Route::get('/edit/{id}', 'AdministratorController@editClient');
          Route::post('/edit/{id}', 'AdministratorController@updateClient');
          Route::get('/report', 'AdministratorController@reportClients');

      });

      //Pets Routers
      Route::group(['prefix'=>'pets'],function(){
          Route::get('/', 'AdministratorController@pets');
          Route::post('/add/{id}', 'AdministratorController@petSave');
          Route::get('/races/{petType}', 'AdministratorController@getRaces');
          Route::get('/add/{id}', 'AdministratorController@addPet');
          Route::get('/profile/edit/{id}', 'AdministratorController@editPet');
          Route::post('/profile/edit/{id}', 'AdministratorController@updatePet');
          Route::get('/profile/{id}', 'AdministratorController@petProfile');
          Route::post('/profile/{id}', 'AdministratorController@petProfileUpdate');
          Route::get('/profile/clinicHistory/reporte/{option}/{id}', 'AdministratorController@report');
          Route::get('/profile/clinicHistory/add/{id}', 'AdministratorController@clinicHistory');
          Route::post('/profile/clinicHistory/add/{id}', 'AdministratorController@addclinicHistory');
          Route::get('/profile/clinicHistory/{id}', 'AdministratorController@getClinicHistory');
          Route::get('/profile/vaccines/{id}', 'AdministratorController@getVaccines');
          Route::get('/profile/vaccines/reporte/{option}/{id}', 'AdministratorController@reportVaccines');
          Route::get('/profile/MedicalAppointment/add/{id}', 'AdministratorController@medicalAppointments');
          Route::post('/profile/MedicalAppointment/add/{id}', 'AdministratorController@addmedicalAppointments');
          Route::get('/profile/vaccines/add/{id}', 'AdministratorController@vaccines');
          Route::post('/profile/vaccines/add/{id}', 'AdministratorController@addvaccines');
          Route::get('/report', 'AdministratorController@reportPets');

      });

      //Appointments Routers
      Route::group(['prefix'=>'appointments'],function(){
          Route::get('/', 'AdministratorController@appointments');
          Route::post('/', 'AdministratorController@appointmentsSave');
          Route::get('/pets', 'AdministratorController@getPetsAppointments');
          Route::get('/{id}', 'AdministratorController@getAppointment');
          Route::get('/reschedule/{id}', 'AdministratorController@selectAppointment');
          Route::post('/reschedule/{id}', 'AdministratorController@rescheduleAppointments');
          Route::get('/details/{id}', 'AdministratorController@detailsAppointment');
          Route::get('/cancel', 'AdministratorController@cancelAppointments');
          Route::post('/cancel', 'AdministratorController@cancelAppointments');
          Route::get('/reactive/{id}', 'AdministratorController@activeAppointments');
          Route::post('/reactive/{id}', 'AdministratorController@activeAppointments');
      });

      //Codes Routers
      Route::group(['prefix'=>'headquarters'],function(){
          Route::get('/', 'AdministratorController@headquarters');
          Route::get('/report/excel', 'AdministratorController@reportHeadquarters');
          Route::get('/add/administrator', 'AdministratorController@getHeadquarters');
          Route::post('/add/administrator', 'AdministratorController@saveAdministrator');
          Route::get('/add', 'AdministratorController@addHeadquarter');
          Route::post('/add', 'AdministratorController@saveHeadquarter');
          Route::get('/edit/{id}', 'AdministratorController@editHeadquarter');
          Route::post('/edit/{id}', 'AdministratorController@updateHeadquarter');
          Route::get('/delete/{id}', 'AdministratorController@deleteHeadquarter');
          Route::get('/edit/administrator/{id}', 'AdministratorController@editHcAdmin');
          Route::post('/edit/administrator/{id}', 'AdministratorController@updateHcAdmin');
          Route::get('/delete/administrator/{id}', 'AdministratorController@deleteHcAdmin');
          //Route::get('/add', 'AdministratorController@veterinarys');
      });

      //Route::group(['prefix'=>'clinicHistory'],function(){
      //    Route::get('/add/{id}', 'AdministratorController@addclinicHistory');
      //});

});
*/
/*
// Users Routers
Route::group(['prefix'=>'user','middleware'=>['auth','AccessUser']],function(){


    Route::get('/', 'UserController@dashboard');
    Route::post('/', 'UserController@updateUser');
    Route::get('/appointments', 'UserController@appointment');
    Route::get('/appointments/{id}', 'UserController@getappointment');
    Route::get('/appointments/cancel', 'UserController@cancelappointment');
    Route::post('/appointments/cancel', 'UserController@cancelappointment');
    Route::get('/pets/edit/{id}', 'UserController@editPet');
    Route::post('/pets/edit/{id}', 'UserController@updatePet');
    Route::get('/pets/add', 'UserController@addPet');
    Route::post('/pets/add', 'UserController@savePet');
    Route::get('/pets', 'UserController@pets');
    Route::get('/pets/delete/', 'UserController@petDelete');
    Route::post('/pets/delete/', 'UserController@petDelete');
    Route::post('/pets/request', 'UserController@requestsCodes');
    Route::get('/profile', 'UserController@profile');
    Route::get('/profile/edit', 'UserController@editUser');
    Route::post('/profile/edit', 'UserController@updateUser');
    Route::post('/profile/delete/', 'UserController@deleteUser');
    Route::get('/pets/lost', 'UserController@petLost');
    Route::get('/races/{petType}', 'AdministratorController@getRaces');
    Route::post('/pets', 'UserController@savePet');
    Route::get('/pets/profile/{id}', 'UserController@petProfile');
    Route::get('/pets/profile/history/{id}', 'UserController@historySearchByPetId');
    Route::post('/pet/report', 'UserController@reportPet');
    Route::post('/pet/report/found', 'UserController@reportPetFound');
    Route::get('/code/{id}', 'UserController@getCodeByPet');
    Route::get('/pets/profile/vaccines/reporte/{option}/{id}', 'UserController@reportVaccines');
    Route::get('/pets/profile/clinicHistory/reporte/{option}/{id}', 'UserController@reportHc');
    Route::get('/pets/profile/clinicHistory/{id}', 'UserController@getClinicHistory');
    Route::get('/pets/profile/vaccines/{id}', 'AdministratorController@getVaccines');
});
*/

//Login Routers
//Route::get('login', ['as' => 'auth.login', 'uses' => 'Auth\AuthController@showLoginForm']);
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


//validate Data
Route::post('validate/username', 'UserController@validateUsername');
Route::post('validate/email', 'UserController@validateEmail');
Route::post('validate/form/username', 'UserController@validateUsernameFormContainer');
Route::post('validate/form/email', 'UserController@validateEmailFormContainer');
Route::post('validate/form/code', 'UserController@validateCodeFormContainer');
Route::post('validate/form/nit', 'SuperAdminController@validateNit');

Route::get('races/{petType}', 'AdministratorController@getRaces');


//Search Routers
Route::get('events', 'UserController@viewReport');
Route::post('events', 'UserController@reportCode');
Route::get('events/{id}', 'SuperAdminController@eventFound');
Route::post('events/{id}', 'SuperAdminController@saveEvent');

Route::get('agradecimiento', 'UserController@thanks');

Route::get('/home', 'HomeController@index');
Route::get('/codigos', 'HomeController@code');
Route::get('/mapa', 'HomeController@map');
