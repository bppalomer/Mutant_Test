<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
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
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');

Route::prefix('admin')->middleware(['auth'])->group(function () {

// Routes for viewing the user
    Route::get('/viewUserInfo', [AdminController::class, 'viewUserInfo'])->name('viewUserInfo'); 

//Routes for add products using the admin
    Route::get('/showFormToAddProducts', [AdminController::class, 'showFormToAddProducts'])->name('showFormToAddProducts');
    Route::post('/submitFormToAddProducts', [AdminController::class, 'submitFormToAddProducts'])->name('submitFormToAddProducts');

// Routes for updating user
    Route::get('/update-user/{userId}', [AdminController::class, 'updateUser'])->name('updateUser');
    Route::patch('/save-updated-user/{userId}', [AdminController::class, 'saveUpdatedUser'])->name('saveUpdatedUser');

// Route for deleting user
    Route::delete('/delete-user/{userId}', [AdminController::class, 'deleteUser'])->name('deleteUser');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
