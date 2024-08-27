<?php

namespace App\Http\Controllers\Auth;

use App\Models\Role;
use App\Models\User;
use App\Models\Person;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

class AdditionalInfoController extends Controller
{
    public function create(Request $request)
    {

        $cities = City::all();
        
        // Verificar si los datos del usuario están en la sesión
        if (!$request->session()->has('user_data')) {
            return redirect()->route('register');
        }

        return view('auth.additional-info',compact('cities'));
    }

    public function store(Request $request)
    {
        $rules = [
            'first_name' => 'required|string|min:3|max:255',
            'last_name' => 'required|string|min:3|max:255',
            'cedula' => 'required|string|min:10|unique:persons,cedula',
            'address' => 'required|string',
            'phone' => 'required|numeric|digits:10',
            'city_of_residence' => 'required|string',
            'date_of_birth' => 'required|date',
            'age' => 'required|numeric',
            'gender' => 'required|string'
        ];

        $messages = [
            'first_name.required' => 'El nombre es obligatorio.',
            'last_name.required' => 'El apellido es obligatorio.',
            'cedula.required' => 'La cédula es obligatoria',
            'address.required' => 'La dirección es obligatoria',
            'phone.required' => 'El número de teléfono es obligatorio',
            'city_of_residence.required' => 'La ciudad de residencia es obligatoria',
            'date_of_birth.required' => 'La fecha de nacimiento es obligatoria',
            'age.required' => 'La edad es obligatoria.',
            'gender.required' => 'El género es obligatorio'
        ];

        $this->validate($request, $rules, $messages);

        // Recuperar los datos del usuario desde la sesión
        $userData = $request->session()->get('user_data');

        if (!$userData) {
            return redirect()->route('register')->withErrors(['error' => 'Datos de usuario no encontrados en la sesión.']);
        }

        // Crear el usuario
        $user = User::create(array_merge($userData, ['password' => Hash::make($userData['password'])]));

        // Obtener el rol 'patient' de la tabla roles
        $patientRole = Role::where('name', 'patient')->first();

        if ($patientRole) {
            // Asignar el rol 'patient' al usuario registrado
            $user->roles()->attach($patientRole->id);
        } else {
            // Manejar el caso donde el rol no existe
            return redirect()->back()->withErrors(['error' => 'Rol no encontrado.']);
        }

        // Crear el registro en la tabla `person`
        Person::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $user->email,
            'cedula' => $request->cedula,
            'address' => $request->address,
            'phone' => $request->phone,
            'city_of_residence' => $request->city_of_residence,
            'date_of_birth' => $request->date_of_birth,
            'age' => $request->age,
            'gender' => $request->gender,
            'user_id' => $user->id,
        ]);

        // Limpiar la sesión
        $request->session()->forget('user_data');
        event(new Registered($user));

        Auth::login($user);

        // Redirigir al usuario a la página de inicio
        return redirect(RouteServiceProvider::HOME);
    }
}
