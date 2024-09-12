<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Role;
use App\Models\User;
use App\Models\Person;
use App\Models\Specialty;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctors = User::whereHas('roles', function ($query) {
            $query->where('role_id', 2);
        })->get();
        return view('doctors.index', compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $specialties = Specialty::all();
        $cities = City::all();
        return view('doctors.create', compact('specialties', 'cities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Definir reglas de validación
        $rules = [
            'first_name' => 'required|string|min:3|max:255',
            'last_name' => 'required|string|min:3|max:255',
            'user_name' => 'required|string|min:3|max:255',
            'password' => 'required|string|min:8|confirmed',

            'email' => 'required|string|email|max:255|unique:users',

            'cedula' => 'required|string|min:10',
            'address' => 'required|string',
            'phone' => 'required|numeric|min:10',
            'city_id' => 'required|string',
            'date_of_birth' => 'required|date',
            'age' => 'required|numeric',
            'gender' => 'required|in:male,female',
            'password' => 'required|string|min:8|confirmed',

            'specialties' => 'required|array',
            'specialties.*' => 'exists:specialties,id',
        ];

        // Definir mensajes personalizados de validación
        $messages = [
            'first_name.required' => 'El nombre del médico es obligatorio.',
            'first_name.min' => 'El nombre del médico debe tener al menos 3 caracteres.',
            'first_name.max' => 'El nombre del médico debe tener como máximo 255 caracteres.',
            'last_name.required' => 'El apellido del médico es obligatorio.',
            'last_name.min' => 'El apellido del médico debe tener al menos 3 caracteres.',
            'last_name.max' => 'El apellido del médico debe tener como máximo 255 caracteres.',
            'user_name.required' => 'El nombre del paciente es obligatorio.',
            'password.required' => 'La contraseña es obligatoria',
            'password.confirmed' => 'La confirmación de la contraseña no coincide.',

            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'Ingrese un correo electrónico válido.',
            'email.unique' => 'El correo electrónico ya está registrado.',

            'cedula.required' => 'La cédula es obligatoria.',
            'cedula.min' => 'La cédula debe tener al menos 10 dígitos.',
            'cedula.unique' => 'La cédula ya está registrada.',
            'address.required' => 'La dirección es obligatoria.',
            'phone.required' => 'El número de teléfono es obligatorio.',
            'phone.numeric' => 'El número de teléfono debe ser numérico.',
            'phone.min' => 'El número de teléfono debe tener al menos 10 dígitos.',
            'city_id.required' => 'La ciudad de residencia es obligatoria.',
            'date_of_birth.required' => 'La fecha de nacimiento es obligatoria.',
            'age.required' => 'La edad es obligatoria.',
            'gender.required' => 'El género es obligatorio.',
            'gender.in' => 'El género seleccionado no es válido.',
        ];

        // Validar los datos de entrada
        $this->validate($request, $rules, $messages);
        // Crear el usuario
        $user = User::create([
            'user_name' => $request->user_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

        // Asignar el rol al usuario (por ejemplo, 'patient')
        $roleDoctor = Role::where('name', 'doctor')->first();
        $user->roles()->attach($roleDoctor);

        // Crear la persona
        $person = Person::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $user->email,
            'cedula' => $request->cedula,
            'address' => $request->address,
            'phone' => $request->phone,
            'date_of_birth' => $request->date_of_birth,
            'age' => $request->age,
            'gender' => $request->gender,
            'city_id' => $request->city_id,
            'user_id' => $user->id, // Relación con el usuario recién creado
        ]);


        // Sincronizar especialidades seleccionadas
        // dd($request->specialties);
        $user->specialties()->sync($request->specialties);


        // Redireccionar con mensaje de éxito
        $notification = 'El médico se ha registrado correctamente.';
        return redirect('/doctors')->with(compact('notification'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $specialties=Specialty::all();
        $doctor = User::findOrFail($id);
        $cities = City::all();
        $selectedCity = $doctor->person->city_id;
       
        // Obtener las especialidades seleccionadas para este registro
        $selectedSpecialties = $doctor->specialties->pluck('id')->toArray();

        // Retornar la vista de detalles con la información del doctor
        return view('doctors.show', compact('doctor', 'cities', 'selectedCity','specialties','selectedSpecialties'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $specialties = Specialty::all();
        $doctor = User::findOrFail($id);
        $cities = City::all();
        $selectedCity = $doctor->person->city_id;
        $selectedSpecialties = $doctor->specialties->pluck('id')->toArray();

        // Retornar la vista de detalles con la información del doctor
        return view('doctors.edit', compact('doctor', 'cities', 'selectedCity', 'specialties', 'selectedSpecialties'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Encontrar la persona relacionada a través del usuario
        $user = User::findOrFail($id);
        $person = $user->person;

        // Reglas de validación
        $rules = [
            'first_name' => 'required|string|min:3|max:255',
            'last_name' => 'required|string|min:3|max:255',
            'cedula' => 'required|string|min:10|unique:persons,cedula,' . $person->id,
            'address' => 'required',
            'phone' => 'required|numeric|min:10',
            'city_id' => 'required',
            'date_of_birth' => 'required|date',
            'age' => 'required|numeric',
            'gender' => 'required|string',
        ];

        $messages = [
            'first_name.required' => 'El nombre del paciente es obligatorio.',
            'first_name.min' => 'El nombre del paciente debe tener al menos 3 caracteres.',
            'first_name.max' => 'El nombre del paciente debe tener al máximo 255 caracteres.',
            'last_name.required' => 'El apellido del paciente es obligatorio.',
            'last_name.min' => 'El apellido del paciente debe tener al menos 3 caracteres.',
            'last_name.max' => 'El apellido del paciente debe tener al máximo 255 caracteres.',
            'cedula.required' => 'La cédula es obligatoria',
            'cedula.min' => 'La cédula debe contener 10 dígitos',
            'cedula.unique' => 'La cédula ya existe',
            'address.required' => 'La dirección es obligatoria',
            'phone.required' => 'El número de teléfono es obligatorio',
            'phone.numeric' => 'Ingrese un número válido',
            'phone.min' => 'El número de teléfono debe contener 10 dígitos',
            'city_id.required' => 'La ciudad de residencia es obligatoria',
            'date_of_birth.required' => 'La fecha de nacimiento es obligatoria',
            'age.required' => 'La edad es obligatoria.',
            'gender.required' => 'El género es obligatorio',
        ];

        // Validar los datos del request
        $this->validate($request, $rules, $messages);


        $user ->update([
            
            'email' => $request->email,
            
        ]);

        // Actualizar la información de la persona
        $person->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $user->email,
            'cedula' => $request->cedula,
            'address' => $request->address,
            'phone' => $request->phone,
            'date_of_birth' => $request->date_of_birth,
            'age' => $request->age,
            'gender' => $request->gender,
            'city_id' => $request->city_id,
        ]);
        // Sincronizar especialidades seleccionadas
        $user->specialties()->sync($request->specialties);
        // Notificación de éxito
        $notification = 'La información del médico se ha actualizado correctamente';
        return redirect('/doctors')->with(compact('notification'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Buscar el usuario por ID
        $user = User::findOrFail($id);
    
        // Buscar la persona (doctor) relacionada a este usuario
        $person = Person::where('user_id', $user->id)->firstOrFail();
    
        // Eliminar la persona
        $person->delete();
    
        // Eliminar el usuario
        $user->delete();
    
        // Notificación de éxito
        $notification = 'El paciente y su usuario relacionado han sido eliminados correctamente.';
    
        // Redirigir a la lista de pacientes con la notificación
        return redirect('/doctors')->with(compact('notification'));
    }
}
