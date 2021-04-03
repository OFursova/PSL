<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\LawyerController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\CaseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainController;
use App\Mail\CaseRequest;
use App\Models\LegalCase;
use Illuminate\Support\Facades\Mail;
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

require __DIR__.'/auth.php';

/* ===== RESOURCES FOR GUESTS ===== */

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', [MainController::class, 'about'])->name('about');

/* ===== RESOURCES FOR REGISTERED USERS ===== */

Route::middleware(['auth'])->group(function(){
    Route::get('/home', [MainController::class, 'index'])->name('home');
    Route::resource('/cases', CaseController::class)->name('get', 'cases');
    Route::post('/cases/filter', [CaseController::class, 'filter'])->name('filter');
    Route::get('/lawyers', [LawyerController::class, 'getAll'])->name('lawyers');
    Route::get('/lawyers/{id}', [LawyerController::class, 'getOne']);
    Route::get('/lawyers/{id}/edit', [LawyerController::class, 'editLawyer'])->middleware('role:lawyer');
    Route::post('/lawyers/{id}', [LawyerController::class, 'saveChanges'])->middleware('role:lawyer');
    Route::post('/lawyers/filter', [LawyerController::class, 'filter']);
    Route::get('/contact', [MainController::class, 'contact'])->name('contact');
    Route::post('/contact', [MainController::class, 'getContacts']);
});

/* ===== ADMIN PANEL ===== */

Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function(){
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::resource('/roles', RoleController::class);
    Route::resource('/permissions', PermissionController::class);
    Route::resource('/lawyers', LawyerController::class)->name('get', 'admin-lawyers');
    Route::post('/lawyers/filter', [LawyerController::class, 'adminFilter']);
});

/* ====== TESTING ====== */

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

// Route::get('/test', [MainController::class, 'test']);
