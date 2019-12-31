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
Route::post('/agreementlist', 'HomeController@agreement_list')->name('agreementlist');
Route::put('/addagreement','HomeController@add_empagreement')->name('addagreement');
//Auth::routes();
Route::post('/employee_agreementlist', 'HomeController@employee_agreementlist')->name('employee_agreementlist');

Route::post('/reset_apssword', 'RegisterController@reset_apssword')->name('reset_apssword');
//Route::get('/', 'PostController@index')->name('home');
Route::delete('delete_agreement/{id}/{type}', 'HomeController@destroy')->name('delete_agreement');

Route::post('/mileagelist', 'MileageController@mileagelist')->name('mileagelist');
Route::post('/addmileage', 'MileageController@addmileage')->name('addmileage');
Route::post('/employeemileage','MileageController@employee_mileagelist');
Route::post('/get_mileagedetails/{id}','MileageController@get_mileage');
Route::post('/updatemileage','MileageController@updatemileage');
Route::post('/deletemileage/{id}','MileageController@deletemileage');

Route::resource('users', 'UserController');

Route::resource('roles', 'RoleController');

Route::resource('permissions', 'PermissionController');

Route::resource('posts', 'PostController');


///// Employee Agreement
//Route::post('/employeeagreement', 'EmployeeAgreementController@agreementlist')->name('employeeagreement');


//// Faiz 


/*Route::post('/expences','HomeController@expences')->name('expences');	
Route::post('/expences_list','HomeController@expences_list')->name('expences_list');*/

//Faiz route
Route::post('/expences','HomeController@expences')->name('expences');	
Route::post('/expences_list','HomeController@expences_list')->name('expences_list');	
Route::post('/expences_edit_view','HomeController@edit_view_expences')->name('expences_edit_view');	
Route::post('/expences_edit','HomeController@expences_edit')->name('expences_edit');	
Route::post('/delete_expence','HomeController@delete_expence')->name('delete_expence');	
Route::post('/expence_approve','HomeController@expence_approve')->name('expence_approve');	
Route::post('/expence_reject','HomeController@expence_reject')->name('expence_reject');	
Route::post('/expences_histocial','HomeController@expences_histocial')->name('expences_histocial');	
// end	



