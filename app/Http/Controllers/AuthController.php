<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    /* Vistas */
    public function showLogin()   { return view('auth.login'); }
    public function showRegister(){ return view('auth.register'); }

    /* POST: Login */
    public function login(Request $req)
    {
        $cred = $req->validate([
            'email'    => ['required','email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($cred, false)) { // false = sin "remember me"
            $req->session()->regenerate();
            return redirect()->intended('/dashboard');
        }
        return back()->withErrors(['email' => 'Credenciales inválidas'])->withInput();
    }

    /* POST: Register */
public function register(Request $req)
{
    $data = $req->validate([
  'name' => ['required','string','max:100'],
  'email' => ['required','email','max:150', Rule::unique('users','email')],
  'password' => ['required','confirmed','min:8'],
]);

$user = User::create([
  'name' => $data['name'],
  'email' => $data['email'],
  'password' => Hash::make($data['password']),
  'rol' => 'consulta',
]);

    Auth::login($user);
    $req->session()->regenerate();
    return redirect('/dashboard');
}


    /* POST: Logout */
    public function logout(Request $req)
    {
        Auth::logout();
        $req->session()->invalidate();
        $req->session()->regenerateToken();
        return redirect('/login');
    }
}
