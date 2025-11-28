<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class AuthController extends Controller
{
    public function getLoginPage() {
        return view('auth.login');
    }
    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);
        
        //check if the user exists
        $user = User::where('email', $credentials['email'])->first();

        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
            ])->onlyInput('email');
        }

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            // Redirect based on user role
            if ($user->role === 'admin') {
                return redirect()->intended('/dashboard');
            } else {
                return redirect()->intended('/user/dashboard');
            }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
    public function logout(Request $request) {
        
       
        Auth::logout();
        $request->session()->invalidate(); 

        return redirect('/');
    }
}