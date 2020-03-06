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
    return view('home');
});
Route::resource('employeeReg', 'EmployeeRegistration');

Route::resource('login', 'AdminLoginController');

Route::resource('adminReg', 'AdminRegistration');

Route::resource('mStaffReg', 'MaintainanceStaffReg');

Route::resource('addNewVehical', 'VehicalController');

Route::resource('driverReg', 'DriverRegController');

Route::resource('newRoute', 'RouteController');

Route::resource('addBill', 'AddUtlityBill');

Route::resource('addGraveYard', 'GraveYardReg');

Route::resource('graveBooking', 'graveBooking');

Route::resource('announcment', 'Announcements');
