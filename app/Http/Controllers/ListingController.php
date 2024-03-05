<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    //SHOW ALL LISTINGS
    // 
    public function index(){
   
        return view('listings.index', [
        "listings" => Listing::latest()->filter(request(['tag', 'search']))->paginate(5)
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
    public function store(Request $request){
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'email' => ['required', 'email'],
            'website' => 'required',
            'tags' => 'required',
            'description' => 'required'
        ]);

        Listing::create($formFields);
        return redirect('/')->with('message', 'Listing created successfully!');


    }

}

