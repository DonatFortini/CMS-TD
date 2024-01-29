<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
            // L'authentification a réussi
            return redirect()->intended('/backOffice'); // Redirigez l'utilisateur où vous le souhaitez après la connexion réussie.
        }
    
        // L'authentification a échoué
        return redirect()->back()->withErrors(['email' => 'Les informations de connexion sont incorrectes.'])->withInput($request->only('email'));
    }
    

    public function register(Request $request)
    {
        // Logique d'inscription
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
    
}