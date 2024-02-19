<?php

use Illuminate\Http\Request;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/testing', function () {
    return view('test', [
        "heading" => "Listing Items",
        "listings" => [
            [
                "id"=> 1,
                "name"  => "Listing One",
                "details" => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Suscipit consequatur alias tempora officia, voluptate soluta nobis consequuntur maxime rem velit a ab sit, minima, voluptatem neque odit necessitatibus sunt officiis!"
            ],
            [
                "id"=> 2,
                "name"  => "Listing Two",
                "details" => "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Suscipit consequatur alias tempora officia, voluptate soluta nobis consequuntur maxime rem velit a ab sit, minima, voluptatem neque odit necessitatibus sunt officiis!"
            ],
        ]

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