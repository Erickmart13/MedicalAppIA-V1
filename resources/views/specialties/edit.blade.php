@extends('layouts.app')
@section('page-title')
    Editar especialidad
@endsection
@section('content')
    <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3">
            <div
                class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">

                <div class="flex items-center p-4 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                    <h6 class="dark:text-white">Editar especialidad</h6>
                    <a href=" {{ url('/specialties') }}"
                        class="inline-block px-2.5  py-1  ml-auto font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-red-500 border-0 rounded-lg shadow-md cursor-pointer text-sm tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">Regresar</a>
                </div>
            </div>

            <div>
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="relative w-full p-2 my-2 text-white bg-red-500 rounded-lg">{{ $error }}</div>
                    @endforeach
                @endif

                <form action="{{ url('/specialties/' . $specialty->id) }}" method="POST"
                    class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border p-6">
                    @csrf
                    @method('PUT')
                    <div class="flex flex-wrap -mx-3">
                        <div class="w-full max-w-full px-3 shrink-0 md:w-10/12 md:flex-0">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                                Nombre de Especialidad
                            </label>
                            <input
                                class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none @error('name') border-red @enderror"
                                id="name" name="name" type="text" required
                                value="{{ old('name', $specialty->name) }}">
                        </div>
                        <div class="w-full max-w-full px-3 shrink-0 md:w-2/12 md:flex-0">
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="active">Estado</label>
                                <select id="active" name="active"
                                    class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                                    required>
                                    <option value="" disabled
                                        {{ old('active', $specialty->active) === null ? 'selected' : '' }}>Estado</option>
                                    <option value="1" {{ old('active', $specialty->active) == 1 ? 'selected' : '' }}>
                                        Activa</option>
                                    <option value="0" {{ old('active', $specialty->active) == 0 ? 'selected' : '' }}>
                                        Inactiva</option>
                                </select>
                            </div>
                        </div>
                    </div>


                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
                            Descripción
                        </label>
                        <textarea
                            class="efocus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                            id="description" name="description">{{ old('description', $specialty->description) }}</textarea>
                    </div>
                    <div class="relative flex min-w-0 mb-6 items-center justify-end">
                        <button type="submit"
                            class="inline-block px-4 py-2  ml-auto font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-lime-500 border-0 rounded-lg shadow-md cursor-pointer text-md tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">Guardar
                            especialidad</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
