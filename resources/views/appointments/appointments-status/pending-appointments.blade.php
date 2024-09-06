
<div class="p-0 overflow-x-auto">
    <table class="items-center w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
        <thead class="align-bottom">
            <tr>
                <th
                    class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                    Paciente</th>
                <th
                    class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                    Especialidad</th>
                <th
                    class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                    Médico</th>
                <th
                    class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                    Fecha</th>
                <th
                    class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                    Hora</th>
                <th
                    class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                    Estado</th>


                <th
                    class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                    Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pendingAppointments as $appointment)
                <tr>
                    <td
                        class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                        <div class="flex px-2 py-1">

                            <div class="flex flex-col justify-center">
                                <h6 class="mb-0 text-sm leading-tight dark:text-white dark:opacity-80 font-normal">
                                    {{ $appointment->patient->first_name }}
                                    {{ $appointment->patient->last_name }}</h6>

                            </div>
                        </div>
                    </td>
                    <td
                        class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                        <div class="flex px-2 py-1">

                            <div class="flex flex-col justify-center">
                                <h6 class="mb-0 text-sm leading-tight dark:text-white dark:opacity-80 font-normal">
                                    {{ $appointment->specialty->name }}</h6>

                            </div>
                        </div>
                    </td>
                    <td
                        class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                        <div class="flex px-2 py-1">

                            <div class="flex flex-col justify-center">
                                <h6 class="mb-0 text-sm leading-tight dark:text-white dark:opacity-80 font-normal">
                                    {{ $appointment->doctor->first_name }}
                                    {{ $appointment->doctor->last_name }}</h6>

                            </div>
                        </div>
                    </td>

                    <td
                        class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                        <div class="flex px-2 py-1">

                            <div class="flex flex-col justify-center">
                                <h6 class="mb-0 text-sm leading-tight dark:text-white dark:opacity-80 font-normal">
                                    {{ $appointment->date }}</h6>

                            </div>
                        </div>
                    </td>
                    <td
                        class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                        <h6 class="mb-0 text-sm  leading-tight dark:text-white dark:opacity-80 font-normal">
                            {{ $appointment->hour }}</h6>

                    </td>

                    <td
                        class="p-2 text-sm leading-normal text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                        @if ($appointment->status == 'Reservada')
                            <span
                                class="bg-gradient-to-tl from-emerald-500 to-teal-400 px-2.5 text-xs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">
                                Reservada
                            </span>
                        @else
                            @if ($appointment->status == 'Cancelada')
                                <span
                                    class="bg-gradient-to-tl from-red-600 to-rosa-400 px-2.5 text-xs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">
                                    Cancelada
                                </span>
                            @else
                                <span
                                    class="bg-gradient-to-tl from-red-600 to-rosa-400 px-2.5 text-xs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold uppercase leading-none text-white">
                                    Confirmada
                                </span>
                            @endif
                        @endif
                    </td>



                    
                    <td class="text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                        <div class="flex justify-center px-2 py-1">
                            <form class="pl-12" action="{{ url('/miscitas/' . $appointment->id . '/show') }}" method="GET">
                                @csrf
                                <button title="Ver cita" type="submit"
                                    class="relative z-10 inline-block px-2 py-2.5 font-bold text-center text-transparent align-middle transition-all border-0 rounded-lg shadow-none cursor-pointer leading-normal text-lg ease-in bg-150 hover:-translate-y-px active:opacity-85 bg-x-25 bg-clip-text">
                                    <i
                                        class=" fas fa-eye bg-150 bg-gradient-to-tl from-blue-500 to-sky-500 bg-x-25 bg-clip-text"></i>
                                </button>
                            </form>
                            <form action="{{ url('/miscitas/' . $appointment->id . '/confirm') }}" method="POST">
                                @csrf
                                <button title="Confirmar cita" type="submit"
                                    class=" relative z-10 inline-block px-2 py-2.5 font-bold text-center text-transparent align-middle transition-all border-0 rounded-lg shadow-none cursor-pointer leading-normal text-lg ease-in bg-150 hover:-translate-y-px active:opacity-85 bg-x-25 bg-clip-text">
                                    <i
                                        class=" fas fa-check-circle bg-150 bg-gradient-to-tl from-green-600 to-lime-400 bg-x-25 bg-clip-text"></i>
                                </button>
                            </form>
                            <form class="pr-6" action="{{ url('/miscitas/' . $appointment->id . '/cancel') }}" method="POST">
                                @csrf
                                <button title="Cancelar cita" type="submit"
                                    class="relative z-10 inline-block px-2 py-2.5 mb-0 font-bold text-center text-transparent align-middle transition-all border-0 rounded-lg shadow-none cursor-pointer leading-normal text-lg ease-in bg-150 hover:-translate-y-px active:opacity-85 bg-x-25 bg-clip-text">
                                    <i
                                        class=" fas fa-times-circle bg-150 bg-gradient-to-tl from-red-600 to-orange-600 bg-x-25 bg-clip-text"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                    
                    



                </tr>
            @endforeach


        </tbody>
    </table>

</div>
