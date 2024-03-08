<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //SHOW REGISTER PAGE
    public function create (){
        return view('users.register');
    }

    // CREATE NEW USER
    public function store(Request $request){
        $formFields = $request->validate([
            "name" => ['required', 'min:3'],
            "email" => ['required', 'email', Rule::unique('users', 'email')],
            "password" => ['required', 'confirmed', 'min:6']
        ]);

        // Hash Password
        $formFields['password'] = bcrypt($formFields['password']);

        // Create a user
        $user = User::create($formFields);

        // Login the user
        auth()->login($user);

        // Redirect to homepage
        return redirect('/')->with('message', 'You just login, ' . $formFields['name']);
    }

}
