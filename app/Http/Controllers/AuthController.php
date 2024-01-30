<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Utilisateur; 
use Illuminate\Support\Facades\Hash;

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
            return redirect()->intended('/backoffice'); // Redirigez l'utilisateur où vous le souhaitez après la connexion réussie.
        }
    
        // L'authentification a échoué
        return redirect()->back()->withErrors(['email' => 'Les informations de connexion sont incorrectes.'])->withInput($request->only('email'));
    }
    

    public function register(Request $request)
    {
        // Valider les données reçues du formulaire d'inscription
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:utilisateur',
            'password' => 'required|string|min:8|confirmed',
        ]);
    
        // Créer un nouvel utilisateur
        $utilisateur = Utilisateur::create([
            'nom' => $validatedData['nom'],
            'prenom' => $validatedData['prenom'],
            'email' => $validatedData['email'],
            // Assurez-vous de hasher le mot de passe avant de le stocker dans la base de données
            'mdp' => Hash::make($validatedData['password']),
        ]);
    
        // Authentifier l'utilisateur après l'inscription réussie
        Auth::login($utilisateur);
    
        // Rediriger l'utilisateur vers une page spécifique, par exemple la page d'accueil du back-office
        return redirect('/backoffice')->with('success', 'Inscription réussie et connexion effectuée.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
    
}