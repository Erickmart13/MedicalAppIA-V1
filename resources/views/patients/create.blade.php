@extends('layouts.app')
@section('page-title')
    Crear paciente
@endsection


@section('content')
    <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3">
            <div
                class="px-3 relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">

                <div class="flex items-center px-3 p-4  border-b-0 border-b-solid rounded-t-2xl border-b-transparent">

                    <h6 class="dark:text-white mb-0">Nuevo paciente</h6>

                    <a href=" {{ url('/patients') }}"
                        class="inline-block px-2.5  py-1  ml-auto font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-red-500 border-0 rounded-lg shadow-md cursor-pointer text-sm tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">Regresar</a>

                </div>


            </div>

            


                <form action="{{ url('/patients') }}" method="POST"
                    class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border p-6">
                    @csrf
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
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="first_name">Nombre</label>
                                <input id="first_name" placeholder="Ingrese el nombre del paciente" type="text"
                                    name="first_name" required value="{{ old('first_name') }}"
                                    class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                            </div>
                        </div>
                        <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="last_name">Apellido</label>
                                <input id="last_name" placeholder="Ingrese el apellido del paciente" type="text"
                                    name="last_name" required value="{{ old('last_name') }}"
                                    class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                            </div>
                        </div>


                        <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="cedula">Cédula</label>

                                <input id="cedula" placeholder="Ingrese el número de cédula del paciente" type="text"
                                    name="cedula" required value="{{ old('cedula') }}"
                                    class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                            </div>
                        </div>


                        <div class="w-full max-w-full px-3 shrink-0 md:w-3/12 md:flex-0">
                            <div class="mb-4 relative">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="date_of_birth">Fecha de
                                    nacimiento</label>

                                <input value="{{ old('date_of_birth') }}" placeholder="Ingrese la fecha" type="text"
                                    id="date_of_birth" name="date_of_birth"
                                    class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full pl-10 appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                                    required x-data x-init="flatpickr($el, { dateFormat: 'Y-m-d' })">
                            </div>
                        </div>

                        <div class="w-full max-w-full px-3 shrink-0 md:w-1/12 md:flex-0">
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="age">Edad</label>

                                <input id="age" placeholder="--" type="text" name="age" required
                                    value="{{ old('age') }}"
                                    class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                            </div>
                        </div>

                        <div class="w-full max-w-full px-3 shrink-0 md:w-2/12 md:flex-0">
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="gender">Género</label>
                                <select required value="{{ old('gender') }}" id="gender" name="gender"
                                    class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                                    <option value="" disabled selected>Seleccione</option>
                                    <option value="male">Masculino</option>
                                    <option value="female">Femenino</option>
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
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="person_email">Correo
                                    electrónico</label>
                                <input id="person_email" placeholder="Ingrese el correo electrónico del paciente"
                                    type="email" name="person_email" required value="{{ old('person_email') }}"
                                    class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                            </div>
                        </div>
                        <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="phone">Teléfono</label>
                                <input id="phone" placeholder="Ingrese el número de teléfono del paciente"
                                    type="text" name="phone" required value="{{ old('phone') }}"
                                    class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                            </div>
                        </div>
                        <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="address">Dirección</label>
                                <input id="address" placeholder="Ingrese la dirección del paciente" type="text"
                                    name="address" required value="{{ old('address') }}"
                                    class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                            </div>
                        </div>
                        <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="city_id">Ciudad
                                    de
                                    residencia</label>
                                <select id="city_id" name="city_id" required
                                    class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                                    <option value="" disabled selected>Seleccione la ciudad
                                    </option>
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->id }}">{{ $city->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>
                    <hr
                    class="h-px mx-0 my-4 bg-transparent border-0 opacity-25 bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent " />
                
                    <p class="leading-normal uppercase dark:text-white dark:opacity-60 text-sm">Información de usuario</p>
                

                    <div class="flex flex-wrap -mx-3">

                        <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="user_name">Nombre de
                                    usuario</label>
                                <input id="user_name" placeholder="Ingrese el nombre del paciente" type="text" name="user_name" required
                                    value="{{ old('user_name') }}"
                                    class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                            </div>
                        </div>
                        <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="user_email">Correo
                                    electrónico</label>
                                <input id="user_email" placeholder="Ingrese el correo electrónico del paciente" type="email"
                                    name="user_email" required value="{{ old('user_email') }}"
                                    class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                            </div>
                        </div>
                    
                        <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">Contraseña</label>
                                <input id="password" type="password" name="password" required value="{{ old('password') }}"
                                    {{-- value="{{old('password',Str::password(8))}}" --}}
                                    class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                            </div>
                        </div>
                        <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="address">Confirmar
                                    contraseña</label>
                                <input id="password_confirmation" type="password" name="password_confirmation" required
                                    value="{{ old('Confirm Password') }}" autocomplete="new-password"
                                    class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                            </div>
                        </div>
                    
                    
                    </div>

                    <hr
                        class="h-px mx-0 my-4 bg-transparent border-0 opacity-25 bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent " />

                    <div class="relative flex min-w-0 mb-6 items-center justify-end">

                        <button type="submit"
                            class="inline-block px-4 py-2  ml-auto font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-lime-500 border-0 rounded-lg shadow-md cursor-pointer text-md tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">Crear
                            paciente</button>
                    </div>
                    
                </form>  

        </div>
    </div>

@endsection
