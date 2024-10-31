<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'dni' => 'required', // Validar DNI
            'password' => 'required',
        ]);

        $credentials = $request->only('dni', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Obtener el usuario autenticado
            $user = Auth::user();

            // Redireccionar según los permisos del usuario
            if ($user->hasPermission('Administrador')) {
                return redirect()->route('admin.dashboard'); // Cambia esta ruta a la que desees
            } else {
                return redirect()->route('productos'); // Cambia esta ruta a la que desees
            }
        }

        return back()->withErrors([
            'dni' => 'Las credenciales proporcionadas son incorrectas.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login'); // Cambia esta ruta a la que desees
    }
}
