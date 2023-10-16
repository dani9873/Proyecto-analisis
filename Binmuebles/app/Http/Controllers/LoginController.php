<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Login;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Productscontroller;

class LoginController extends Controller
{
    public function register(Request $request)
    {
        // Verificar si el correo o el nombre ya existen en la base de datos
        $existingUser = User::where('email', $request->email)
            ->orWhere('name', $request->name)
            ->first();
    
        if ($existingUser) {
            // El correo o el nombre ya están vinculados a otra cuenta, mostrar mensaje de error
            $errorMsg = [];
            if ($existingUser->email === $request->email) {
                $errorMsg[] = 'El correo ya está vinculado con otra cuenta.';
            }
            if ($existingUser->name === $request->name) {
                $errorMsg[] = 'El nombre de usuario ya está en uso.';
            }
            Session::flash('registration_error', implode(' ', $errorMsg));
            return redirect(route('registro'));
        }
    
        // Validar el formato del correo usando una expresión regular y el campo 'user_type'
        $request->validate([
            'name' => 'required|string|max:255|unique:users',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:users',
            ],
            'password' => 'required|string|min:3',
            'user_type' => 'required|in:comisionista,normal',
        ], [
            'user_type.in' => 'El tipo de usuario debe ser "comisionista" o "normal".',
        ]);
    
        // Crear el nuevo usuario
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->user_type = $request->user_type;
        $user->save();
    
        // Redirigir a la vista de inicio de sesión después del registro exitoso
        return redirect(route('products.index'))->with('registration_success', 'Registro exitoso. Ahora puedes iniciar sesión.');
    }  


    public function logout(Request $request)
    {
        Auth::logout();
    
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        return redirect(route('login')); // Redirige a la página de inicio de sesión
    }
    

    public function login(Request $request)
{
    $credentials = [
        "email" => $request->email,
        "password" => $request->password,
    ];
    $remember = ($request->has('remember') ? true : false);

    if (Auth::attempt($credentials, $remember)) {
        $request->session()->regenerate();
        return redirect()->intended(route('products.index'));
    } else {
        // Agregar un mensaje de error
        return redirect()->route('products.index')->with('login_error', 'Correo o contraseña incorrectos');
    }
}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Login $login)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Login $login)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Login $login)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Login $login)
    {
        //
    }
}
