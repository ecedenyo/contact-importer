<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

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
// Route::view('/', 'index')->name('home');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/contacts/importer', function () {
    return view('contacts.importer');
})->name('contact-importer');
Route::middleware(['auth:sanctum', 'verified'])->get('/contacts', [ContactController::class, 'index'])->name('contacts');
Route::middleware(['auth:sanctum', 'verified'])->post('/contacts/importer', [ContactController::class, 'store'])->name('contacts.store');
