<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/listings', function () {
    return view('test', [
        "heading" => "Listing Items",
        "listings" => Listing::all()
    ]);
});

Route::get("/listing/{id}", function($id){
    return view('listing', [
        "listing" => Listing::findOne($id)
    ]);
});

Route::get('/test', function(){
    return response("Hello World");
});

Route::get('/post/{id}', function($id){
    // ddd($id);
    return response("Your id is" . $id)
    ->header('fooo', 'jaja');
})->where('id', '[0-9]');

Route::get('/foreal', function(Request $request){
    return response($request->name);
});