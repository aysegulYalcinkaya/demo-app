<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CafesController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\IndoorsController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\PlacesController;
use App\Http\Controllers\PubsController;
use App\Http\Controllers\RestaurantsController;
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
    return view('index');
});
Route::get('places', [PlacesController::class, 'places'])->name('places');
Route::get('places/search', [PlacesController::class, 'search'])->name('places.search');
Route::get('autocomplete', [PlacesController::class, 'autocomplete'])->name('autocomplete');
Route::get('pubs', [PubsController::class, 'pubs'])->name('pubs');
Route::get('pubs/search', [PubsController::class, 'search'])->name('pubs.search');
Route::get('cafes', [CafesController::class, 'cafes'])->name('cafes');
Route::get('cafes/search', [CafesController::class, 'search'])->name('cafes.search');
Route::get('restaurants', [RestaurantsController::class, 'restaurants'])->name('restaurants');
Route::get('restaurants/search', [RestaurantsController::class, 'search'])->name('restaurants.search');
Route::get('indoors', [IndoorsController::class, 'indoors'])->name('indoors');
Route::get('indoors/search', [IndoorsController::class, 'search'])->name('indoors.search');
Route::get('location/{id}', [LocationController::class, 'location'])->name('location');
Route::get('about', [AboutController::class, 'about'])->name('about');
Route::get('contact', [ContactController::class, 'contact'])->name('contact');
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('submit-login', [AuthController::class, 'postLogin'])->name('login.post');
Route::get('register', [AuthController::class, 'registration'])->name('register');
Route::post('submit-registration', [AuthController::class, 'postRegistration'])->name('register.post');
Route::get('dashboard', [AuthController::class, 'dashboard']);
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
