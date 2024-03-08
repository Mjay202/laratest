<?php

use App\Http\Controllers\ListingController;
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
Route::get('/listings/create', [ListingController::class, 'create']);


// POST NEW LISTING
Route::post('/listings', [ListingController::class, 'store']);

// SHOW EDIT FORM
Route::get('listings/{listing}/edit', [ListingController::class, 'edit']);

// GET SINGLE LISTING
Route::get("/listings/{listing}", [ListingController::class, 'show']);

// UPDATE SINGLE LISTING
Route::put("/listings/{listing}", [ListingController::class, 'update']);

// DELETE SINGLE LISTING
Route::delete("/listings/{listing}", [ListingController::class, 'destroy']);


