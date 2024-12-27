<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\Staff\StaffDashboardController;
use App\Http\Controllers\Vendor\VendorDashboardController;
use App\Http\Controllers\Vendor\VendorReservationController;
use App\Http\Controllers\Worker\WorkerDashboardController;
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
    Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::get('admin/users', [AdminUserController::class, 'index'])->name('admin.users.index');
    Route::get('admin/create.user', [AdminUserController::class, 'create'])->name('admin.create.user');
    Route::post('admin/store.user', [AdminUserController::class, 'store'])->name('admin.store.user');
    Route::get('admin/edit.user/{id}', [AdminUserController::class, 'edit'])->name('admin.edit.user');
    Route::put('admin/update.user/{id}', [AdminUserController::class, 'update'])->name('admin.update.user');
    Route::delete('admin/delete.user/{id}', [AdminUserController::class, 'destroy'])->name('admin.delete.user');

    Route::get('admin/reservations', [ReservationController::class, 'index'])->name('admin.reservations.index');
    Route::get('admin/reservations/create', [ReservationController::class, 'create'])->name('admin.reservations.create');
    Route::post('admin/reservations', [ReservationController::class, 'store'])->name('admin.reservations.store');
    Route::get('admin/reservations/{reservation}/edit', [ReservationController::class, 'edit'])->name('admin.reservations.edit');
    Route::put('admin/reservations/{reservation}', [ReservationController::class, 'update'])->name('admin.reservations.update');
    Route::delete('admin/reservations/{reservation}', [ReservationController::class, 'destroy'])->name('admin.reservations.destroy');

});

Route::middleware(['auth', 'role:staff'])->group(function () {
    Route::get('staff/dashboard', [StaffDashboardController::class, 'index'])->name('staff.dashboard');
    Route::get('/create', [StaffDashboardController::class, 'create'])->name('create');
    Route::post('/staff/parking-lot', [StaffDashboardController::class, 'storeParkingLot'])->name('staff.parking_lot.store');

    Route::get('/get-districts/{city_id}', [StaffDashboardController::class, 'getDistricts']);
    Route::get('/get-towns/{district_id}', [StaffDashboardController::class, 'getTowns']);
    Route::get('/get-neighbourhoods/{town_id}', [StaffDashboardController::class, 'getNeighbourhoods']);
});


Route::middleware(['auth', 'role:vendor'])->group(function () {
    Route::get('vendor/dashboard', [VendorDashboardController::class, 'index'])->name('vendor.dashboard');

    Route::get('vendor/reservations', [VendorReservationController::class, 'index'])->name('vendor.reservations.index');
    Route::get('vendor/reservations/create', [VendorReservationController::class, 'create'])->name('vendor.reservations.create');
    Route::post('vendor/reservations', [VendorReservationController::class, 'store'])->name('vendor.reservations.store');
    Route::get('vendor/reservations/{reservation}/edit', [VendorReservationController::class, 'edit'])->name('vendor.reservations.edit');
    Route::put('vendor/reservations/{reservation}', [VendorReservationController::class, 'update'])->name('vendor.reservations.update');
    Route::delete('vendor/reservations/{reservation}', [VendorReservationController::class, 'destroy'])->name('vendor.reservations.destroy');
});

Route::middleware(['auth', 'role:customer'])->group(function () {
    Route::get('customer/dashboard', [CustomerController::class, 'index'])->name('customer.dashboard');
});
