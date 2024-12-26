<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Staff\StaffDashboardController;
use App\Http\Controllers\Vendor\VendorController;
use App\Http\Controllers\Vendor\VendorProductController;
use App\Http\Controllers\Customer\CustomerController;


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

    switch (Auth::user()->role) {
        case 'admin':
            return response()->redirectTo('/admin/dashboard');
        case 'staff':
            return response()->redirectTo('/staff/dashboard');
        case 'vendor':
            return response()->redirectTo('/vendor/dashboard');
        case 'worker':
            return response()->redirectTo('/worker/dashboard');
        case 'customer':
            return response()->redirectTo('/customer/dashboard');
    }
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


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


Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    Route::get('admin/users', [AdminUserController::class, 'index'])->name('admin.users.index');
    Route::get('admin/create.user', [AdminUserController::class, 'create'])->name('admin.create.user');
    Route::post('admin/store.user', [AdminController::class, 'store'])->name('admin.store.user');
    Route::get('admin/edit.user/{id}', [AdminUserController::class, 'edit'])->name('admin.edit.user');
    Route::put('admin/update.user/{id}', [AdminUserController::class, 'update'])->name('admin.update.user');
    Route::delete('admin/delete.user/{id}', [AdminUserController::class, 'destroy'])->name('admin.delete.user');

    Route::get('admin/products', [AdminProductController::class, 'index'])->name('admin.products.index');
    Route::get('admin/products/create', [AdminProductController::class, 'create'])->name('admin.products.create');
    Route::post('admin/products', [AdminProductController::class, 'store'])->name('admin.products.store');
    Route::get('admin/products/{product}/edit', [AdminProductController::class, 'edit'])->name('admin.products.edit');
    Route::put('admin/products/{product}', [AdminProductController::class, 'update'])->name('admin.products.update');
    Route::delete('admin/products/{product}', [AdminProductController::class, 'destroy'])->name('admin.products.destroy');

});

Route::middleware(['auth', 'role:staff'])->group(function () {
    Route::get('staff/dashboard', [StaffDashboardController::class, 'index'])->name('staff.dashboard');
    Route::get('/create', [StaffDashboardController::class, 'create'])->name('create');
    Route::post('/staff/parking-lot/store', [StaffDashboardController::class, 'storeParkingLot'])->name('staff.parking_lot.store');

    Route::get('/get-districts/{city_id}', [StaffDashboardController::class, 'getDistricts']);
    Route::get('/get-towns/{district_id}', [StaffDashboardController::class, 'getTowns']);
    Route::get('/get-neighbourhoods/{town_id}', [StaffDashboardController::class, 'getNeighbourhoods']);
});


Route::middleware(['auth', 'role:vendor'])->group(function () {
    Route::get('vendor/dashboard', [VendorController::class, 'index'])->name('vendor.dashboard');

    Route::get('vendor/products', [VendorProductController::class, 'index'])->name('vendor.products.index');
    Route::get('vendor/products/create', [VendorProductController::class, 'create'])->name('vendor.products.create');
    Route::post('vendor/products', [VendorProductController::class, 'store'])->name('vendor.products.store');
    Route::get('vendor/products/{product}/edit', [VendorProductController::class, 'edit'])->name('vendor.products.edit');
    Route::put('vendor/products/{product}', [VendorProductController::class, 'update'])->name('vendor.products.update');
    Route::delete('vendor/products/{product}', [VendorProductController::class, 'destroy'])->name('vendor.products.destroy');
});

Route::middleware(['auth', 'role:customer'])->group(function () {
    Route::get('customer/dashboard', [CustomerController::class, 'index'])->name('customer.dashboard');
});
