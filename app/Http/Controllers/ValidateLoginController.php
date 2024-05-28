<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ValidateLoginController extends Controller
{
    public function validateLogin(Request $request) {
        $messages = [
            'email.required' => 'The email field is required.',
            'password.required' => 'The password field is required.'
        ];
    
        $fields = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ], $messages);
    
        if (auth()->attempt(['email' => $fields['email'], 'password' => $fields['password']])) {
            $request->session()->regenerate();
            return redirect('/');
        } else {
            return redirect('/login')->withErrors(['login' => 'Invalid credentials provided.']);
        }
    }    
}
