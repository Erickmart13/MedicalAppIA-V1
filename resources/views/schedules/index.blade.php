@extends('layouts.app')
@section('page-title')
    Horarios
@endsection
@section('content')
    <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3">
            <div
                class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-lg bg-clip-border">

                <div class="flex items-center p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                    <h6 class="dark:text-white">Horarios</h6>
                    <a href="{{ url('/schedules/create') }}"
                        class="inline-block px-2.5  py-1 ml-auto font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-blue-500 border-0 rounded-lg shadow-md cursor-pointer text-sm tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">Nueva
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

                <div class="flex-auto px-4 pt-4 pb-4">
                    <div class="p-0 overflow-x-auto">
                        <table id="table" class="display"
                            class="display table w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
                            <thead class="align-bottom">
                                <tr>
                                    <th
                                        class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Nombre
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
                                        Creado
                                    </th>
                                    <th
                                        class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Opciones
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($schedules as $schedule)
                                    <tr>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <div class="flex px-2 py-1">
                                                <div class="flex flex-col justify-center">
                                                    <h6
                                                        class="mb-0 text-sm leading-tight dark:text-white dark:opacity-80 font-normal">
                                                        <strong>{{ $schedule->name }}</strong>
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <div class="flex flex-col">
                                                @foreach ($schedule->daysTimes as $dayTime)
                                                    <div>
                                                        {{ $dayTime->name }}
                                                    </div>
                                                @endforeach
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <div class="flex flex-col">
                                                @foreach ($schedule->daysTimes as $dayTime)
                                                    <div>
                                                        {{ $dayTime->start_time->time }}
                                                    </div>
                                                @endforeach
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <div class="flex flex-col">
                                                @foreach ($schedule->daysTimes as $dayTime)
                                                    <div>
                                                        {{ $dayTime->end_time->time }}
                                                    </div>
                                                @endforeach
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <h6
                                                class="mb-0 text-sm leading-tight dark:text-white dark:opacity-80 font-normal">
                                                {{ \Carbon\Carbon::parse($schedule->created_at)->format('Y-m-d') }}
                                            </h6>
                                        </td>
                                        <td
                                            class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            
                                            <form action="{{ url('/schedules/' . $schedule->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                
                                             
                                                <a class="inline-block dark:text-white px-2 py-2.5 mb-0 font-bold text-center align-middle transition-all bg-transparent border-0 rounded-lg shadow-none cursor-pointer leading-normal text-mb ease-in bg-150 hover:-translate-y-px active:opacity-85 bg-x-25 text-slate-700" href="{{ url('/schedules/' . $schedule->id . '/edit') }}"><i class="mr-2 fas fa-pencil-alt text-lime-500" aria-hidden="true"></i></a>
                                                <button type="submit" class="relative z-10 inline-block px-2 py-2.5 mb-0 font-bold text-center text-transparent align-middle transition-all border-0 rounded-lg shadow-none cursor-pointer leading-normal text-mb ease-in bg-150 bg-gradient-to-tl from-red-600 to-orange-600 hover:-translate-y-px active:opacity-85 bg-x-25 bg-clip-text" ><i class="mr-2 far fa-trash-alt bg-150 bg-gradient-to-tl from-red-600 to-orange-600 bg-x-25 bg-clip-text"></i></a>
                                               
                                                
                                                

                                            </form>
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
