<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function show() 
    {
        return view('login.show');
    }

    public function login(Request $request)
    {
        $login = $request->login;
        $password = $request->password;
        $credentials = ['email' => $login, 'password' => $password];

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return to_route('profile.index')->with('success', 'Vous etre bien connecte'.$login.'');
        }else{
            return back()->withErrors(['login' => 'Email ou mot de passe incorrect.'])->onlyInput('login');
        }

    }

    public function logout() 
    {
        Session::flush();

        Auth::logout();

        return to_route('login.show')->with('success','Vous etes bien deconnecte');
    }
}
