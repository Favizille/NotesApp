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

// Assignment
// 1. Create a Notes View with it's adequate route and contorller
// 2. Following the procedure we use in registering a user, Login a user and if the login is not successful redirect to the login page but if it is successful redirect to the notes view route you created above. 


Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [RegisterController::class, 'register'])->name('register');
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/registration', [RegisterController::class, 'registration'])->name('registration');
Route::post('/loggin-in', [LoginController::class, 'logginIn'])->name('logging-in');
Route::get('/notes', [NoteController::class, 'notes'])->name('notes');
Route::post('/note/create', [NoteController::class, 'store'])->name('note.create');
