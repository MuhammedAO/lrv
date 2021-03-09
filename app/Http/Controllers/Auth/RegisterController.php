<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        //validation
        $this->validate($request, [
            'name' => 'required',
            'username' => 'required',
            'email' => 'required | email',
            'password' => 'required | confirmed',
        ]);

        dd('passed');
        //store the user
        //sign the user in
        //redirect the user


    }
    
}
