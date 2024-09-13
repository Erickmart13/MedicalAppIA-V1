<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Emergency;
use Illuminate\Http\Request;

class EmergencyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $emergencies = Emergency::with('user')->get();
    return view('emergencies.index', compact('emergencies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $patients = User::whereHas('roles', function ($query) {
            $query->where('role_id', 5); // Suponiendo que el ID del rol de paciente es 5
        })->with('person') // Incluye la información adicional del paciente
            ->get();
        return view('emergencies.create', compact('patients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'heart_rate' => 'required|integer',
            'respiratory_rate' => 'required|integer',
            'blood_pressure' => 'required|string',
            'temperature' => 'required|numeric',
            'oxygen_saturation' => 'required|numeric',
            'severity'=> 'required'
        ]);

        // Guardar los signos vitales y la gravedad en la base de datos
        Emergency::create([
            'user_id' => $request->user_id,
            'heart_rate' => $request->heart_rate,
            'respiratory_rate' => $request->respiratory_rate,
            'blood_pressure' => $request->blood_pressure,
            'temperature' => $request->temperature,
            'oxygen_saturation' => $request->oxygen_saturation,
            'severity' => $request->severity,
        ]);
        $notification = 'El triaje se ha guardado correctamente.';


        return redirect('/emergencies')->with(compact('notification'));
    }
 
    

    /**
     * Display the specified resource.
     */
    public function show($id)
{
    // Buscar la emergencia por ID
    $emergency = Emergency::findOrFail($id);

    // Devolver la vista de detalles con los datos de la emergencia
    return view('emergencies.show', compact('emergency'));
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $patients = User::whereHas('roles', function ($query) {
            $query->where('role_id', 5); // Suponiendo que el ID del rol de paciente es 5
        })->with('person') // Incluye la información adicional del paciente
            ->get();
        // Buscar la emergencia por ID
        $emergency = Emergency::findOrFail($id);
    
        // Devolver la vista de edición con los datos de la emergencia
        return view('emergencies.edit', compact('emergency','patients'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    // Validar los datos del formulario
    $request->validate([
        'user_id' => 'required|exists:users,id',
        'heart_rate' => 'required|integer',
        'respiratory_rate' => 'required|integer',
        'blood_pressure' => 'required|string',
        'temperature' => 'required|numeric',
        'oxygen_saturation' => 'required|numeric',
        'severity' => 'required'
    ]);

    // Buscar la emergencia por ID
    $emergency = Emergency::findOrFail($id);

    // Actualizar los datos de la emergencia
    $emergency->update([
        'user_id' => $request->user_id,
        'heart_rate' => $request->heart_rate,
        'respiratory_rate' => $request->respiratory_rate,
        'blood_pressure' => $request->blood_pressure,
        'temperature' => $request->temperature,
        'oxygen_saturation' => $request->oxygen_saturation,
        'severity' => $request->severity,
    ]);

    $notification = 'El triaje se ha actualizado correctamente.';

    return redirect('/emergencies')->with(compact('notification'));
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    // Buscar la emergencia por ID
    $emergency = Emergency::findOrFail($id);

    // Eliminar la emergencia
    $emergency->delete();

    $notification = 'El triaje se ha eliminado correctamente.';

    return redirect('/emergencies')->with(compact('notification'));
}

}
