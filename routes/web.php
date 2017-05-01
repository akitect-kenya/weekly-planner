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
    return redirect('/home');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

// Sidenav
Route::get('/academic', 'AcademicTabController@index');
Route::get('/administrative', 'AdministrativeTabController@index');
Route::get('/plans', 'PlansTabController@index');

// Departments
Route::get('/departments', 'DepartmentsController@index');
Route::get('/departments/create', 'DepartmentsController@create');
Route::post('/departments', 'DepartmentsController@store');
Route::get('/departments/{department}', 'DepartmentsController@show');
Route::get('/departments/{department}/edit', 'DepartmentsController@edit');
Route::put('/departments/{department}', 'DepartmentsController@update');
Route::delete('/departments/{department}', 'DepartmentsController@destroy');

Route::get('/subjects', 'SubjectsController@index');
Route::post('/subjects', 'SubjectsController@store');
Route::delete('/subjects/{subject}', 'SubjectsController@destroy');


Route::get('/users', 'UsersController@index');
Route::post('/users', 'UsersController@store');
Route::delete('/users/{user}', 'UsersController@destroy');

Route::post('/setups', 'WeekSetupsController@store');
Route::delete('/setups/{setup}', 'WeekSetupsController@destroy');