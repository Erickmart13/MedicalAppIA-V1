<?php

namespace App\Http\Controllers;

use App\Models\Day;
use App\Models\Time;
use App\Models\User;
use App\Models\Schedule;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schedules = Schedule::with('daysTimes')->get();

        // Cargar las horas de inicio y fin manualmente
        foreach ($schedules as $schedule) {
            foreach ($schedule->daysTimes as $dayTime) {
                $dayTime->start_time = \App\Models\Time::find($dayTime->pivot->start_time_id);
                $dayTime->end_time = \App\Models\Time::find($dayTime->pivot->end_time_id);
            }
        }
        return view('schedules.index', compact('schedules'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $days = Day::all();
        $times = Time::all();
        return view('schedules.create', compact('days','times'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string',
            'start_time_id' => 'required|exists:times,id',
            'end_time_id' => 'required|exists:times,id',
            'days' => 'required|array',
            'days.*' => 'exists:days,id',
        ];
    
        $messages = [
            'name.required' => 'El nombre de la jornada es obligatorio.',
            'name.string' => 'El nombre debe contener solo caracteres.',
            'start_time_id.required' => 'La hora de inicio es obligatoria.',
            'start_time_id.exists' => 'La hora de inicio seleccionada no es válida.',
            'end_time_id.required' => 'La hora de fin es obligatoria.',
            'end_time_id.exists' => 'La hora de fin seleccionada no es válida.',
            'days.required' => 'El día es obligatorio.',
            'days.*.exists' => 'Uno de los días seleccionados no es válido.',
        ];
    
        $this->validate($request, $rules, $messages);
    
        // Crear el horario en la base de datos
        $schedule = Schedule::create([
            'name' => $request->name,
        ]);
        // Sincronizar días seleccionados con las horas de inicio y fin
        foreach ($request->days as $day) {
            $schedule->daysTimes()->attach($day, [
                'start_time_id' => $request->start_time_id,
                'end_time_id' => $request->end_time_id,
            ]);
        }
       
        $notification = 'El horario se ha creado correctamente.';
        return redirect('/schedules')->with(compact('notification'));
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
        // Obtener el horario por su ID
    $schedule = Schedule::with(['daysTimes'])->findOrFail($id);
        $days = Day::all();
        $times = Time::all();
        $selectedDay = $schedule->day;
        return view('schedules.edit', compact('schedule','days','times','selectedDay'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'name' => 'required|string',
            'start_time_id' => 'required|exists:times,id',
            'end_time_id' => 'required|exists:times,id',
            'days' => 'required|array',
            'days.*' => 'exists:days,id',
        ];
    
        $messages = [
            'name.required' => 'El nombre de la jornada es obligatorio.',
            'name.string' => 'El nombre debe contener solo caracteres.',
            'start_time_id.required' => 'La hora de inicio es obligatoria.',
            'start_time_id.exists' => 'La hora de inicio seleccionada no es válida.',
            'end_time_id.required' => 'La hora de fin es obligatoria.',
            'end_time_id.exists' => 'La hora de fin seleccionada no es válida.',
            'days.required' => 'El día es obligatorio.',
            'days.*.exists' => 'Uno de los días seleccionados no es válido.',
        ];
    
        $this->validate($request, $rules, $messages);
    
        // Obtener el horario existente
        $schedule = Schedule::findOrFail($id);
        
        // Actualizar el nombre del horario
        $schedule->name = $request->name;
        $schedule->save();
        
        // Sincronizar días seleccionados con las horas de inicio y fin
        $schedule->daysTimes()->sync([]);
        foreach ($request->days as $day) {
            $schedule->daysTimes()->attach($day, [
                'start_time_id' => $request->start_time_id,
                'end_time_id' => $request->end_time_id,
            ]);
        }
    
        $notification = 'El horario se ha actualizado correctamente.';
        return redirect('/schedules')->with(compact('notification'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $schedule=Schedule::findOrFail($id);
        $scheduleName=$schedule->name;
        $schedule->delete();

        $notificationDelete = "El horario $scheduleName se ha eliminado correctamente";

        return redirect('/schedules')->with(compact('notificationDelete'));
    }


    public function getDoctorsBySchedule($doctorId)
    {
        $doctor = User::findOrFail($doctorId);
    
        // Verifica si el doctor tiene el rol de doctor
        if (!$doctor->roles->contains('id', 2)) {
            return response()->json(['error' => 'Esta persona no es un doctor.'], 404);
        }
    
        $date = request()->query('date');
    
        // Obtener las citas del doctor en la fecha seleccionada
        $bookedAppointments = Appointment::where('doctor_id', $doctorId)
            ->where('date', $date)
            ->pluck('hour')
            ->toArray();
    
        // Obtén los horarios asignados a este doctor y carga las relaciones necesarias
        $schedules = $doctor->schedules()->with('daysTimes')->get();
    
        $result = $schedules->map(function ($schedule) use ($doctorId, $bookedAppointments) {
            return [
                'schedule' => $schedule->only(['id', 'name']),
                'days_times' => $schedule->daysTimes->map(function ($dayTime) use ($doctorId, $bookedAppointments) {
                    $startTime = $dayTime->pivot->start_time_id ? Time::find($dayTime->pivot->start_time_id)->time : null;
                    $endTime = $dayTime->pivot->end_time_id ? Time::find($dayTime->pivot->end_time_id)->time : null;
    
                    if ($startTime && $endTime) {
                        $intervals = $this->getTimeIntervals($doctorId, $startTime, $endTime, $bookedAppointments);
                    } else {
                        $intervals = [];
                    }
    
                    return [
                        'day' => $dayTime->only(['id', 'name']),
                        'time_intervals' => $intervals,
                    ];
                })->values()
            ];
        });
    
        return response()->json($result);
    }

    private function getTimeIntervals($doctorId, $startTime, $endTime, $bookedAppointments)
{
    $start = Carbon::parse($startTime);
    $end = Carbon::parse($endTime);
    $intervals = [];

    while ($start->lt($end)) {
        $intervalEnd = $start->copy()->addMinutes(30);

        if ($intervalEnd->gt($end)) {
            $intervalEnd = $end;
        }

        $intervalStartTime = $start->format('H:i:s');

        // Ensure the interval is not booked
        if (!in_array($intervalStartTime, $bookedAppointments)) {
            $intervals[] = [
                'start_time' => $intervalStartTime,
                'end_time' => $intervalEnd->format('H:i:s')
            ];
        }

        $start = $intervalEnd;
    }

    return $intervals;
}

}
