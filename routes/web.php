<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('main.home');
});

Route::get('/services', function () {
    return view('main.services');
});

Route::get('/about', function () {
    return view('main.about');
});

Route::get('/invisalign', function () {
    return view('main.services.invisalign');
});

Route::get('/preventive', function () {
    return view('main.services.preventive');
});

Route::get('/restorative', function () {
    return view('main.services.restorative');
});

Route::get('/cosmetic', function () {
    return view('main.services.cosmetic');
});

Route::get('/loginpage', function () {
    return view('loginpage');
});


Route::get('/email-exists', [MainController::class, 'emailExists']);
Route::post('/register', [MainController::class, 'register']);
Route::post('/login', [MainController::class, 'login']);
Route::post('/signOut', [MainController::class, 'signOut']);

Route::get('registersuccess', [MainController::class, 'registersuccess']);


//Admin Routes
Route::get('/dashboard', [AdminController::class, 'dashboard']);
Route::get('/records', [AdminController::class, 'records']);
Route::get('/patients', [AdminController::class, 'patients']);
Route::post('/storeRecord', [AdminController::class, 'storeRecord']);
Route::post('/storePatient', [AdminController::class, 'storePatient']);
Route::get('/getRecords', [AdminController::class, 'getRecords']);
Route::get('/getPatients', [AdminController::class, 'getPatients']);
Route::post('/deletePatient', [AdminController::class, 'deletePatient']);
Route::get('/mouth', [AdminController::class, 'mouth']);
