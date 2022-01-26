<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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

//$page = define('MAX_PAGINATE',4);

//ticket route controller
Route::get('/', 'TicketController@welcome');
Route::resource('tickets', 'TicketController')->middleware(['auth:web','verified']);
Route::get('soft/{id}', 'TicketController@softDelete')->name('soft')->middleware(['auth:web','verified']);
Route::get('restore/{id}', 'TicketController@restore')->name('restore')->middleware(['auth:web','verified']);
Route::get('delete/{id}', 'TicketController@delete')->name('delete')->middleware(['auth:web','verified']);
Route::get('trashed', 'TicketController@trashed')->name('trashed')->middleware(['auth:web','verified']);
Route::get('home', 'TicketController@home')->name('home')->middleware(['auth:web','verified']);




//hospital route controller
Route::resource('profile', 'HospitalController')->middleware('auth:admin');
Route::get('hospital/soft/{id}', 'HospitalController@softDelete')->name('hospital.soft')->middleware('auth:admin');
Route::get('hospital/restore/{id}', 'HospitalController@restore')->name('hospital.restore')->middleware('auth:admin');
Route::get('hospital/delete/{id}', 'HospitalController@delete')->name('hospital.delete')->middleware('auth:admin');
Route::get('hospital/trashed', 'HospitalController@trashed')->name('hospital.trashed')->middleware('auth:admin');
Route::get('profile/doctors/{id}', 'HospitalController@getDoctors')->name('profile.doctors')->middleware('auth:admin');



//medican route controller
Route::resource('medicans', 'MedicanController')->middleware('auth:admin');
Route::get('medican/soft/{id}', 'MedicanController@softDelete')->name('medican.soft')->middleware('auth:admin');
Route::get('medican/restore/{id}', 'MedicanController@restore')->name('medican.restore')->middleware('auth:admin');
Route::get('medican/delete/{id}', 'MedicanController@delete')->name('medican.delete')->middleware('auth:admin');
Route::get('medican/trashed', 'MedicanController@trashed')->name('medican.trashed')->middleware('auth:admin');
Route::get('medican/services/show/{id}', 'MedicanController@medicanServicesShow')->name('medican.services.show')->middleware('auth:admin');



//auth routs
Auth::routes(['verify' => true]);



//admin login and register
Route::post('admin/login', 'AdminController@adminLogin')->name('admin.login');
Route::post('admin/register', 'AdminController@adminRegister')->name('admin.register');



//admin dashboard
Route::get('admin/register/data', 'AdminController@adminRegisterData')->name('admin.register.data')->middleware('auth:admin');//view register admin
Route::get('admin/login/data', 'AdminController@adminLoginData')->name('admin.login.data')->middleware('check');//view login admin
Route::get('data', 'AdminController@getTickes')->name('data')->middleware('auth:admin');//view login dash
Route::get('soft/admin/{id}', 'AdminController@softDelete')->name('soft.admin')->middleware('auth:admin');//view login dash


//services of doctors
Route::resource('services', 'ServiceController')->middleware('auth:admin');


//add service to doctors
Route::post('service/doctors/add', 'ServiceMedicanController@addServicesDoctor')->name('service.doctors.add');
Route::get('add', 'ServiceMedicanController@getMedicanAndServices')->name('add')->middleware('auth:admin');


//users data of Application
Route::group(['prefix'=>'users','middleware'=>'auth:admin'], function (){

    Route::get('data','UserController@index')->name('users.data');
    Route::get('show/{user}','UserController@show')->name('users.show');
    Route::get('edit/{user}','UserController@edit')->name('users.edit');
    Route::put('update/{user}','UserController@update')->name('users.update');
    Route::delete('destroy/{user}','UserController@destroy')->name('users.destroy');

});



Route::get('bar/{id}', function ($id){

    $hospital = \App\Models\Medican::find($id)->hospital;

    return $hospital;
});
