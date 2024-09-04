@extends('layouts.app')
@section('page-title')
    Editar horario
@endsection
@section('content')
    <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3">
            <div
                class="px-3 relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                <div class=" flex items-center p-4 px-3 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                    <h6 class="dark:text-white mb-0">Editar horario</h6>
                    <a href=" {{ url('/schedules') }}"
                        class="inline-block px-2.5  py-1  ml-auto font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-red-500 border-0 rounded-lg shadow-md cursor-pointer text-sm tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">Regresar</a>
                </div>
            </div>
            <div>
                <form action="{{ url('/schedules/'.$schedule->id) }}" method="POST"
                   
                    class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border p-6">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="relative p-2 my-1 text-white bg-red-500 rounded-lg">{{ $error }}</div>
                            @endforeach
                        @endif
                        <p class="leading-normal uppercase dark:text-white dark:opacity-60 text-sm">Información horario</p>
                    </div>
                    <div class="flex flex-wrap -mx-3">
                        <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Nombre</label>
                                <input id="name" placeholder="Ingrese el nombre del horario" type="text"
                                    name="name" required value="{{ old('name', $schedule) }}"
                                    class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                            </div>
                        </div>
                        <div class="w-full max-w-full px-3 shrink-0 md:w-3/12 md:flex-0">
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="start_time_id">Hora de
                                    inicio</label>
                                <select id="start_time_id" name="start_time_id" required
                                    class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                                    <option value="" disabled selected>Seleccione hora</option>
                                    @foreach ($times as $time)
                                    <option value="{{ $time->id }}" 
                                        {{ $schedule->daysTimes->first()->pivot->start_time_id == $time->id ? 'selected' : '' }}>
                                        {{ $time->time }}
                                    </option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="w-full max-w-full px-3 shrink-0 md:w-3/12 md:flex-0">
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="end_time_id">Hora de
                                    fin</label>
                                <select id="end_time_id" name="end_time_id" required
                                    class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                                    <option value="" disabled selected>Seleccione hora</option>
                                    @foreach ($times as $time)
                                    <option value="{{ $time->id }}" 
                                        {{ $schedule->daysTimes->first()->pivot->end_time_id == $time->id ? 'selected' : '' }}>
                                        {{ $time->time }}
                                    </option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="w-full max-w-full px-3 shrink-0 md:w-12/12 md:flex-0">
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="days">Día</label>
                                <select id="my-multiselect" name="days[]"
                                    class="form-multiselect block w-full mt-1 rounded-lg border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                    multiple>
                                    @foreach ($days as $day)
                                        <option value="{{ $day->id }}"
                                            {{ in_array($day->id, $schedule->daysTimes->pluck('pivot.day_id')->toArray()) ? 'selected' : '' }}>
                                            {{ $day->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>
                    <hr
                        class="h-px mx-0 my-4 bg-transparent border-0 opacity-25 bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent" />

                    <div class="flex justify-end  ">

                        <button type="submit"
                            class="inline-block px-4 py-2  ml-auto font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-lime-500 border-0 rounded-lg shadow-md cursor-pointer text-md tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">Guardar
                            horario</button>
                    </div>
                </form>
            </div>
        </div>
    @endsection
