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
use App\Http\Controllers\TimeSettingsController;

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
    Route::post('modules/remove/user', [ModulesController::class, 'removeuser'])->name('modules.removeuser');
    Route::resource('/modules', ModulesController::class)->name('*', 'modules');

    Route::prefix('/settings')->name('settings.')->group(function () {
        Route::get('/backup', [SettingsController::class, 'dumpSql'])->name('backup');
        Route::get('/time-settings', [TimeSettingsController::class, 'index'])->name('time');
        Route::post('/year', [SettingsController::class, 'setYear'])->name('setYear');
        Route::resource('/', SettingsController::class)->name('*', '');
        // sīks komentārs šim pašam merge-request ?
    });


    Route::post('/import/users', [ImportController::class, 'importUsers'])->name('import.users');
    Route::post('/import/modules', [ImportController::class, 'importModules'])->name('import.modules');
    Route::resource('/import', ImportController::class)->name('*', 'import');

    Route::get('/profile',  [ProfileController::class, 'index'])->name('profile.index');
    Route::post('/profile', [ProfileController::class, 'store'])->name('profile.store');
    Route::post('/profile/password', [ProfileController::class, 'password'])->name('profile.password');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


    Route::resource('plans', PlansController::class)->only(['show','edit','index', 'destroy']);
//    Route::get('plans/{id}', [PlansController::class, 'show'])->name('plans.show');
//    Route::get('plans/{id}/edit', [PlansController::class, 'edit'])->name('plans.edit');
//    Route::get('/plans',  [PlansController::class, 'index'])->name('plans.index');


});


require __DIR__.'/auth.php';
