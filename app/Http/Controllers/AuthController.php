<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /* ==== VISTAS ==== */
    public function showLogin()
    {
        $auth = true; // oculta menú en tu layout
        return view('auth.login', compact('auth'));
    }

    public function showRegister()
    {
        $auth = true;
        return view('auth.register', compact('auth'));
    }

    /* ==== ACCIONES ==== */
    public function login(Request $request)
    {
        $cred = $request->validate([
            'email'    => ['required','email'],
            'password' => ['required'],
        ]);

        $remember = $request->boolean('remember');

        if (Auth::guard('web')->attempt($cred, $remember)) {
            $request->session()->regenerate(); // seguridad
            return redirect()->intended(route('dashboard'));
        }

        // no reveles si el correo existe o no
        throw ValidationException::withMessages([
            'email' => 'Credenciales inválidas',
        ])->redirectTo(route('login'))->status(302);
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'name'                  => ['required','string','max:150'],
            'email'                 => ['required','email','max:150','unique:users,email'],
            'password'              => ['required','confirmed','min:8'],
        ]);

        // gracias al cast 'hashed' en el modelo no necesitas Hash::make
        $user = User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => $data['password'],
        ]);

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->intended(route('dashboard'));
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
