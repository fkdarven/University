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
    return view('welcome');
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');			
Route::get('enrollments/activate_enrollments','EnrollmentController@showInactivate');
Route::get('enrollments/enrollment','EnrollmentController@studentIndex');
Route::get('courses/allcourses','CourseController@allCourses');
Route::get('/notifications/{id}','NotificationController@markAsRead');
Route::get('/notifications2/{id}','NotificationController@markAsRead2');
Route::get('/notifications','NotificationController@index');
Route::resource('students','StudentController');
Route::resource('enrollments','EnrollmentController');
Route::resource('courses','CourseController');
Route::resource('admins','AdministratorController');
