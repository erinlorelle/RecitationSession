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

Route::get('/', function () {return view('login');});
Route::get('/home', function () {return view('welcome');});
Route::get('/login', function () {return view('login');});
//Route::get('/reports', function () {return view('reports/index');});

// Users
Route::get('/users', 'UserController@index');
Route::get('/users/delete/{id}', 'UserController@delete');
Route::post('/users', 'UserController@add');
Route::get('/users/edit/{id}', 'UserController@edit');
Route::put('/users/{id}', 'UserController@update');
Route::get('/users/{id}', 'UserController@profile');

// Majors
Route::get('/majors','MajorController@index');
Route::get('/majors/delete/{id}','MajorController@delete');
Route::post('/majors', 'MajorController@add');
Route::get('/majors/edit/{id}', 'MajorController@edit');
Route::put('/majors/{id}', 'MajorController@update');

// Roles
Route::get('/roles', 'RoleController@index');
Route::get('/roles/delete/{id}', 'RoleController@delete');
Route::post('/roles', 'RoleController@add');
Route::get('/roles/edit/{id}', 'RoleController@edit');
Route::put('/roles/{id}', 'RoleController@update');

// Courses
Route::get('/courses', 'CourseController@index');
Route::get('/courses/delete/{id}', 'CourseController@delete');
Route::post('/courses', 'CourseController@add');
Route::get('/courses/edit/{id}', 'CourseController@edit');
Route::put('/courses/{id}', 'CourseController@update');
Route::get('/courses/{id}', 'CourseController@profile');

// Reports
Route::get('/reports', 'ReportsController@index');
Route::get('/reports/attended', 'ReportsController@attended');
Route::get('/reports/canTeach', 'ReportsController@canTeach');
Route::get('/reports/areTeaching', 'ReportsController@areTeaching');
Route::get('/reports/roleUsers', 'ReportsController@roleUsers');
Route::get('/reports/majorCourses', 'ReportsController@majorCourses');
Route::get('/reports/permissions', 'ReportsController@permissions');

// Login
Route::get('/login', 'Auth\LoginController@show');
Route::post('/login', 'Auth\LoginController@auth');
Route::get('/logout', 'Auth\LoginController@logout');

// Register
Route::get('/register', 'UserController@registerPage');
Route::post('/register', 'UserController@register');