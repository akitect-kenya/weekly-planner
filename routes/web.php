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
Route::post('/departments', 'DepartmentsController@store');
Route::put('/departments/{department}', 'DepartmentsController@update');
Route::delete('/departments/{department}', 'DepartmentsController@destroy');

// Grades
Route::post('/grades', 'GradesController@store');
Route::put('/grades/{grade}', 'GradesController@update');
Route::delete('/grades/{grade}', 'GradesController@destroy');

// Subjects
Route::post('/subjects', 'SubjectsController@store');
Route::put('/subjects/{subject}', 'SubjectsController@update');
Route::delete('/subjects/{subject}', 'SubjectsController@destroy');

// Users
Route::post('/users', 'UsersController@store');
Route::put('/users/{user}', 'UsersController@update');
Route::delete('/users/{user}', 'UsersController@destroy');

// Setups
Route::post('/setups', 'WeekSetupsController@store');
Route::put('/setups/{setup}', 'WeekSetupsController@update');
Route::delete('/setups/{setup}', 'WeekSetupsController@destroy');