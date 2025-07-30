<?php
//ROUTES
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Car\CarController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AddUserController;
use App\Http\Controllers\Car\RentController;
use App\Http\Controllers\ReservationsController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\UserController;
use App\Models\Rentals;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'showForm'])->name('auth.showForm');
Route::post('/login', [LoginController::class, 'login'])->name('auth.login');

Route::get('/cars', [CarController::class, 'getAllCars'])->name('cars.index');
Route::get('/cars/create', [CarController::class, 'addCarForm'])->name('cars.create');
Route::post('/cars', [CarController::class, 'addCar'])->name('cars.add');


Route::post('/cars/addcategory', [CarController::class, 'addCategory'])->name('cars.addcategory');
Route::post('/cars/addtype', [CarController::class, 'addType'])->name('cars.addtype');



Route::post('/cars/reset', [CarController::class, 'resetDB'])->name('cars.reset');

Route::get('/noaccess', function () {
    return view('auth.access_deny');
}) ->name('noaccess');
// Route::middleware(['role:Admin'])->group(function () {
//     Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);
// });
Route::middleware(['role:Értékesítő'])->group(function () {
    Route::get('/sales/dashboard', [SalesController::class, 'dashboard']);
});
Route::post('/users/create', [UserController::class, 'createUser']);
Route::put('/users/{user}/role', [UserController::class, 'updateUserRole']);

Route::get('/cars/reservecar/{id}' , [ReservationsController::class, 'getCarReservations'])->name('cars.reserveCar');
Route::get('/cars/reservecarconfirm/{id}' , [ReservationsController::class, 'reserveCar'])->name('cars.reserve');
Route::post('/cars/reservecarconfirm/{id}' , [ReservationsController::class, 'reserveConfirm'])->name('cars.reserveconfirm');
Route::get('/cars/reservations', [ReservationsController::class, 'listAllReservations'])->name('cars.reservations');

Route::get('/cars/rentcar/{id}' , [RentController::class, 'rentForm'])->name('cars.rentform');
Route::post('/cars/rentcar/' , [RentController::class, 'rentCar'])->name('cars.rent');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('auth.showRegistrationForm');
Route::post('/register', [RegisterController::class, 'register'])->name('auth.register');

Route::get('/cars/adduser', [AddUserController::class, 'showAddUserForm'])->name('cars.adduser');


Route::post('/cars/adduser', [AddUserController::class, 'addUser'])->name('cars.adduser.submit');
Route::get('/cars/addcar', [CarController::class, 'addCarForm'])->name('cars.addcar');

