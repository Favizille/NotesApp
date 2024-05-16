<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Wednesday; Create Controllers and create view with routes 
// Design views for register and login Authentication
// Thursday;Download Admin Template
// Assignment; 


Route::get('/', function () {
    return view('welcome');
});

// Route::get('/register', function () {
//     return view('register');
// });

Route::get('/register', [RegisterController::class, 'register'])->name('register');
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/registration', [RegisterController::class, 'registration'])->name('registration');
Route::post('/loggin-in', [LoginController::class, 'logginIn'])->name('logging-in');
Route::get('/notes', [NoteController::class, 'notes'])->name('notes');

