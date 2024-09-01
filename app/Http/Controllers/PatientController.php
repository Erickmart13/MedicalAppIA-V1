<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Role;
use App\Models\User;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patients = User::whereHas('roles', function ($query) {
            $query->where('role_id', 5);
        })->get();
        return view('patients.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cities = City::all();
        return view('patients.create', compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'first_name' => 'required|string|min:3|max:255',
            'last_name' => 'required|string|min:3|max:255',
            'user_name' => 'required|string|min:3|max:255',
            
            'email' => 'required|string|email|max:255|unique:users',
            'cedula' => 'required|string|min:10|unique:persons',
            'address' => 'required',
            'phone' => 'required|numeric|min:10',
            'city_id' => 'required',
            'date_of_birth' => 'required|date',
            'age' => 'required|numeric',
            'gender' => 'required|string',
            'password' => 'required|string|min:8|confirmed'
        ];

        $messages = [

            'first_name.required' => 'El nombre del paciente es obligatorio.',
            'user_name.required' => 'El nombre del paciente es obligatorio.',
            'first_name.min' => 'El nombre del paciente debe tener al menos 3 caracteres.',
            'first_name.max' => 'El nombre del paciente debe tener al máximo 255 caracteres.',
            'last_name.required' => 'El apellido del paciente es obligatorio.',
            'last_name.min' => 'El apellido del paciente debe tener al menos 3 caracteres.',
            'last_name.max' => 'El apellido del paciente debe tener al máximo 255 caracteres.',

            'email.required' => 'El correo electrónico es obligatorio',
            'email' => 'Ingrese un correo electrónico válido',
            'email.unique' => 'El correo electrónico ya existe.',
            
            'cedula.required' => 'La cedula es obligatoria',
            'cedula.min' => 'La cedula debe contener 10 dígitos',
            'cedula.unique' => 'La cedula ya existe',
            'address.requied' => 'La dirección es obligatoria',
            'phone.required' => 'El número de teléfono es obligatorio',
            'phone.numeric' => 'Ingrese un número válido',
            'phone.min' => 'El número de telefono debe contener 10 dígitos',
            'city_id.required' => 'La ciudad de residencia es obligatoria',
            'date_of_birth.required' => 'La fecha de nacimiento es obligatoria',
            'age.required' => 'La edad es obligatoria.',
            'gender.required' => 'El género es obligatorio',
            'password.required' => 'La contraseña es obligatoria',
            'password.confirmed' => 'La confirmación de la contraseña no coincide.',

        ];

        $this->validate($request, $rules, $messages);
        // Crear el usuario
        $user = User::create([
            'user_name' => $request->user_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Asignar el rol al usuario (por ejemplo, 'patient')
        $rolePatient = Role::where('name', 'patient')->first();
        $user->roles()->attach($rolePatient);


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
        // Patient::create([
        //     'person_id' => $person->id,

        // ]);
        // $rolePatient = Role::firstOrCreate(['name' => 'patient']);
        // $person->roles()->attach($rolePatient);



        $notification = 'El paciente se ha registrado correctamente';
        return redirect('/patients')->with(compact('notification'));
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
        //
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
