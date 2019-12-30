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
    return view('index');
});

//Route::get('/login','LoginController@index')->name('login');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//Route::post('/home/register', 'HomeController@regsiter')->name('home.register');

Route::post('/registration', 'RegisterController@store')->name('registration');
Route::post('/agreementlist', 'AgreementController@agreementlist')->name('agreementlist');
Route::put('/addagreement','AgreementController@add_empagreement')->name('addagreement');
//Auth::routes();
Route::post('/reset_apssword', 'RegisterController@reset_apssword')->name('reset_apssword');
//Route::get('/', 'PostController@index')->name('home');
Route::delete('delete_agreement/{id}/{type}', 'AgreementController@destroy')->name('delete_agreement');

Route::post('/mileagelist', 'MileageController@mileagelist')->name('mileagelist');
Route::post('/addmileage', 'MileageController@addmileage')->name('addmileage');

Route::post('/get_mileagedetails/{id}','MileageController@get_mileage');


Route::resource('users', 'UserController');

Route::resource('roles', 'RoleController');

Route::resource('permissions', 'PermissionController');

Route::resource('posts', 'PostController');


///// Employee Agreement
Route::post('/employeeagreement', 'EmployeeAgreementController@agreementlist')->name('employeeagreement');


//// Faiz 


Route::post('/expences','HomeController@expences')->name('expences');	
Route::post('/expences_list','HomeController@expences_list')->name('expences_list');	



