<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\User\UserController;

use App\Http\Controllers\Admin\Bus\BusController;
use App\Http\Controllers\Admin\BusRoutes\BusRouteController;
use App\Http\Controllers\Admin\Stopages\StopageController;
use App\Http\Controllers\Admin\Stopages\RouteStopageController;
use App\Http\Controllers\Admin\Drivers\DriverController;
use App\Http\Controllers\Admin\Schedule\ScheduleController;

use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\DemandsController;


use App\Http\Controllers\Admin\Bus\BusAllocationController;


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


require __DIR__.'/auth.php';

Route::group(['middleware' => 'auth', 'middleware' => 'verified'], function() {

    Route::get('/dashboard',[UserController::class, 'dashboard'])->name('dashboard');

    //__Change password
    Route::post('/user_password/update', [NewPasswordController::class, 'password_update'])->name('user_password.update');

    //__profile_route
    Route::resource('/profile', ProfileController::class);

    //__Demands_route
    Route::resource('/demands', DemandsController::class);

});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::get('/admin/login', [AuthenticatedSessionController::class, 'create'])->name('admin.login')->middleware('guest:admin');

Route::post('/admin/login/store', [AuthenticatedSessionController::class, 'store'])->name('admin.login.store');

Route::group(['middleware' => 'admin'], function() {

    Route::get('/admin', [HomeController::class, 'index'])->name('admin.dashboard');

    Route::post('/admin/logout', [AuthenticatedSessionController::class, 'destroy'])->name('admin.logout');

    Route::resource('/admin/routes', BusRouteController::class);
    Route::resource('/admin/busses', BusController::class);

    Route::resource('/admin/stopages', StopageController::class);
    Route::resource('/admin/route-stopages', RouteStopageController::class);

    Route::resource('/admin/drivers', DriverController::class);

    Route::resource('/admin/schedule', ScheduleController::class);

    Route::get('users/{id}/verify', [UserController::class, 'verify'])->name('user.verify');

    Route::get('users/alloocateBus', [BusAllocationController::class, 'index'])->name('alloocateBus');

});
