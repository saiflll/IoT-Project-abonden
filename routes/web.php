<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\DataSensorController;
use App\Http\Controllers\ConfigHeaterController;
use App\Http\Controllers\ConfigLampController;
use App\Http\Controllers\DashboardController;
Route::get('/', function () {
    return view('welcome');
});

// Routes for user authentication and profile management
Route::prefix('auth')->group(function () {
    Route::get('register', function () {
        return view('auth.register');
    })->name('register-view');

    Route::get('login', function () {
        return view('auth.login');
    })->name('login-view');

    Route::post('register', [AuthController::class, 'register'])->name('register');
    Route::post('login', [AuthController::class, 'login'])->name('login');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth:sanctum');
});

// Routes for authenticated users
Route::middleware('auth:sanctum')->group(function () {
    Route::get('me', [AuthController::class, 'me'])->name('me');
    Route::get('check-role/{role}', [AuthController::class, 'checkRole'])->name('check-role');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('devices', DeviceController::class);
    
    // Admin-only routes
    Route::middleware('role:admin')->group(function () {
        Route::get('admin-only', function () {
            // Your logic here
        })->name('admin-only');
    });
});

// Route untuk menerima data dari ESP
Route::post('data-sensor', [DataSensorController::class, 'store']);

// Route untuk menampilkan dan mengedit konfigurasi heater
Route::get('config-heater/{configHeater}/edit', [ConfigHeaterController::class, 'edit'])->name('config_heater.edit');
Route::put('config-heater/{configHeater}', [ConfigHeaterController::class, 'update'])->name('config_heater.update');

// Route untuk menampilkan dan mengedit konfigurasi lamp
Route::get('config-lamp/{configLamp}/edit', [ConfigLampController::class, 'edit'])->name('config_lamp.edit');
Route::put('config-lamp/{configLamp}', [ConfigLampController::class, 'update'])->name('config_lamp.update');
// Route::get('/devices', [DeviceController::class, 'index']);
// Route::get('/devices/{id}', [DeviceController::class, 'show']);
// Route::post('/devices', [DeviceController::class, 'store']);
// Route::put('/devices/{id}', [DeviceController::class, 'update']);
// Route::delete('/devices/{id}', [DeviceController::class, 'destroy']);
Route::resource('devices', DeviceController::class);
Route::post('/devices/{deviceId}/data-sensors', [DeviceController::class, 'addDataSensor']);
Route::post('/devices/{deviceId}/config-heater', [DeviceController::class, 'addConfigHeater']);
Route::post('/devices/{deviceId}/config-lamp', [DeviceController::class, 'addConfigLamp']);