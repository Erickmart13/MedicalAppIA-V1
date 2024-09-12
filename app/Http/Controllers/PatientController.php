<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Role;
use App\Models\User;
use App\Models\Person;
use Nette\Utils\Strings;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
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
        $patient = User::findOrFail($id);
        $cities = City::all();
        $selectedCity = $patient->person->city_id;


        // Retornar la vista de detalles con la información del doctor
        return view('patients.show', compact('patient', 'cities', 'selectedCity'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $patient = User::findOrFail($id);
        $cities = City::all();
        $selectedCity = $patient->person->city_id;


        // Retornar la vista de detalles con la información del doctor
        return view('patients.edit', compact('patient', 'cities', 'selectedCity'));
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

    // Notificación de éxito
    $notification = 'La información del paciente se ha actualizado correctamente';
    return redirect('/patients')->with(compact('notification'));
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Buscar el usuario por ID
        $user = User::findOrFail($id);
    
        // Buscar la persona (paciente) relacionada a este usuario
        $person = Person::where('user_id', $user->id)->firstOrFail();
    
        // Eliminar la persona
        $person->delete();
    
        // Eliminar el usuario
        $user->delete();
    
        // Notificación de éxito
        $notification = 'El paciente y su usuario relacionado han sido eliminados correctamente.';
    
        // Redirigir a la lista de pacientes con la notificación
        return redirect('/patients')->with(compact('notification'));
    }
    
    

}
