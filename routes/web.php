<?php

use App\Http\Controllers\Admin\{
    PermissionController,
    CategoryController,
    ProductController,
    RoleController,
    ColorController,
    ContactController,
    ProfileController,
    UserController,
};
use App\Http\Controllers\{
    HomeController
};
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

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::prefix('admin')
    ->middleware('auth')
    ->group(function () {
        // User Routing
        Route::controller(UserController::class)
            ->prefix('users')
            ->name('user_')
            ->group(function() {
                Route::get('list', 'index')->name('list');
                Route::get('banned/{user}', 'toggleBanUser')->name('ban_user');
                Route::get('banned/{id}/softDeleted', 'banUserSoftDeleted')->name('ban_user_soft_deleted');
                Route::get('delete/softDeleted/{product}', 'deleteSoftDeleted')->name('delete_softDeleted');
                Route::get('list/userSoftDeleted', 'getUserSoftDeleted')->name('list_soft_deleted');
                Route::get('restore/{id}', 'restore')->name('restore');
                Route::get('edit/{user}', 'edit')->name('edit');
                Route::get('show/{user}', 'show')->name('profile_show');
                Route::get('search', 'search')->name('search');
                Route::patch('update/{user}/', 'update')->name('update');
                Route::delete('delete/{user}/user', 'softDelete')->name('soft_delete');
                Route::delete('delete/{user}/force', 'forceDelete')->name('force_delete');
            });
        // Profile Routing
        Route::controller(ProfileController::class)
            ->prefix('profiles')
            ->name('profile_')
            ->group(function() {
                Route::get('show/{user}/profile', 'show')->name('show');
                Route::get('create/profile', 'createProfile')->name('create');
                Route::get('edit/profile', 'edit')->name('edit');
                Route::post('store', 'insert')->name('store');
                Route::patch('update', 'update')->name('update');
            });
        // Role Routing
        Route::controller(RoleController::class)
            ->prefix('roles')
            ->name('role_')
            ->group(function() {
                Route::get('create', 'create')->name('create');
                Route::get('list', 'index')->name('list');
                Route::post('add', 'insert')->name('insert');
                Route::delete('delete/{role}', 'delete')->name('delete');
                Route::get('edit/{role}', 'edit')->name('edit');
                Route::patch('update/{role}', 'update')->name('update');
                Route::get('update/{id}/id/{status}/status', 'updateStatus')->name('update_status');
            });
        // Permission Routing
        Route::controller(PermissionController::class)
            ->prefix('permissions')
            ->name('permission_')
            ->group(function() {
                Route::get('create', 'create')->name('create');
                Route::get('list', 'index')->name('list');
                Route::get('create', 'create')->name('create');
                Route::post('add', 'insert')->name('insert');
                Route::delete('delete/{permission}', 'delete')->name('delete');
                Route::get('edit/{permission}', 'edit')->name('edit');
                Route::patch('update/{permission}', 'update')->name('update');
                Route::get('update/{id}/id/{status}/status', 'updateStatus')->name('update_status');
            });
        // Category Routing
        Route::controller(CategoryController::class)
            ->prefix('categorys')
            ->name('category_')
            ->group(function () {
                Route::get('create', 'create')->name('create');
                Route::post('insert', 'insert')->name('insert');
                Route::get('list', 'index')->name('list');
                Route::delete('delete/{category}', 'delete')->name('delete');
                Route::post('delete/{catIds}/all', 'deleteAll')->name('delete_all');
                Route::get('search', 'search')->name('search');
                Route::get('edit/{category}', 'edit')->name('edit');
                Route::patch('update/{category}', 'update')->name('update');
            });

        // Product Routing
        Route::controller(ProductController::class)
            ->prefix('products')
            ->name('product_')
            ->group(function () {
                Route::get('create', 'create')->name('create');
                Route::get('list', 'index')->name('list');
                Route::post('insert', 'insert')->name('insert');
                Route::get('list/softDeleted', 'listSoftDeletedProduct')->name('list_softDeleted');
                Route::delete('delete/soft/{product}', 'deleteSoft')->name('delete_soft');
                Route::delete('delete/force/{product}', 'deleteForce')->name('delete_force');
                Route::get('delete/softDeleted/{product}', 'deleteSoftDeleted')->name('delete_softDeleted');
                Route::get('restore/{id}', 'restore')->name('restore');
                Route::get('edit/{product}', 'edit')->name('edit');
                Route::patch('update/{product}', 'update')->name('update');
                Route::get('test', 'test')->name('test');
                Route::get('search', 'search')->name('search');
            });
        // Color Routing
        Route::controller(ColorController::class)
            ->prefix('colors')
            ->name('color_')
            ->group(function() {
                Route::get('list', 'index')->name('list');
                Route::get('create', 'create')->name('create');
                Route::post('insert', 'insert')->name('insert');
                Route::get('edit/{color}', 'edit')->name('edit');
                Route::patch('update/{color}', 'update')->name('update');
                Route::delete('delete/{color}', 'delete')->name('delete');
            });
    });

// Create Routing
Route::controller(ContactController::class)
    ->prefix('contacts')
    ->name('contact_')
    ->group(function() {
        Route::get('list', 'index')->name('list');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'insert')->name('store');
        Route::get('read/{contact}', 'read')->name('read');
        Route::delete('delete/{contact}', 'delete')->name('delete');
    });

// Home Controller
Route::controller(HomeController::class)
    ->prefix('homes')
    ->name('home_')
    ->group(function() {
        Route::get('index', 'home')->name('index');
        Route::get('detail/{product}', 'detail')->name('detail');
    });

Route::get('dashboard', function() {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
