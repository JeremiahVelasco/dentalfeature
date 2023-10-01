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

Route::get('/loginpage', function () {
    return view('loginpage');
});

Route::get('/registerpage', function () {
    return view('registerpage');
});

Route::get('/email-exists',[MainController::class,'emailExists']);
Route::post('/register',[MainController::class,'register']);
Route::post('/login',[MainController::class,'login']);
Route::post('/signOut',[MainController::class,'signOut']);

Route::get('registersuccess',[MainController::class,'registersuccess']);


//Admin Routes
Route::get('/records', [AdminController::class, 'records']);
Route::get('/patients', [AdminController::class, 'patients']);
Route::get('/addrecord', [AdminController::class, 'addRecord']);
Route::post('/storeRecord', [AdminController::class, 'storeRecord']);
Route::get('/getRecords', [AdminController::class, 'getRecords']);
//Route::get('/mouth', [AdminController::class, 'admin.mouth']);
Route::get('/admin/mouth', [AdminController::class, 'getRecords'])->name('admin.mouth');

