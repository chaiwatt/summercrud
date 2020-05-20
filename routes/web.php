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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('','SummernoteController@Index')->name('index');
Route::get('create','SummernoteController@Create')->name('create');
Route::post('createsave','SummernoteController@CreateSave')->name('createsave');
Route::get('edit/{id}','SummernoteController@Edit')->name('edit');
Route::post('editsave/{id}','SummernoteController@EditSave')->name('editsave');
