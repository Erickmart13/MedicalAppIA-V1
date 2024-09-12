<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Person;
use App\Models\Specialty;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{

    public function index()
    {
        // Obtén el ID del usuario autenticado
        $userId = auth()->id();

        // Obtén la persona asociada al usuario autenticado
        $person = Person::where('user_id', $userId)->first();

        if (!$person) {
            // Manejar el caso en el que no se encuentra la persona asociada
            return redirect()->back()->with('error', 'No se encontró información de persona asociada con este usuario.');
        }
        
        $user = User::find(Auth::user()->id);

        
        if ($user) {
            $isAdmin = $user->hasRole('admin');
            $isDoctor = $user->hasRole('doctor');
        } else {
            // Maneja el caso en que el usuario no está autenticado
        }

        if ($isAdmin) {
            // Si es administrador, muestra todas las citas
            $confirmedAppointments = Appointment::where('status', 'Confirmada')->get();
            $pendingAppointments = Appointment::where('status', 'Reservada')->get();
            $oldAppointments = Appointment::whereIn('status', ['Finalizada', 'Cancelada'])->get();
        } elseif ($isDoctor) {
            // Si es doctor, muestra solo las citas donde el doctor es el usuario autenticado
            $confirmedAppointments = Appointment::where('status', 'Confirmada')
                ->where('doctor_id', $person->id)
                ->get();

            $pendingAppointments = Appointment::where('status', 'Reservada')
                ->where('doctor_id', $person->id)
                ->get();

            $oldAppointments = Appointment::whereIn('status', ['Finalizada', 'Cancelada'])
                ->where('doctor_id', $person->id)
                ->get();
        } else {
            // Si es paciente, muestra solo las citas donde el paciente es el usuario autenticado
            $confirmedAppointments = Appointment::where('status', 'Confirmada')
                ->where('patient_id', $person->id)
                ->get();

            $pendingAppointments = Appointment::where('status', 'Reservada')
                ->where('patient_id', $person->id)
                ->get();

            $oldAppointments = Appointment::whereIn('status', ['Finalizada', 'Cancelada'])
                ->where('patient_id', $person->id)
                ->get();
        }

        // Retorna la vista y pasa las citas filtradas
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
        $user = User::find(Auth::user()->id);
        // Determinar el paciente según el rol del usuario
        if($user->hasRole('admin')) {  // Usar un método como 'hasRole' para verificar roles
            // Si es administrador, toma el 'patient_id' del request
            $data['patient_id'] = $request->input('patient_id');

            // Validar si el 'patient_id' está presente en el request
            if (!$data['patient_id']) {
                return back()->withErrors(['patient_id' => 'Debe seleccionar un paciente.']);
            }
        } else if ($user->hasRole('patient')) {  // Verificar si el usuario es un paciente
            // Si es paciente, usa el ID del paciente asociado al usuario autenticado
            $person = auth()->user()->person;  // Acceder a la relación 'person'

            if ($person) {
                $data['patient_id'] = $person->id;  // Asignar el 'person_id' (o 'patient_id') de la persona
            } else {
                // Manejar el caso en que no haya persona asociada
                return back()->withErrors(['patient_id' => 'No se encontró un paciente asociado a este usuario.']);
            }
        } else {
            // Manejar el caso en que el usuario no sea ni administrador ni paciente
            return back()->withErrors(['role' => 'No tiene permisos para realizar esta acción.']);
        }
        // Crear la cita
        Appointment::create($data);

        // Notificación de éxito
        $notification = 'La cita se ha agendado correctamente';
        return back()->with(compact('notification'));
    }


    public function cancel(Appointment $appointment)
    {
        $appointment->status = 'Cancelada';
        $appointment->save();

        $notification = 'La cita se ha cancelado correctamente.';

        return back()->with(compact('notification'));
    }
    public function formCancel(Appointment $appointment)
    {
        // $appointment->status ='Cancelada';
        // $appointment->save();

        // $notification = 'La cita se ha cancelado correctamente.';

        return view('appointments.cancel', compact('$appointment'));
    }

    public function show(Appointment $appointment)
    {
        return view('appointments.show', compact('appointment'));
    }

    public function confirm(Appointment $appointment)
    {

        $appointment->status = 'Confirmada';
        $appointment->save();

        $notification = 'La cita se ha confirmado correctamente.';

        return back()->with(compact('notification'));
    }
    public function finished(Appointment $appointment)
    {

        $appointment->status = 'Finalizada';
        $appointment->save();

        $notification = 'La cita ha finalizado correctamente.';

        return back()->with(compact('notification'));
    }
}
