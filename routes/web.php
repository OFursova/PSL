<?php

use App\Http\Controllers\Admin\LawyerController;
use App\Http\Controllers\CaseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainController;
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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/about', [MainController::class, 'about'])->name('about');
// Route::get('/cases', [CaseController::class, 'index'])->name('cases');
// Route::get('/cases/{id}', [CaseController::class, 'show']);
// Route::get('/lawyers', [LawyerController::class, 'getAll'])->name('lawyers');
// Route::get('/lawyers/{id}', [LawyerController::class, 'getOne']);
// Route::get('/contact', [MainController::class, 'contact'])->name('contact');
// Route::post('/contact', [MainController::class, 'getContacts']);

/* ===== RESOURCES FOR REGISTERED USERS ===== */

Route::middleware(['auth'])->group(function(){
    Route::get('/home', [MainController::class, 'index'])->name('home');
    Route::get('/about', [MainController::class, 'about'])->name('about');
    Route::resource('/cases', CaseController::class);
    Route::get('/cases', [CaseController::class, 'index'])->name('cases');
    Route::get('/lawyers', [LawyerController::class, 'getAll'])->name('lawyers');
    Route::get('/lawyers/{id}', [LawyerController::class, 'getOne']);
    Route::get('/contact', [MainController::class, 'contact'])->name('contact');
    Route::post('/contact', [MainController::class, 'getContacts']);
});

/* ===== ADMIN PANEL ===== */

Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function(){
    Route::get('/', [AdminController::class, 'index']);
    Route::resource('/roles', RoleController::class);
    Route::resource('/permissions', PermissionController::class);
    Route::resource('/lawyers', LawyerController::class)->name('get', 'admin-lawyers');
});

/* ====== TESTING ====== */

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// Route::get('/home', function () {
//     return view('home');
// })->middleware(['auth'])->name('home');

// Route::get('/test', [MainController::class, 'test']);

// Route::get('/case', function () {
//     return $case = LegalCase::factory()->make();
// });