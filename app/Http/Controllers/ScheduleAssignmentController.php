<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Schedule;
use Illuminate\Http\Request;
use App\Models\ScheduleAssignment;

class ScheduleAssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtén el usuario autenticado
        $user = auth()->user();
    
        // Verifica si el usuario tiene el rol de doctor
        if ($user->hasRole('doctor')) {
            // Filtra las asignaciones de horario para el usuario autenticado
            $scheduleAssignments = ScheduleAssignment::with(['schedule.daysTimes', 'schedule.daysTimes.startTime', 'schedule.daysTimes.endTime'])
                ->where('user_id', $user->id)
                ->get();
    
            // Agrupa las asignaciones de horarios por ID de horario
            $schedules = $scheduleAssignments->groupBy('schedule_id');
        } elseif ($user->hasRole('admin')) {
            // Si el usuario es administrador, muestra todas las asignaciones de horarios
            $scheduleAssignments = ScheduleAssignment::with(['schedule.daysTimes', 'schedule.daysTimes.startTime', 'schedule.daysTimes.endTime'])->get();
    
            // Agrupa las asignaciones de horarios por ID de horario
            $schedules = $scheduleAssignments->groupBy('schedule_id');
        } else {
            // Si el usuario no tiene el rol de doctor ni administrador, redirige o maneja el caso según tus necesidades
            return redirect()->back()->with('error', 'No tienes permiso para ver esta página.');
        }
    
        // Obtén todos los horarios y roles si es necesario para el usuario autenticado
        $schedule = Schedule::all();
        $roles = Role::all();
    
        // Retorna la vista con los datos filtrados
        return view('scheduleAssignments.index', compact('roles', 'schedule', 'scheduleAssignments', 'schedules'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $scheduleAssignments = ScheduleAssignment::all();

      
        $schedule=Schedule::all();

        $user = User::all();
        // $schedule = Schedule::all();
       
        $roles = Role::where('name', '!=', 'Patient')->get(); // Ajusta 'Patient' según tu caso
        
        // $doctors = Doctor::with('person')->get();
        return view('scheduleAssignments.create',compact('roles','user','schedule','scheduleAssignments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        $request->validate([
            'user_id' => 'required|exists:persons,id',
            'schedule_id' => 'required|exists:schedules,id',
        ]);

        // Crear una nueva asignación de horario
    ScheduleAssignment::create([
        'user_id' => $request->input('user_id'),
        'schedule_id' => $request->input('schedule_id'),
        'active' => $request->input('active'),
    ]);

        return redirect()->route('scheduleAssignments.index')->with('success', 'Horario asignado correctamente.');
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
