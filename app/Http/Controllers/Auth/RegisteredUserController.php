<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    public function create(): View
    {
        return view('auth.register');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name'     => ['required', 'string', 'max:255', 'regex:/^[\pL\s]+$/u'],
            'apellido' => ['required', 'string', 'max:255', 'regex:/^[\pL\s]+$/u'],
            'telefono' => ['required', 'string', 'digits_between:7,15'],
            'email'    => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ], [
            'name.required'      => 'El nombre es obligatorio.',
            'name.regex'         => 'El nombre solo puede contener letras y espacios.',
            'apellido.required'  => 'El apellido es obligatorio.',
            'apellido.regex'     => 'El apellido solo puede contener letras y espacios.',
            'telefono.required'  => 'El teléfono es obligatorio.',
            'telefono.digits_between' => 'El teléfono debe tener entre 7 y 15 dígitos.',
            'email.required'     => 'El correo electrónico es obligatorio.',
            'email.email'        => 'Ingrese un correo electrónico válido.',
            'email.unique'       => 'Este correo ya está registrado.',
            'password.required'  => 'La contraseña es obligatoria.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
        ]);

        $user = User::create([
            'name'      => $request->name,
            'last_name' => $request->apellido,
            'phone'     => $request->telefono,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
            'role_id'   => 2,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}
