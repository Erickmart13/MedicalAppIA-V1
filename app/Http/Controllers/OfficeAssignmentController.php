<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\User;
use App\Models\Office;
use App\Models\Specialty;
use Illuminate\Http\Request;
use App\Models\OfficeAssignment;

class OfficeAssignmentController extends Controller
{
    public function index()
    {

        $officesAssigenments = OfficeAssignment::all();
        $doctors = User::whereHas('roles', function ($query) {
            $query->where('role_id', 2);
        })->get();
       // Obtener solo los offices donde active es 1
    $offices = Office::where('active', 1)->get();
        return view('officesAssignments.index', compact('doctors', 'offices', 'officesAssigenments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $specialties=Specialty::all();
        $officesAssigenments = OfficeAssignment::all();
        $doctors = User::whereHas('roles', function ($query) {
            $query->where('role_id', 2);
        })->get();
       // Obtener solo los offices donde active es 1
    $offices = Office::where('active', 1)->get();
        return view('officesAssignments.create', compact('doctors', 'offices', 'officesAssigenments','specialties'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'office_id' => 'required|exists:offices,id',
            'specialty_id' => 'required|exists:specialties,id',
        ]);


        OfficeAssignment::create([
            'user_id' => $request->user_id,
            'office_id' => $request->office_id,
            'specialty_id' =>$request->specialty_id

        ]);

        Office::where('id', $request->office_id)->update([
            'active' => 0
        ]);

        return redirect()->route('assignOffices.index')->with('success', 'Consultorio asignado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $assignments = OfficeAssignment::all();
        $offices = Office::where('active', 1)->get();
        
        return view('officesAssignments.show',compact('assignments','offices'));
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
       
        // Encuentra el registro de OfficeAssignment por su ID
    $officeAssignment = OfficeAssignment::findOrFail($id);

    // Obtén el office_id del registro de OfficeAssignment
    $officeId = $officeAssignment->office_id;

    // Elimina el registro de OfficeAssignment
    $officeAssignment->delete();

    // Actualiza el campo 'active' en el registro correspondiente de Office
    Office::where('id', $officeId)->update([
        'active' => 1
    ]);
        return redirect()->route('assignOffices.index')->with('success', 'El consultorio queda disponible');
    }
}
