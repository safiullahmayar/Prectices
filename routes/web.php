<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
// route for admin dashboard
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/profile', [AdminController::class, 'admin_profile'])->name('admin.profile');
    Route::post('/admin/update', [AdminController::class, 'update'])->name('update.admin');
    Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');
    Route::get('/admin/change_password', [AdminController::class, 'change_password'])->name('change_password');
    Route::post('/admin/changePasswordSave', [AdminController::class, 'changePasswordSave'])->name('changePasswordSave');
});
// end of routes admins
//  amenites route
Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::controller(PropertyController::class)->group(function () {
        Route::get('/amenites/allamenites', 'allamenites')->name('amenites.allamenites');
        Route::post('/amenites/add_amenites', 'add_amenites')->name('amenites.store');
        Route::get('/amenites/create_amenites', 'create_amenites')->name('create_amenites');
        Route::get('/amenites/edit_amenites/{id}', 'edit_amenites')->name('edit_amenites');
        Route::post('/amenites/update_amenites/{id}', 'update_amenites')->name('update_amenites');
        Route::get('/amenites/delete_menites/{id}', 'amenites_destroy')->name('delete_amenites');
    });
});
//  properties routes
Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::controller(PropertyController::class)->group(function () {
        Route::get('/property/alltype', 'index')->name('property.alltype');
        Route::post('/property/add', 'store')->name('property.store');
        Route::get('/property/create', 'create')->name('property.create');
        Route::get('/property/edit/{id}', 'edit')->name('property.edit');
        Route::post('/property/update/{id}', 'update')->name('property.update');
        Route::get('/property/delete/{id}', 'destroy')->name('property.delete');
    });
});
//  properties routes end

// route for agents 
Route::middleware(['auth', 'role:agent'])->group(function () {
    Route::get('/agent/dashboard', [AgentController::class, 'index'])->name('agent.dashboard');
});
// end route od agents routes 
// route for login of user , admin and agents 
Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');

require __DIR__ . '/auth.php';
