@extends('layouts.app')
@section('page-title')
    Agendar cita médica
@endsection
@section('content')
    <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3">
            <div
                class="px-3 relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                <div class="flex items-center p-4 px-3  border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                    <h6 class="dark:text-white mb-0">Agendar cita médica</h6>
                    <a href="{{ url('/emergencies') }}"
                        class="inline-block px-2.5  py-1  ml-auto font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-red-500 border-0 rounded-lg shadow-md cursor-pointer text-sm tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85"">Regresar</a>
                </div>
            </div>

            <div>

                <form action="{{ url('/emergencies') }}" method="POST"
                    class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border p-6">
                    @csrf
                    <div class="mb-4">
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="relative p-2 my-1 text-white bg-red-500 rounded-lg">{{ $error }}</div>
                            @endforeach
                        @endif

                        @if (session('notification'))
                            <div class="relative p-2 my-2 text-white rounded-lg bg-lime-500">
                                {{ session('notification') }}
                            </div>
                        @else
                            @if (session('notificationDelete'))
                                <div class="relative p-2 my-2 text-white rounded-lg bg-red-500">
                                    {{ session('notificationDelete') }}
                                </div>
                            @endif
                        @endif

                        <p class="leading-normal  uppercase dark:text-white dark:opacity-60 text-sm">Información cita</p>
                    </div>
                    @if (auth()->check() && auth()->user()->hasRole('admin'))
                    <div class="flex flex-wrap -mx-3 ">
                        <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="patient">Paciente</label>
                                <select id="patientSelect" name="user_id"
                                    class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                                    required>
                                    <option value="" disabled selected>Seleccione un paciente</option>
                                    @foreach ($patients as $patient)
                                        <option value="{{ $patient->id }}"
                                            {{ old('patient_id') == $patient->id ? 'selected' : '' }}>
                                            {{ $patient->person->first_name ?? 'N/A' }}
                                            {{ $patient->person->last_name ?? 'N/A' }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                     @endif

                    
                    <div class="flex flex-wrap -mx-3  ">
                        <div class="w-full max-w-full px-3 shrink-0 md:w-2/12 md:flex-0">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="heart_rate">
                                F. cardíaca:
                            </label>
                            <input class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                            @error('heart_rate') border-red-500 @enderror" 
                            id="heart_rate" 
                            name="heart_rate" 
                            type="number" 
                            min="60" 
                            max="100" 
                            placeholder="" 
                            required 
                            value="{{old('heart_rate')}}" >
                        </div>
                        <div class="w-full max-w-full px-3 shrink-0 md:w-2/12 md:flex-0">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="respiratory_rate">
                                F. respiratoria:
                            </label>
                            <input class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                            @error('respiratory_rate') border-red-500 @enderror" 
                            id="respiratory_rate" 
                            name="respiratory_rate" 
                            type="number" 
                            min="12" 
                            max="20" 
                            placeholder="" 
                            required 
                            value="{{old('respiratory_rate')}}" >
                        </div>
                        
                        <div class="w-full max-w-full px-3 shrink-0 md:w-2/12 md:flex-0">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="respiratory_rate">
                                Presión arterial::
                            </label>
                            <input class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                            @error('blood_pressure') border-red-500 @enderror" 
                            id="blood_pressure" 
                            name="blood_pressure" 
                            type="text" 
                            placeholder="" 
                            required 
                            value="{{old('blood_pressure')}}" >
                        </div>
                        <div class="w-full max-w-full px-3 shrink-0 md:w-2/12 md:flex-0">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="temperature">
                                Temperatura (°C):
                            </label>
                            <input class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                            @error('temperature') border-red-500 @enderror" 
                            id="temperature" 
                            name="temperature" 
                            type="number" 
                            placeholder="" 
                             step="0.01"
                            required 
                            value="{{old('temperature')}}" >
                        </div>
                        <div class="w-full max-w-full px-3 shrink-0 md:w-3/12 md:flex-0">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="temperature">
                                Saturación SpO2 (%):
                            </label>
                            <input class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                            @error('oxygen_saturation') border-red-500 @enderror" 
                            id="oxygen_saturation" 
                            name="oxygen_saturation" 
                            type="number" 
                            placeholder="" 
                             step="0.01"
                            required 
                            value="{{old('oxygen_saturation')}}" >
                        </div>
                   
                        
                    
                       
                        
                        {{-- <div class="w-full px-3 max-w-full shrink-0 md:w-6/12 md:flex-0">
                            <div class="mb-4 relative">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="date">Fecha</label>
                                <input value="{{ old('date'), date('Y-m-d') }}" placeholder="Ingrese la fecha"
                                    type="date" id="date" name="date"
                                    class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full pl-10 appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                                    required x-data x-init="flatpickr($el, {
                                        dateFormat: 'Y-m-d',
                                        minDate: 'today', // Fecha mínima es hoy
                                        maxDate: new Date().fp_incr(30) // Fecha máxima es 30 días en el futuro
                                    })">
                            </div>
                        </div> --}}
                       
                        <div class="w-full px-3 max-w-full shrink-0 md:w-4/12 md:flex-0">
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="hour">Prioridad</label>
                                <div class="flex space-x-4">
                                    <!-- Opción 'Alto' -->
                                    <div class="flex items-center px-4">
                                        <input id="severity_alto" type="radio" name="severity" value="alto"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                                            @if (old('severity') == 'alto') checked @endif>
                                        <label for="severity_alto" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Alto</label>
                                    </div>
                                
                                    <!-- Opción 'Medio' -->
                                    <div class="flex items-center px-4">
                                        <input id="severity_medio" type="radio" name="severity" value="medio"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                                            @if (old('severity') == 'medio') checked @endif>
                                        <label for="severity_medio" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Medio</label>
                                    </div>
                                
                                    <!-- Opción 'Bajo' -->
                                    <div class="flex items-center px-4">
                                        <input id="severity_bajo" type="radio" name="severity" value="bajo"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                                            @if (old('severity') == 'bajo') checked @endif>
                                        <label for="severity_bajo" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Bajo</label>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        {{-- <div class="w-full max-w-full px-3  shrink-0 md:w-12/12 md:flex-0">
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
                                    Síntomas
                                </label>
                                <textarea
                                    class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none""
                                    id="description" name="description" placeholder="Ingrese los síntomas">{{ Request::old('description') }}</textarea>
                            </div>
                        </div> --}}
                    </div>
                    <div class="flex justify-end ">
                        <button type="submit"
                            class="inline-block px-4 py-2  ml-auto font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-lime-500 border-0 rounded-lg shadow-md cursor-pointer text-md tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">Registrar Triaje
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
