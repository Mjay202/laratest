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
        return view('listings', [
        "listings" => Listing::all()
    ]);
    }

    // SHOW SINGLE LISTING
    public function show(Listing $listing){
         return view('listing', [
        "listing" => $listing
    ]);
    }

}
