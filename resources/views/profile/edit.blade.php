{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}


@extends('layouts.app')
@section('page-title')
    Perfil
@endsection
@section('content')


    <div
        class="relative flex flex-col flex-auto min-w-0 p-4 mx-6 overflow-hidden break-words bg-white border-0 dark:bg-slate-850 dark:shadow-dark-xl shadow-3xl rounded-2xl bg-clip-border">
        <div class="flex flex-wrap -mx-3">






            
            <div class="flex-none w-auto max-w-full px-3">
                <div
                    class="relative inline-flex items-center justify-center text-white transition-all duration-200 ease-in-out text-base h-19 w-19 rounded-xl">
                    <img src="{{asset('/img/team-3.jpg')}}" alt="profile_image" class="w-full shadow-2xl rounded-xl" />
                </div>
            </div>
            <div class="flex-none w-auto max-w-full px-3 my-auto">
                <div class="h-full">
                    <h5 class="mb-1 dark:text-white">{{ Auth::user()->user_name }}</h5>
                    
                </div>
            </div>
            <div class="w-full max-w-full px-3 mx-auto mt-4 sm:my-auto sm:mr-0 md:w-1/2 md:flex-none lg:w-4/12">
                <div class="relative right-0">
                    <ul class="relative flex flex-wrap p-1 list-none bg-gray-50 rounded-xl" nav-pills role="tablist">
                        <li class="z-30 flex-auto text-center">
                            <a class="z-30 flex items-center justify-center w-full px-0 py-1 mb-0 transition-all ease-in-out border-0 rounded-lg bg-inherit text-slate-700"
                                nav-link active href="javascript:;" role="tab" aria-selected="true">
                                <i class="ni ni-app"></i>
                                <span class="ml-2">App</span>
                            </a>
                        </li>
                        <li class="z-30 flex-auto text-center">
                            <a class="z-30 flex items-center justify-center w-full px-0 py-1 mb-0 transition-all ease-in-out border-0 rounded-lg bg-inherit text-slate-700"
                                nav-link href="javascript:;" role="tab" aria-selected="false">
                                <i class="ni ni-email-83"></i>
                                <span class="ml-2">Messages</span>
                            </a>
                        </li>
                        <li class="z-30 flex-auto text-center">
                            <a class="z-30 flex items-center justify-center w-full px-0 py-1 mb-0 transition-colors ease-in-out border-0 rounded-lg bg-inherit text-slate-700"
                                nav-link href="javascript:;" role="tab" aria-selected="false">
                                <i class="ni ni-settings-gear-65"></i>
                                <span class="ml-2">Settings</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
    <div class=" w-full p-6 mx-auto">
        
        <div class="flex flex-wrap -mx-3">
            <div class="w-full max-w-full px-3 shrink-0 md:w-12/12 md:flex-0">
                <div
                    class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                    <div class="border-black/12.5 rounded-t-2xl border-b-0 border-solid p-6 pb-0">
                        <div class="flex items-center">
                            <p class="mb-0 dark:text-white/80">Editar Perfil</p>
                            <button type="button"
                                class="inline-block px-8 py-2 mb-4 ml-auto font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-blue-500 border-0 rounded-lg shadow-md cursor-pointer text-xs tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">Settings</button>
                        </div>
                    </div>




                   
                    
                    
                        
                            
                    
                            
                    
                            










                    
                    <div class="flex-auto p-6">
                        
                        <div >
                            <div class="w-full max-w-full px-3 shrink-0 md:w-12/12 md:flex-0">
                                <div class="mb-4">
                                    @include('profile.partials.update-profile-information-form')
                                </div>
                            </div>
                            
                            
                            
                        </div>

                        <div class="w-full max-w-full px-3 shrink-0 md:w-12/12 md:flex-0">
                            <div class="mb-4">

                                @include('profile.partials.update-password-form')
                                
                            </div>
                        </div>
                        <hr
                        class="h-px mx-0 my-4 bg-transparent border-0 opacity-25 bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent " />
                       
                       
                        
                        
                        
                        




                        <div class="mb-4">
                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <div class="relative p-2 my-1 text-white bg-red-500 rounded-lg">{{ $error }}</div>
                                @endforeach
                            @endif
    
                            <p class="leading-normal uppercase dark:text-white dark:opacity-60 text-sm">Información personal</p>
    
    
                        </div>
                        <div class="flex flex-wrap -mx-3">


                            <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                <div class="mb-4">
                                    <label class="inline-block mb-2 ml-1 font-bold text-sm text-slate-700 dark:text-white/80" for="first_name">Nombre</label>
                                    <input id="first_name" placeholder="Ingrese el nombre del médico" type="text"
                                        name="first_name" required value={{ Auth::user()->person->first_name }}
                                        class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                
                                        
                                
                                    </div>
                            </div>
                            <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                <div class="mb-4">
                                    <label class="inline-block mb-2 ml-1 font-bold text-sm text-slate-700 dark:text-white/80" for="last_name">Apellido</label>
                                    <input id="last_name" placeholder="Ingrese el apellido del médico" type="text"
                                        name="last_name" required value={{ Auth::user()->person->last_name }}
                                        class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                </div>
                            </div>
    
    
                            <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                <div class="mb-4">
                                    <label class="inline-block mb-2 ml-1 font-bold text-sm text-slate-700 dark:text-white/80" for="cedula">Cédula</label>
    
                                    <input id="cedula" placeholder="Ingrese el número de cédula del médico" type="text"
                                        name="cedula" required value={{ Auth::user()->person->cedula }}
                                        class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                </div>
                            </div>
    
    
                            <div class="w-full max-w-full px-3 shrink-0 md:w-3/12 md:flex-0">
    
    
                                <div class="mb-4">
                                    <label class="inline-block mb-2 ml-1 font-bold text-sm text-slate-700 dark:text-white/80" for="date_of_birth">Fecha de
                                        nacimiento</label>
                                    <input value={{ Auth::user()->person->date_of_birth }}
                                        placeholder="Ingrese la fecha" type="text" id="date_of_birth" name="date_of_birth"
                                        class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                                        required x-data x-init="flatpickr($el, { dateFormat: 'Y-m-d' })">
    
    
                                </div>
                            </div>
    
                            <div class="w-full max-w-full px-3 shrink-0 md:w-1/12 md:flex-0">
                                <div class="mb-4">
                                    <label class="inline-block mb-2 ml-1 font-bold text-sm text-slate-700 dark:text-white/80" for="age">Edad</label>
    
                                    <input id="age" placeholder="--" type="text" name="age" required
                                        value={{ Auth::user()->person->age }}
                                        class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                </div>
                            </div>
    
                            <div class="w-full max-w-full px-3 shrink-0 md:w-2/12 md:flex-0">
                                <div class="mb-4">
                                    <label class="inline-block mb-2 ml-1 font-bold text-sm text-slate-700 dark:text-white/80" for="gender">Género</label>
                                    <select required id="gender" name="gender"
                                        class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                                        required>
                                        <option value="" disabled
                                            {{ old('gender', ) == null ? 'select' : '' }}>
                                            Estado</option>
                                        <option value="male"{{ old('gender',) == null ? 'select' : '' }}>
                                            Masculino
                                        </option>
                                        <option value="female"{{ old('gender',) == null ? 'select' : '' }}>
                                            Femenino
                                        </option>
                                    </select>
                                </div>
                            </div>
    
    
    
    
                        </div>
                        <hr
                            class="h-px mx-0 my-4 bg-transparent border-0 opacity-25 bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent " />
    
                        <p class="leading-normal uppercase dark:text-white dark:opacity-60 text-sm">Información de contacto</p>
    
                        <div class="flex flex-wrap -mx-3">
                            
                            <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                <div class="mb-4">
                                    <label class="inline-block mb-2 ml-1 font-bold text-sm text-slate-700 dark:text-white/80" for="phone">Teléfono</label>
                                    <input id="phone" placeholder="Ingrese el número de teléfono del médico" type="text"
                                        name="phone" required value={{ Auth::user()->person->phone}}
                                        class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                </div>
                            </div>

                            <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                <div class="mb-4">
                                    <label class="inline-block mb-2 ml-1 font-bold text-sm text-slate-700 dark:text-white/80" for="city_of_residence">Ciudad
                                        de
                                        residencia</label>
                                    <select name="city_of_residence" required
                                        class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                                        <option value= disabled selected>Seleccione una ciudad
                                        </option>
                                        {{-- @foreach ($cities as $city)
                                            <option
                                                value="{{ $city->name }}"{{ $selectedCity == $city->name ? 'selected' : '' }}>
                                                {{ $city->name }}</option>
                                        @endforeach --}}
                                    </select>
    
    
    
    
                                </div>
                            </div>
                            <div class="w-full max-w-full px-3 shrink-0 md:w-12/12 md:flex-0">
                                <div class="mb-4">
                                    <label class="inline-block mb-2 ml-1 font-bold text-sm text-slate-700 dark:text-white/80" for="address">Dirección</label>
                                    <input id="address" placeholder="Ingrese la dirección del médico" type="text"
                                        name="address" required value={{ Auth::user()->person->address }}
                                        class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                </div>
                            </div>
                            
    
                        </div>
                        <hr
                            class="h-px mx-0 my-4 bg-transparent border-0 opacity-25 bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent " />
    
                        <div class="relative flex min-w-0 mb-6 items-center justify-end">
    
                            <button type="submit"
                                class="text-sm bg-lime-500 hover:bg-gray-700 text-white font-bold py-1 px-3 rounded-1.8 focus:outline-none focus:shadow-outline ml-4">Guardar
                                cambios</button>
                        </div>
    



















                        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                            <div class="max-w-xl">
                                @include('profile.partials.delete-user-form')
                            </div>
                        </div>
                    
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
