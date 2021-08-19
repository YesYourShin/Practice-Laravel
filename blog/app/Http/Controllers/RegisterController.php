<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    function register (Request $request) {
        
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');

        $validate = $request->validate([
            'name' => 'required',
            'email' => '',
            'password' => ''
        ]);
        
        // dd($request);
        return $request;
    }
}
