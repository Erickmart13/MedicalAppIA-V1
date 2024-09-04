@extends('layouts.app')
@section('page-title')
    Horarios asignados
@endsection
@section('content')
    <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3">
            <div
                class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-lg bg-clip-border">
                <div class="flex items-center p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                    <h6 class="dark:text-white">Horarios</h6>
                    <a href="{{ url('/scheduleAssignments/create') }}"
                        class="inline-block px-2.5  py-1 ml-auto font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-blue-500 border-0 rounded-lg shadow-md cursor-pointer text-sm tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">Asignar
                        horario</a>
                </div>
                <div>
                    @if (session('notification'))
                        <div class="relative mx-4 p-2 my-2 text-white rounded-lg bg-lime-500">
                            {{ session('notification') }}
                        </div>
                    @elseif (session('notificationDelete'))
                        <div class="relative mx-4 p-2 my-2 text-white rounded-lg bg-red-500">
                            {{ session('notificationDelete') }}
                        </div>
                    @endif
                </div>

                <div class="flex-auto px-0 pt-0 pb-2">
                    <div class="p-0 overflow-x-auto">
                        <table
                            class="items-center w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
                            <thead class="align-bottom">
                                <tr>
                                    <th
                                        class="px-6 py-3 text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Horario
                                    </th>

                                    <th
                                        class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Días
                                    </th>

                                    <th
                                        class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Hora de inicio
                                    </th>
                                    <th
                                        class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Hora de fin
                                    </th>
                                    <th
                                        class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Persona Asignada
                                    </th>
                                    <th
                                        class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Rol
                                    </th>
                                    <th
                                        class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Estado
                                    </th>
                                    <th
                                        class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Opciones
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($schedules as $scheduleId => $scheduleAssignments)
                                    <tr>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <div class="flex px-2 py-1">
                                                <div class="flex flex-col justify-center">
                                                    <h6
                                                        class="mb-0 text-sm leading-tight dark:text-white dark:opacity-80 font-normal">
                                                        <strong>{{ $scheduleAssignments->first()->schedule->name }}</strong>
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <div class="flex flex-col">
                                                @foreach ($scheduleAssignments->first()->schedule->daysTimes as $days)
                                                    {{ $days->name }}
                                                    <br>
                                                @endforeach
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <div class="flex flex-col">
                                                @foreach ($scheduleAssignments->first()->schedule->daysTimes as $dayTime)
                                                    <div>
                                                        {{ $dayTime->pivot->start_time_id ? \App\Models\Time::find($dayTime->pivot->start_time_id)->time : 'No asignada' }}
                                                        <br>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <div class="flex flex-col">
                                                @foreach ($scheduleAssignments->first()->schedule->daysTimes as $dayTime)
                                                    {{ $dayTime->pivot->end_time_id ? \App\Models\Time::find($dayTime->pivot->end_time_id)->time : 'No asignada' }}
                                                    <br>
                                                @endforeach
                                            </div>
                                        </td>

                                        {{-- Aquí comienza la sección de Usuario asignado, Rol y Estado --}}
                                        <td
                                            class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <div class="flex flex-col">
                                                @foreach ($scheduleAssignments as $scheduleAssignment)
                                                    <div class="py-1">
                                                        {{ $scheduleAssignment->user->person->first_name }}
                                                        {{ $scheduleAssignment->user->person->last_name }}
                                                    </div>
                                                    <br>
                                                @endforeach
                                            </div>
                                        </td>
                                        <td
                                            class="p-2  align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <div class="flex flex-col ">
                                                @foreach ($scheduleAssignments as $scheduleAssignment)
                                                    @foreach ($scheduleAssignment->user->roles as $role)
                                                        <div class="py-1">
                                                            @switch($role->name)
                                                                @case('admin')
                                                                    Administrador
                                                                @break

                                                                @case('doctor')
                                                                    Doctor
                                                                @break

                                                                @case('auditor')
                                                                    Auditor
                                                                @break

                                                                @case('tecnico1')
                                                                    Secretaria
                                                                @break

                                                                @case('tecnico2')
                                                                    Auxiliar
                                                                @break

                                                                @default
                                                                    {{ $role->name }}
                                                            @endswitch
                                                        </div>
                                                    @endforeach
                                                    <br>
                                                @endforeach
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <div class="flex flex-col">
                                                @foreach ($scheduleAssignments as $scheduleAssignment)
                                                    <div class="py-1">
                                                    {{ $scheduleAssignment->active == 0 ? 'Inactivo' : 'Activo' }}
                                                </div>
                                                    <br>
                                                @endforeach
                                            </div>
                                        </td>
                                        {{-- Fin de la sección de Usuario asignado, Rol y Estado --}}

                                        <td
                                            class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            {{-- Aquí colocas tus acciones --}}

                                            @foreach ($scheduleAssignments as $scheduleAssignment)
                                                <form action="{{ url('/scheduleAssignments/' . $scheduleAssignment->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')

                                                    <a class="inline-block dark:text-white px-2 py-1 mb-0 font-bold text-center align-middle transition-all bg-transparent border-0 rounded-lg shadow-none cursor-pointer leading-normal text-mb ease-in bg-150 hover:-translate-y-px active:opacity-85 bg-x-25 text-slate-700"
                                                        href="{{ url('/scheduleAssignments/' . $scheduleAssignment->id . '/edit') }}">
                                                        <i class="mr-2 fas fa-pencil-alt text-lime-500"
                                                            aria-hidden="true"></i>
                                                    </a>
                                                    <button type="submit"
                                                        class="relative z-10 inline-block px-2 py-1 mb-0 font-bold text-center text-transparent align-middle transition-all border-0 rounded-lg shadow-none cursor-pointer leading-normal text-mb ease-in bg-150 bg-gradient-to-tl from-red-600 to-orange-600 hover:-translate-y-px active:opacity-85 bg-x-25 bg-clip-text">
                                                        <i
                                                            class="mr-2 far fa-trash-alt bg-150 bg-gradient-to-tl from-red-600 to-orange-600 bg-x-25 bg-clip-text"></i>
                                                    </button>
                                                </form>
                                            @endforeach

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
