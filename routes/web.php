<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// GET ALL LISTING
Route::get('/', [ListingController::class, 'index']);


// GET NEW LISTING FORM
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');


// POST NEW LISTING
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');

// SHOW EDIT FORM
Route::get('listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');

// MANAGE LISTINGS
Route::get('listings/manage', [ListingController::class, 'manage'])->middleware('auth');

// GET SINGLE LISTING
Route::get("/listings/{listing}", [ListingController::class, 'show']);

// UPDATE SINGLE LISTING
Route::put("/listings/{listing}", [ListingController::class, 'update'])->middleware('auth');

// DELETE SINGLE LISTING
Route::delete("/listings/{listing}", [ListingController::class, 'destroy'])->middleware('auth');



// GET REGISTER PAGE
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// CREATE NEW USER
Route::post('/users/create', [UserController::class, 'store']);

//LOGOUT USER
Route::post('/logout', [UserController::class, 'logout']);

//SHOW LOGIN PAGE
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

//LOGIN USER
Route::post('/users/login', [UserController::class, 'authenticate']);