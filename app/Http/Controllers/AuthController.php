<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\LoginNotificationMail;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Mail\RegisterNotificationMail;


class AuthController extends Controller
{



public function register(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6|confirmed'
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password)
    ]);

    // 🔥 ENVIAR CORREO A TI CUANDO ALGUIEN SE REGISTRE
    Mail::to('juandiegovanegasmunoz@gmail.com')
        ->send(new RegisterNotificationMail($user));

    Auth::login($user);

    return redirect('/');
}

    // Mostrar login
    public function showLogin()
    {
        return view('index');
    }

    // Procesar login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            return redirect('/');
        }

        return back()->withErrors([
            'email' => 'Credenciales incorrectas',
        ]);
    }

    // 🔥 AQUÍ VA TU CÓDIGO 🔥

    // Mostrar formulario registro
    public function showRegister()
    {
        return view('registrar.register_notification',);                                                                                                
    }


    // Cerrar sesión
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}