@extends('layouts.app')
@section('page-title')
    Asignar consultorios
@endsection

@section('content')


    <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3">
            <div
                class="px-3 relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                <div class="flex items-center p-4 px-3  border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                    <h6 class="dark:text-white mb-0">Asignar consultorios</h6>
                    <a href="{{ url('/assignOffices') }}"
                        class="inline-block px-2.5  py-1  ml-auto font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-red-500 border-0 rounded-lg shadow-md cursor-pointer text-sm tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85"">Regresar</a>
                </div>
            </div>

            <div>
                <form action="{{ route('assignOffices.store') }}" method="POST"
                    class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border p-6">
                    @csrf
                    <div class="mb-4">
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="relative p-2 my-1 text-white bg-red-500 rounded-lg">{{ $error }}</div>
                            @endforeach
                        @endif

                        <p class="leading-normal uppercase dark:text-white dark:opacity-60 text-sm">Consultorios - Médicos
                        </p>
                    </div>
                    <div class="flex flex-wrap -mx-3">

                        <div class="w-full border border-gray-200 rounded-xl overflow-x-auto">
                            <table class="w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50 text-slate-800">
                                    <tr class="divide-x divide-gray-200">
                                        <th class="px-4 py-2">Consultorio</th>
                                        <th class="px-4 py-2">Doctor</th>
                                        <th class="px-4 py-2">Especialidad</th>
                                        <th class="px-4 py-2">Fecha de asignación</th>
                                        <th class="px-4 py-2">Estado</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 bg-white text-slate-800">
                                    <tr class="divide-x divide-gray-200">
                                        @foreach ($assignments as $officeAssignment)
                                    <tr>
                                        <td class="px-4 py-2">{{ $officeAssignment->office->name }}</td>

                                        <td class="px-4 py-2">{{ $officeAssignment->user->person->first_name }}
                                            {{ $officeAssignment->user->person->last_name }}</td>
                                        <td class="px-4 py-2"> {{ $officeAssignment->specialty->name }}</td>
                                        <td class="px-4 py-2">{{ $officeAssignment->created_at->format('Y-m-d') }}</td>
                                        <td class="px-4 py-2">
                                            {{ $officeAssignment->office->active == 0 ? 'Ocupado' : 'Disponible' }}</td>

                                    </tr>
                                    @endforeach
                                    @foreach ($offices as $office)
                                        <tr>
                                            <td class="px-4 py-2">{{ $office->name }}</td>
                                            <td class="px-4 py-2"></td>
                                            <td class="px-4 py-2"></td>
                                            <td class="px-4 py-2"></td>
                                            <td class="px-4 py-2">{{ $office->active == 0 ? 'Ocupado' : 'Disponible' }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="flex justify-end py-4 ">
                        <a href="{{ url('/api/reporte-consultorios-pdf') }}"
                            class="inline-block px-4 py-2  ml-auto font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-lime-500 border-0 rounded-lg shadow-md cursor-pointer text-md tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">Imprimir
                            pdf
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
