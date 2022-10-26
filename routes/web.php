<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Permissions\AssignPermissionController;
use App\Http\Controllers\Permissions\AssignRoleController;
use App\Http\Controllers\Permissions\PermissionController;
use App\Http\Controllers\Permissions\RoleController;
use App\Http\Controllers\Settings\MenuNavigationController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::middleware('auth')->group(function() {
    Route::prefix('role-permission')->namespace('permissions')->group(function() {
        Route::prefix('assign-permission')->middleware('permission:view assign role to permission')->group(function() {
            Route::get('/', [AssignPermissionController::class, 'index'])->name('assign-permissions.index');
            Route::post('/', [AssignPermissionController::class, 'store'])->name('assign-permissions.store');
            Route::get('/{role}/edit', [AssignPermissionController::class, 'edit'])->name('assign-permissions.edit');
            Route::put('/{role}/edit', [AssignPermissionController::class, 'update']);
        });

        Route::prefix('assign-role')->middleware('permission:view assign user to role')->group(function() {
            Route::get('/', [AssignRoleController::class, 'index'])->name('assign-roles.index');
            Route::post('/', [AssignRoleController::class, 'store'])->name('assign-roles.store');
            Route::get('/{user}/edit', [AssignRoleController::class, 'edit'])->name('assign-roles.edit');
            Route::put('/{user}/edit', [AssignRoleController::class, 'update']);
        });

        Route::prefix('roles')->middleware('permission:view roles')->group(function() {
            Route::get('/', [RoleController::class, 'index'])->name('roles.index');
            Route::post('/', [RoleController::class, 'store'])->name('roles.store');
            Route::get('/{role}/edit', [RoleController::class, 'edit'])->name('roles.edit')->middleware('permission:update role');
            Route::put('/{role}/edit', [RoleController::class, 'update']);
        });
    
        Route::prefix('permissions')->middleware('permission:view permissions')->group(function() {
            Route::get('/', [PermissionController::class, 'index'])->name('permissions.index');
            Route::post('/', [PermissionController::class, 'store'])->name('permissions.store');
            Route::get('/{permission}/edit', [PermissionController::class, 'edit'])->name('permissions.edit')->middleware('permission:update permission');
            Route::put('/{permission}/edit', [PermissionController::class, 'update']);
        });
    });

    Route::namespace('settings')->group(function() {
        Route::prefix('menu-navigations')->middleware('permission:view menu navigations')->group(function() {
            Route::get('/', [MenuNavigationController::class, 'index'])->name('menu-navigations.index');
            Route::post('/', [MenuNavigationController::class, 'store'])->name('menu-navigations.store');
            Route::get('/{menu_navigation}/edit', [MenuNavigationController::class, 'edit'])->name('menu-navigations.edit')->middleware('permission:update menu navigation');
            Route::put('/{menu_navigation}/edit', [MenuNavigationController::class, 'update']);
        });
    });
});

Route::get('/', [HomeController::class, 'index'])->name('home');
