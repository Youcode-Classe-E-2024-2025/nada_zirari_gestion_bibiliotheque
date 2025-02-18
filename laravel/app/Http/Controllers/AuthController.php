<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Afficher le formulaire d'inscription
    public function showRegisterForm()
    {
        return view('register');
    }

    // Gérer l'inscription
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Inscription réussie ! Connectez-vous.');
    }

    // Afficher le formulaire de connexion
    public function showLoginForm()
    {
        return view('login');
    }

    // Gérer la connexion
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('dashboard')->with('success', 'Connexion réussie !');
        }

        return back()->withErrors(['email' => 'Email ou mot de passe incorrect']);
    }

    // Gérer la déconnexion
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Déconnexion réussie !');
    }

    // Afficher le profil de l'utilisateur
    public function profile()
    {
        return view('auth.profile', ['user' => Auth::user()]);
    }
}
