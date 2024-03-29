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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('messages', 'MessageController');
});

Route::get('/test-vue','Controller@index');
Route::get('/test-vue-2','Controller@second');
Route::get('/test-vue-3','Controller@third');

Route::post('/fetch-users','Controller@postFetchUsers')->name('fetch_users');
Route::post('/store-users','Controller@postStoreUsers')->name('store_users');

require __DIR__.'/auth.php';
