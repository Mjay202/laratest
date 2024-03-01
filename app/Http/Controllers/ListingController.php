<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    //SHOW ALL LISTINGS
    // 
    public function index(){
   
        return view('listings.index', [
        "listings" => Listing::filter(request(['tag', 'search']))->get()
    ]);
    }

    // SHOW SINGLE LISTING 
    public function show(Listing $listing){
         return view('listings.show', [
        "listing" => $listing
    ]);
    }

    // SHOW CREATE LISTING PAGE

    public function create(){
        return view('listings.create');
    }

    // STORE NEW LISTING
    public function store(){
        
    }

}
