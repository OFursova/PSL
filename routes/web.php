<?php

use App\Http\Controllers\CaseController;
use App\Http\Controllers\HomeController;
use App\Models\LegalCase;
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

//Route::resource('/cases', CaseController::class); // later ->only(['index', 'show']);

/* ===== RESOURCES FOR REGISTERED USERS ===== */

Route::middleware(['auth'])->group(function(){
    Route::resource('/cases', CaseController::class);
    Route::get('/cases', [CaseController::class, 'index'])->name('cases');
});



/* ===== ADMIN PANEL ===== */

// Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function(){
//     Route::get('/', [AdminController::class, 'index']);
//     Route::resource('/roles', RoleController::class);
//     Route::resource('/permissions', PermissionController::class);
//     Route::resource('/lawyers', LawyerController::class);
// });

/* ====== TESTING ====== */

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/home', function () {
    return view('home');
})->middleware(['auth'])->name('home');

// Route::get('/test', [MainController::class, 'test']);

// Route::get('/case', function () {
//     return $case = LegalCase::factory()->make();
// });