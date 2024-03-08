<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    //SHOW ALL LISTINS
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

    // SHOW EDIT LISTING 
    public function edit(Listing $listing){
         return view('listings.edit', [
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

        if($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        Listing::create($formFields);
        return redirect('/')->with('message', 'Listing created successfully!');

    }


    // UPDATE EXISTING LISTING
    public function update(Request $request, Listing $listing){
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required'],
            'location' => 'required',
            'email' => ['required', 'email'],
            'website' => 'required',
            'tags' => 'required',
            'description' => 'required'
        ]);

        if($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

       $listing->update($formFields);
        return back()->with('message', 'Listing updated successfully!');
    }

}

