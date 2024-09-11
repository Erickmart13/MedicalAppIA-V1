@extends('layouts.app')

@section('content')
    <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3">
            <div
                class="relative flex flex-col min-w-0 mb-0 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-lg bg-clip-border">

                <div class="flex items-center p-6 pb-0 mb-2 text-center align-middle border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                    <h6 class=" dark:text-white">Consultorios Asignados</h6>
                    
                        <a class="inline-block dark:text-white px-10 py-2.5 mb-0 font-bold text-center align-middle transition-all bg-transparent border-0 rounded-lg shadow-none cursor-pointer leading-normal text-mb ease-in bg-150 hover:-translate-y-px active:opacity-85 bg-x-25 text-slate-700"
                        href="{{ url('/assignOffices/show') }}">
                        <i class=" mr-2 far fa-eye text-blue-500" aria-hidden="true"></i>Ver Reportes
                    </a>
                    <a href=" {{ url('/assignOffices/create') }}"
                        class="bg-blue-500 from-emerald-500 to-teal-400 px-2.5 text-sm rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold leading-none text-white ml-auto">Asignar
                        Consultorio</a>

                </div>
                <div>
                    @if (session('notification'))
                        <div class="relative mx-4 p-2 my-2 text-white rounded-lg bg-lime-500">
                            {{ session('notification') }}
                        </div>
                    @else
                        @if (session('notificationDelete'))
                            <div class="relative mx-4 p-2 my-2 text-white rounded-lg bg-red-500">
                                {{ session('notificationDelete') }}
                            </div>
                        @endif
                    @endif
                </div>
                <div class="flex-auto px-0 pt-0 pb-2">
                    <div class="p-0 overflow-x-auto">
                        <table
                            class="items-center w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
                            <thead class="align-bottom">
                                <tr>
                                    <th
                                        class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Consultorio</th>
                                    <th
                                        class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Médico</th>
                                    <th
                                        class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Especialidad</th>
                                    <th
                                        class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Fecha de asignación</th>
                                    <th
                                        class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Estado</th>

                                    <th
                                        class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                        Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($officesAssigenments as $officeAssignment)
                                    <tr>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <div class="flex px-2 py-1">

                                                <div class="flex flex-col justify-center">
                                                    <h6
                                                        class="mb-0 text-sm leading-tight dark:text-white dark:opacity-80 font-normal">
                                                        {{ $officeAssignment->office->name }}</h6>

                                                </div>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <div class="flex px-2 py-1">

                                                <div class="flex flex-col justify-center">
                                                    <h6
                                                        class="mb-0 text-sm leading-tight dark:text-white dark:opacity-80 font-normal">
                                                        {{ $officeAssignment->user->person->first_name }}
                                                        {{ $officeAssignment->user->person->last_name }}


                                                </div>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <div class="flex px-2 py-1">

                                                <div class="flex flex-col justify-center">
                                                    <h6
                                                        class="mb-0 text-sm leading-tight dark:text-white dark:opacity-80 font-normal">
                                                        {{ $officeAssignment->specialty->name }}
                                                    </h6>

                                                </div>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <div class="flex px-2 py-1">

                                                <div class="flex flex-col justify-center">
                                                    <h6
                                                        class="mb-0 text-sm leading-tight dark:text-white dark:opacity-80 font-normal">
                                                        {{ $officeAssignment->created_at->format('Y-m-d') }}</h6>

                                                </div>
                                            </div>
                                        </td>
                                        <td
                                            class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <div class="flex px-2 py-1">

                                                <div class="flex flex-col justify-center">
                                                    <h6
                                                        class="mb-0 text-sm leading-tight dark:text-white dark:opacity-80 font-normal">
                                                        {{ $officeAssignment->office->active == 0 ? 'Ocupado' : 'Disponible' }}
                                                    </h6>

                                                </div>
                                            </div>
                                        </td>

                                        <td
                                            class="p-2 text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">

                                            <form action="{{ url('/assignOffices/' . $officeAssignment->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')


                                                <button type="submit"
                                                    class="bg-lime-500  from-emerald-500 to-teal-400 px-2.5 text-xs rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold leading-none text-white">Desocupar</a>

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
