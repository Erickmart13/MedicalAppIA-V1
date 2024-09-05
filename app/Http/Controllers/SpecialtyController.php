<?php

namespace App\Http\Controllers;

use App\Models\Specialty;
use Illuminate\Http\Request;

class SpecialtyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $specialties = Specialty::all();
        return view('specialties.index', compact('specialties'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('specialties.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string|unique:specialties,name|min:3'
        ];

        $messages = [
            'name.required' => 'El nombre de la especialidad es obligatorio.',
            'name.unique' => 'La especialidad ya existe.',
            'name.min' => 'El nombre debe tener más de 3 caracteres.'
        ];

        $this->validate($request, $rules, $messages);

        $notification = 'La especialidad se ha creado correctamente.';

        Specialty::create([

            'name' => $request->name,
            'description' => $request->description,
            'active' => $request->active,
        ]);



        return redirect('/specialties')->with(compact('notification'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Encontrar la instancia de Doctor que se va a mostrar
        $specialty = Specialty::findOrFail($id);


        // Retornar la vista de detalles con la información del doctor
        return view('specialties.show', compact('specialty'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Specialty $specialty)
    {
        return view('specialties.edit', compact('specialty'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Specialty $specialty)
    {

        $rules = [
            'name' => 'required|string|min:3|unique:specialties,name,' . $specialty->id,
        ];
        $messages = [
            'name.required' => 'El nombre de la especialidad es obligatorio.',
            'name.unique' => 'La especialidad ya existe.',
            'name.min' => 'El nombre debe tener más de 3 caracteres.'
        ];

        $this->validate($request, $rules, $messages);
        $notification = 'La especialidad se ha actualizado correctamente.';

        $specialty->update([

            'name' => $request->name,
            'description' => $request->description,
            'active' => $request->active,
        ]);



        return redirect('/specialties')->with(compact('notification'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Specialty $specialty)
    {
        $deleteName = $specialty->name;
        $specialty->delete();
        $notificationDelete = 'La especialidad ' .  $deleteName . ' se ha eliminado correctamente.';
        return redirect('/specialties')->with(compact('notificationDelete'));
    }

    public function getDoctorsBySpecialty($specialtyId)
    {
        $specialty = Specialty::findOrFail($specialtyId);

        // Obtén los médicos que tienen el rol con ID 2 (suponiendo que 2 es el ID del rol de doctor)
        $doctors = $specialty->users()
            ->whereHas('roles', function ($query) {
                $query->where('roles.id', 2); // Ajusta según el ID correcto del rol de doctor
            })
            ->with('person')
            ->get();
            $doctorsWithPersonInfo = $doctors->map(function($doctor) {
                return [
                    'user_id' => $doctor->id,
                    'email' => $doctor->email,
                    'first_name' => $doctor->person->first_name,
                    'last_name' => $doctor->person->last_name,
                    // Añade otros campos de 'person' si es necesario
                ];
            });
        
            return response()->json($doctorsWithPersonInfo);
    }
}
