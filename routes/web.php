<?php

use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth', 'role:admin'])->name('admin')->prefix('admin')->group(function () {
    Route::get('/', [IndexController::class, 'index']);
    Route::resource('/role', RoleController::class);
    Route::resource('/permission', PermissionController::class);
    Route::post('/role/{role}/permission', [RoleController::class, 'givePermission'])->name('role.permission');
    Route::delete('/role/{role}/permission/{permission}', [RoleController::class, 'revokePermission'])->name('rolepermission.destroy');
    Route::delete('/permission/{permission}/role/{role}', [PermissionController::class, 'revokeRole'])->name('permissionrole.destroy');
    Route::post('/permission/{permission}/role', [PermissionController::class, 'giveRole'])->name('permissions.roles');
    Route::resource('/user', UserController::class);

    Route::delete('/user/{user}/role/{role}', [UserController::class, 'revokeRole'])->name('users.revoke');
    Route::post('/user/{user}/role', [UserController::class, 'giveRole'])->name('user.role');
    Route::post('/user/{user}/permission', [UserController::class, 'givePermission'])->name('user.permission');
    Route::delete('/user/{user}/permission/{permission}', [UserController::class, 'revokePermission'])->name('user.permission.revoke');
});

Route::get('/admin', function () {
    return view('admin.index');
})->middleware(['auth', 'role:admin'])->name('admin');

require __DIR__ . '/auth.php';
