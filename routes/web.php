<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\ModulesController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PlansController;
use App\Http\Controllers\ImportController;
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

Route::middleware(['auth'])->group(function() {
    Route::resource('/users',   UsersController::class)->name('*', 'users');
    Route::resource('/roles',   RolesController::class)->name('*', 'roles');
    Route::resource('/modules', ModulesController::class)->name('*', 'modules');
      Route::get('/settings/backup', [SettingsController::class, 'dumpSql'])->name('settings.backup');
    Route::resource('/settings', SettingsController::class)->name('*', 'settings');

    Route::post('/import/users', [ImportController::class, 'importUsers'])->name('import.users');
    Route::post('/import/modules', [ImportController::class, 'importModules'])->name('import.modules');
    Route::resource('/import', ImportController::class)->name('*', 'import');

    Route::get('/profile',  [ProfileController::class, 'index'])->name('profile.index');
    Route::post('/profile', [ProfileController::class, 'store'])->name('profile.store');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    /* Testa plāni */

    Route::get('plans/1', [PlansController::class, 'show'])->name('plans.show');
    Route::get('/plans',  [PlansController::class, 'index'])->name('plans.index');


});


require __DIR__.'/auth.php';
