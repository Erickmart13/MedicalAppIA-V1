<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Specialty;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
        $confirmedAppointments = Appointment::all()
            ->where('status', 'Confirmada')
            ->where('patient_id');
        $pendingAppointments = Appointment::all()
            ->where('status', 'Reservada')
            ->where('patient_id');
        $oldAppointments = Appointment::all()
            ->whereIn('status', ['Atendida', 'Cancelada'])
            ->where('patient_id');



        return view('appointments.index', compact('confirmedAppointments', 'pendingAppointments', 'oldAppointments'));
    }

    public function create()
    {
        // Obtén los pacientes con el rol de paciente
        $patients = User::whereHas('roles', function ($query) {
            $query->where('role_id', 5); // Suponiendo que el ID del rol de paciente es 5
        })->with('person') // Incluye la información adicional del paciente
            ->get();


        $specialties = Specialty::all();

        $specialtyId = old('specialty_id');
        if ($specialtyId) {
            $specialty = Specialty::find($specialtyId);
            $doctors = $specialty->persons;
        } else {
            $doctors = collect();
        }

        return view('appointments.create', compact('specialties', 'patients', 'doctors', 'specialtyId'));
    }

    public function store(Request $request)
    {
        // Reglas de validación
        $rules = [
            'hour' => 'required',
            'list_radio' => 'required',
            'description' => 'required',
            'doctor_id' => 'exists:persons,id',
            'specialty_id' => 'exists:specialties,id',
        ];

        // Mensajes de error personalizados
        $messages = [
            'hour.required' => 'Debe seleccionar una hora para su cita.',
            'list_radio.required' => 'Debe seleccionar un tipo de cita médica.',
            'description.required' => 'La descripción es obligatoria.',
        ];

        // Validación de la solicitud
        $this->validate($request, $rules, $messages);

        // Obtener los datos necesarios de la solicitud
        $data = $request->only([
            'date',
            'hour',
            'list_radio',
            'description',
            'doctor_id',
            'specialty_id',
            'patient_id'
        ]);

        // // Determinar el paciente según el rol del usuario
        // if (auth()->user()->role == 'admin') {
        //     // Si es administrador, toma el patient_id del request
        //     $data['patient_id'] = $request->input('patient_id');
        // } else {
        //     // Si es paciente, usa el ID del paciente asociado al usuario autenticado
        //     $person = auth()->user()->persons()->first();
        //     if ($person) {
        //         $data['patient_id'] = $person->id;
        //     } else {
        //         // Manejar el caso en que no haya persona asociada
        //         return back()->withErrors(['patient_id' => 'No se encontró un paciente asociado a este usuario.']);
        //     }
        // }

        // Crear la cita
        Appointment::create($data);

        // Notificación de éxito
        $notification = 'La cita se ha agendado correctamente';
        return back()->with(compact('notification'));
    }
}
