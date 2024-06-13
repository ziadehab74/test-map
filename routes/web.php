<?php

// use Fhsinchy\Inspire\Controllers\InspirationController;
// use Fhsinchy\Inspire\Inspire;

use App\Http\Controllers\MapController;
use Illuminate\Support\Facades\Route;

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


// Route::get('/counter', function () {
//     return view('counter');
// });

// use \App\Livewire\GD\Inspector;

// Route::get('/TestView', Inspector::class);

// Route::get('/test', \App\Livewire\sideBar::class);

// Route::get('/user', function () {
//     return view('user');
// });
// Route::get('/inspire', InspirationController::class);
// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

// Route::view('profile', 'profile')
//     ->middleware(['auth'])
//     ->name('profile');

// require __DIR__ . '/auth.php';

// Route::get('/', [MapController::class, 'index']);
// Route::get('/markers', [MapController::class, 'index']);
// Route::post('/save-marker', [MapController::class, 'store']);
// Route::post('/add-bus', [MapController::class, 'addBus']);
// Route::post('/add-station', [MapController::class, 'addStation']);
Route::view('/', 'landing');
