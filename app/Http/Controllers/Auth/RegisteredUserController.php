<?php

namespace App\Http\Controllers\Auth;

use App\Models\Role;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $validated=$request->validate([
            // 'first_name' => ['required', 'string', 'max:255'],
            // 'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Guardar los datos en la sesión
        $request->session()->put('user_data', $validated);

        // Autenticación del usuario para redirigir
        Auth::attempt([
            'email' => $validated['email'],
            'password' => $validated['password'],
        ]);
        // $user = User::create([
        //     // 'first_name' => $request->first_name,
        //     // 'last_name' => $request->last_name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        // ]);

        // // Obtener el rol 'patient' de la tabla roles
        // $patientRole = Role::where('name', 'patient')->first();

        // if ($patientRole) {
        //     // Asignar el rol 'patient' al usuario registrado
        //     $user->roles()->attach($patientRole->id);
        // } else {
        //     // Manejar el caso donde el rol no existe
        //     return redirect()->back()->withErrors(['error' => 'Role not found.']);
        // }



        // Verificar el contenido de la sesión
        //dd($request->session()->get('user_data'));

        // Redirigir al formulario de datos adicionales

        

        // Redirigir al formulario adicional
        return redirect()->route('additional-info.create');
    }
}
