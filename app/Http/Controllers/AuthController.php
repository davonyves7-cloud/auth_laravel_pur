<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Afficher la page d'inscription
    |--------------------------------------------------------------------------
    */

    public function showRegister()
    {
        return view('auth.inscription');
    }


    /*
    |--------------------------------------------------------------------------
    | Traiter l'inscription
    |--------------------------------------------------------------------------
    */

    public function register(Request $request)
    {
        // Validation des données
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);


        // Création de l'utilisateur
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);


        // Connecter automatiquement l'utilisateur
        Auth::login($user);


        // Redirection vers le dashboard
        return redirect()->route('dashboard');
    }


    /*
    |--------------------------------------------------------------------------
    | Afficher la page de connexion
    |--------------------------------------------------------------------------
    */

    public function showLogin()
    {
        return view('auth.connexion');
    }


    /*
    |--------------------------------------------------------------------------
    | Traiter la connexion
    |--------------------------------------------------------------------------
    */

    public function login(Request $request)
    {
        // Validation
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);


        // Vérification des identifiants
        if (Auth::attempt($credentials)) {

            // Régénérer la session
            $request->session()->regenerate();

            // Connexion réussie
            return redirect()->route('dashboard');
        }


        // Connexion échouée
        return back()->withErrors([
            'email' => 'Les identifiants sont incorrects.',
        ])->onlyInput('email');
    }


    /*
    |--------------------------------------------------------------------------
    | Dashboard
    |--------------------------------------------------------------------------
    */

    public function dashboard()
    {
        return view('dashboard');
    }


    /*
    |--------------------------------------------------------------------------
    | Déconnexion
    |--------------------------------------------------------------------------
    */

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('connexion');
    }
}