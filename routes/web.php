<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\ModulesController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PlansController;
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
    Route::post('/settings/import-users', [SettingsController::class, 'importUsers'])->name('settings.import-users');
    Route::post('/settings/import-modules', [SettingsController::class, 'importModules'])->name('settings.import-modules');
    Route::get('/settings/backup', [SettingsController::class, 'dumpSql'])->name('settings.backup');
    Route::resource('/settings', SettingsController::class)->name('*', 'settings');



    Route::get('/profile',  [ProfileController::class, 'index'])->name('profile.index');
    Route::post('/profile', [ProfileController::class, 'store'])->name('profile.store');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    /* Testa plāni */

    Route::get('plans/1', [PlansController::class, 'show'])->name('plans.show');
    Route::get('/plans',  [PlansController::class, 'index'])->name('plans.index');


});


require __DIR__.'/auth.php';
