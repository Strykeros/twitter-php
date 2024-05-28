<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ValidateRegisterController extends Controller
{
    public function validateRegister(Request $request) {
        $messages = [
            'username.required' => 'The username field is required.',
            'username.unique' => 'This username is already taken.',
            'email.required' => 'The email field is required.',
            'email.unique' => 'An account with this email already exists.',
            'password.required' => 'The password field is required.',
            'passwordRepeat.required' => 'You must confirm your password.',
            'passwordRepeat.same' => 'The passwords do not match.'
        ];
    
        $fields = $request->validate([
            'username' => ['required', Rule::unique('users', 'username')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required',
            'passwordRepeat' => 'required|same:password'
        ], $messages);
    
        $fields['password'] = bcrypt($fields['password']);
        $newUser = User::create([
            'username' => $fields['username'],
            'email' => $fields['email'],
            'password' => $fields['password']
        ]);
        auth()->login($newUser);
        return redirect('/');
    }
}
