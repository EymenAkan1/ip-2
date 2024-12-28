<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\Admin\Customer1Controller;

use App\Http\Controllers\Staff\StaffDashboardController;

use App\Http\Controllers\Vendor\VendorDashboardController;
use App\Http\Controllers\Vendor\VendorReservationController;
use App\Http\Controllers\Vendor\VendorParkingLotController;
use App\Http\Controllers\Vendor\VendorServiceController;
use App\Http\Controllers\Vendor\VendorWorkerController;

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

    Route::get('admin/users', [AdminUserController::class, 'index'])->name('admin.users_index');
    Route::get('admin/users/{user}', [AdminUserController::class, 'show'])->name('admin.users_show');
    Route::get('admin/user.create', [AdminUserController::class, 'create'])->name('admin.users_create');
    Route::post('admin/user.store', [AdminUserController::class, 'store'])->name('admin.users_store');
    Route::get('admin/user.edit/{id}', [AdminUserController::class, 'edit'])->name('admin.users_edit');
    Route::put('admin/user.update/{id}', [AdminUserController::class, 'update'])->name('admin.users_update');
    Route::delete('/admin/users/{user}', [AdminUserController::class, 'destroy'])->name('admin.users_destroy');

    Route::get('admin/reservations', [ReservationController::class, 'index'])->name('admin.reservations_index');
    Route::get('admin/reservations/{reservation}', [ReservationController::class, 'show'])->name('admin.reservations_show');
    Route::get('admin/reservations/create', [ReservationController::class, 'create'])->name('admin.reservations_create');
    Route::post('admin/reservations', [ReservationController::class, 'store'])->name('admin.reservations_store');
    Route::get('admin/reservations/{reservation}/edit', [ReservationController::class, 'edit'])->name('admin.reservations_edit');
    Route::put('admin/reservations/{reservation}', [ReservationController::class, 'update'])->name('admin.reservations_update');
    Route::delete('admin/reservations/{reservation}', [ReservationController::class, 'destroy'])->name('admin.reservations_destroy');

    Route::get('admin/all_parking_lots', [AdminUserController::class, 'index'])->name('admin.all_parking_lots_index');
    Route::get('admin/available_parking_lots', [AdminUserController::class, 'index'])->name('admin.available_parking_lots_index');

    Route::get('admin/customers', [Customer1Controller::class, 'index'])->name('admin.customers_index');

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
// Dashboard Routes
    Route::get('vendor/dashboard', [VendorDashboardController::class, 'index'])->name('vendor.dashboard');
    Route::get('vendor/dashboard/edit/{id}', [VendorDashboardController::class, 'edit'])->name('vendor.dashboard.edit');
    Route::post('vendor/dashboard/update/{id}', [VendorDashboardController::class, 'update'])->name('vendor.dashboard.update');

    // Reservation Routes
    Route::get('/reservations', [VendorReservationController::class, 'index'])->name('vendor.reservations.index');
    Route::get('/reservations/edit/{id}', [VendorReservationController::class, 'edit'])->name('vendor.reservations.edit');
    Route::post('/reservations/update/{id}', [VendorReservationController::class, 'update'])->name('vendor.reservations.update');
    Route::delete('/reservations/destroy/{id}', [VendorReservationController::class, 'destroy'])->name('vendor.reservations.destroy');

    Route::delete('/vendor/parking-lots/{id}', [ParkingLotController::class, 'destroy'])->name('vendor.parking_lots.destroy');

    // Parking Lot Routes
    Route::resource('parking-lots', VendorParkingLotController::class)->except(['show']);
    Route::get('/vendor/parking-lots', [ParkingLotController::class, 'index'])->name('vendor.parking_lots');
    Route::post('/vendor/parking-lots', [ParkingLotController::class, 'store'])->name('vendor.parking_lots.store');

    // Service Routes
    Route::resource('services', VendorServiceController::class)->except(['show']);

    // Worker Routes
    Route::resource('workers', VendorWorkerController::class)->except(['show']);
});


Route::middleware(['auth', 'role:customer'])->group(function () {
    Route::get('customer/dashboard', [CustomerController::class, 'index'])->name('customer.dashboard');
});
