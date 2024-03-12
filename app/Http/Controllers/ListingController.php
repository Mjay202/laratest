<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Listing;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Psy\TabCompletion\Matcher\FunctionsMatcher;

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

    // CREATE NEW LISTING
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

        $formFields['user_id'] = auth()->id();

        Listing::create($formFields);
        return redirect('/')->with('message', 'Listing created successfully!');

    }


    // UPDATE EXISTING LISTING
    public function update(Request $request, Listing $listing){

        // Authorization
        if($listing->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }

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

    //DELETE SINGLE LISTING 
    public function destroy (Listing $listing) {
        
        // Authorization
        if($listing->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }
        
        $listing->delete();
        return redirect('/')->with('message', 'Listing deleted succesfully!');
    }

    // MANAGE SINGLE USER LISTINGS

    public function manage () {
        $userId = auth()->user()->id;
        $user = User::find($userId);
        return view ('listings.manage', [
            'listings' => $user->listings()->get()
        ]);
    }

}

