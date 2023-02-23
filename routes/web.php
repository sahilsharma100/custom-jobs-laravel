<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AddDataInQueue;
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

Route::get('/', [AddDataInQueue::class, 'index'])->name('home');
Route::post('/add-fake-data-in-queue', [AddDataInQueue::class, 'addFakeDataInQueue'])->name('add-fake-data-in-queue');

