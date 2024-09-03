@extends('layouts.app')

@section('content')
    <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3">
            <div
                class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">

                <div class="flex items-center p-4  border-b-0 border-b-solid rounded-t-2xl border-b-transparent">

                    <h6 class="dark:text-white">Nuevo horario</h6>

                    <a href=" {{ url('/horarios') }}"
                        class="bg-red-500 from-emerald-500 to-teal-400 px-2.5 text-sm rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold leading-none text-white ml-auto">Regresar</a>
                </div>
            </div>
            <div>
                <form action="{{ url('/horarios') }}" method="POST" class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border p-6">
                    @csrf
                    <div class="mb-4">
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="relative p-2 my-1 text-white bg-red-500 rounded-lg">{{ $error }}</div>
                            @endforeach
                        @endif
                        <p class="leading-normal uppercase dark:text-white dark:opacity-60 text-sm">Información horario</p>
                    </div>
                
                    <div class="flex flex-wrap -mx-3">
                        <div class="w-full max-w-full px-3 shrink-0 md:w-4/12 md:flex-0">
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Nombre</label>
                                <input id="name" placeholder="Ingrese el nombre del horario" type="text" name="name" required value="{{ old('name') }}" class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                            </div>
                        </div>
                
                        <div class="w-full max-w-full px-3 shrink-0 md:w-8/12 md:flex-0">
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="days">Día</label>
                                <select id="my-multiselect" name="days[]" class="form-multiselect block w-full mt-1 rounded-lg border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" multiple>
                                    @foreach ($days as $day)
                                        <option value="{{ $day->id }}">{{ $day->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        
                
                        <div class="w-full max-w-full px-3 shrink-0 md:w-2/12 md:flex-0">
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="start_time_id">Hora de inicio</label>
                                <select id="start_time_id" name="start_time_id" required class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                                    <option value="" disabled selected>Seleccione hora</option>
                                    @foreach ($times as $time)
                                        <option value="{{ $time->id }}">{{ $time->time }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                
                        <div class="w-full max-w-full px-3 shrink-0 md:w-2/12 md:flex-0">
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="end_time_id">Hora de fin</label>
                                <select id="end_time_id" name="end_time_id" required class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                                    <option value="" disabled selected>Seleccione hora</option>
                                    @foreach ($times as $time)
                                        <option value="{{ $time->id }}">{{ $time->time }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    
                
                    <hr class="h-px mx-0 my-4 bg-transparent border-0 opacity-25 bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent" />
                
                    <div class="relative flex min-w-0 mb-6 items-center justify-end">
                        <button type="submit" class="text-sm bg-lime-500 hover:bg-gray-700 text-white font-bold py-1 px-3 rounded-1.8 focus:outline-none focus:shadow-outline ml-4">Crear horario</button>
                    </div>
                </form>
        </div>
    </div>
@endsection
