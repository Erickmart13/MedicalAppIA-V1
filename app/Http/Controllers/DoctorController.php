<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Role;
use App\Models\User;
use App\Models\Person;
use App\Models\Specialty;
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
        //
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
        return view('doctors.edit', compact('doctor', 'cities', 'selectedCity','specialties','selectedSpecialties'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
