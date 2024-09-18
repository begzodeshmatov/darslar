<?php

use Illuminate\Support\Facades\Route;
use App\Baza;
use App\Books;

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
    $get =Baza::paginate(6);
    return view('welcome', [
        'baza'=>$get
    ]);
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

Route::get('/library', 'HomeController@library');
Route::post('/librarySave', 'HomeController@librarySave');
Route::post('/libraryEditSave/{id}', 'HomeController@libraryEditSave');
Route::get('/librarydelete/{id}', 'HomeController@librarydelete');



// 2-kishi
Route::get('/kitoblar', 'BookController@kitoblar');
Route::post('/bookSave', 'BookController@bookSave');
Route::post('/booksEditSave/{id}', 'BookController@booksEditSave');
Route::get('/bookdelete/{id}', 'BookController@bookdelete');
Route::get('/exportBooks','BookController@exportBooks');
Route::post('/import', 'BookController@importBooks'); 




// 3-kishi
Route::get('/baza', 'BazaController@baza');
Route::post('/bazaSave', 'BazaController@bazaSave');
Route::get('/bazaDelete/{id}', 'BazaController@bazaDelete');
Route::post('/bazaEdit/{id}', 'BazaController@bazaEdit');
Route::get('/export','BazaController@export');
Route::post('/import','BazaController@import'); 
Route::get('/export-pdf/{id}', 'BazaController@exportPDF');
Route::get('/export-word','BazaController@exportWord');


Route::post('/bazafilter', 'BazaController@bazafilter');





//UserFile uchun

Route::get('/userfile', 'UserFileController@userfile');
Route::post('/UserFileSave', 'UserFileController@UserFileSave');
Route::get('export-word-id/{id}',[UserFileController::class , 'exportword']);



Route::get('/contact', 'BazaController@contact');



Route::get('test/{id}/photo/{photo_id}' , function($id,$photo_id){
    return 'Sizning  id raqamingiz: '.$id . 'sizning photo_id raqamingiz: ' . $photo_id;
});









