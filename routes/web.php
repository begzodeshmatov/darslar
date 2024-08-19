<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/userdelete/{id}', 'HomeController@userdelete');
Route::post('/userSave', 'HomeController@userSave');
Route::post('/userEditSave/{id}', 'HomeController@userEditSave');

Route::get('/students', 'HomeController@student');
Route::get('/studentdelete/{id}', 'HomeController@studentdelete');
Route::post('/studentSave', 'HomeController@studentSave');
Route::post('/studentEditSave/{id}', 'HomeController@studentEditSave');

Route::get('/teacher', 'HomeController@teacher');
Route::post('/teacherSave', 'HomeController@teacherSave');
Route::post('/teacherEditSave/{id}', 'HomeController@teacherEditSave');
Route::get('/teacherdelete/{id}', 'HomeController@teacherdelete');


// 1-kishi

Route::get('/library', 'HomeController@teacher');
Route::post('/librarySave', 'HomeController@librarySave');
Route::post('/libraryEditSave/{id}', 'HomeController@libraryEditSave');
Route::get('/librarydelete/{id}', 'HomeController@librarydelete');



// 2-kishi






// 3-kishi






