<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Contracts\Permission;

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
        Route::get('/amenites/create_amenites', 'create_amenites')->name('create_amenites');
        Route::post('/amenites/add_amenites', 'add_amenites')->name('amenites.store');
        Route::get('/amenites/edit_amenites/{id}', 'edit_amenites')->name('edit_amenites');
        Route::post('/amenites/update_amenites/{id}', 'update_amenites')->name('update_amenites');
        Route::get('/delete_menites/{id}', 'amenites_destroy')->name('delete_amenites');
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

    // this is permission 
    Route::controller(PermissionController::class)->group(function () {
        Route::get('/permission/all', 'index')->name('permission.index');
        Route::get('/permission/create', 'create')->name('create_permission');
        Route::post('/permission/add', 'store')->name('permission.store');
        Route::get('/permission/edit/{id}', 'edit')->name('permission.edit');
        Route::post('/permission/update/{id}', 'update')->name('permission.update');
        Route::get('/permission/delete/{id}', 'destroy')->name('permission.delete');
        // files routes
        Route::get('/permission/import_excel', 'import_excel')->name('permission.import_excel');
        Route::post('/permission/import', 'import')->name('permission.import');
        Route::get('/permission/export', 'export_permission')->name('export_permission');
    });
    // Role routes
    Route::controller(RoleController::class)->group(function () {
        Route::get('/role/all', 'index')->name('role.index');
        Route::get('/role/create', 'create')->name('create_role');
        Route::post('/role/add', 'store')->name('role.store');
        Route::get('/role/edit/{id}', 'edit')->name('role.edit');
        Route::post('/role/update/{id}', 'update')->name('role.update');
        Route::get('/role/delete/{id}', 'destroy')->name('role.delete');
        // permission to role
        Route::get('/permission_role/index', 'permission_to_role')->name('permission_to_role');
        Route::get('/permission_role/all_role_permission', 'all_role_permission')->name('all_role_permission');

        Route::get('/permission_role/store', 'permission_store')->name('permission_store');
        Route::get('/permission_role/edit/{id}', 'role_permission_edit')->name('role_permission_edit');
        Route::get('/permission_role/update/{id}', 'role_permission_update')->name('role_permission_update');
        Route::get('/permission_role/delete/{id}', 'role_permission_delete')->name('role_permission_delete');


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
