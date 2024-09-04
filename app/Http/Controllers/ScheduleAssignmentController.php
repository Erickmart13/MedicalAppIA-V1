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
        $scheduleAssignments = ScheduleAssignment::with(['schedule.daysTimes', 'schedule.daysTimes.startTime', 'schedule.daysTimes.endTime', 'user.roles'])->get();

        $schedules = $scheduleAssignments->groupBy('schedule_id');
    
        $schedule = Schedule::all();
        $user = User::all();
        $roles = Role::all();
        
        
        return view('scheduleAssignments.index',compact('roles','user','schedule','scheduleAssignments','schedules'));
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
