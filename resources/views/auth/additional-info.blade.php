<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('build/assets/img/apple-icon.png') }}" />
    <link rel="icon" type="image/png" href="{{ asset('build/assets/img/favicon.png') }}" />
    <title>Sistema Hospitalario Isidro Ayora</title>

    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />

    <!-- Font Awesome Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">

    <!--     Flatpickr     -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <!-- Main Styling -->
    @vite('resources/css/argon-dashboard-tailwind.css')
</head>

<body class="m-0 font-sans antialiased font-normal bg-white text-start text-base leading-default text-slate-500">
    <!-- Navbar -->
    <nav
        class="absolute top-0 z-30 flex flex-wrap items-center justify-between w-full px-4 py-2 mt-6 mb-4 shadow-none lg:flex-nowrap lg:justify-start">

        <div class="container flex items-center justify-between py-0 flex-wrap-inherit">
            <img src="{{ asset('/img/logo-ia.png') }}"
                class="inline h-full max-w-full transition-all duration-200 dark:hidden ease-nav-brand max-h-12 mr-4"
                alt="main_logo" />
            <a class="py-1.75 ml-4 mr-4 text-white text-xl whitespace-nowrap lg:ml-0" href="" target="_blank">
                Sistema Hospitalario Isidro Ayora
            </a>

            <div navbar-menu
                class="flex items-center flex-grow transition-all ease duration-350 lg-max:bg-white lg-max:max-h-0 lg-max:overflow-hidden basis-full rounded-2xl lg:flex lg:basis-auto">
                <ul class="flex flex-col pl-0 mb-0 list-none lg-max:py-2 lg:flex-row xl:ml-auto ml-auto">
                    <li>
                        <a class="block px-2 py-1 mr-2 font-normal text-white transition-all ease-in-out duration-250 lg-max:opacity-100 lg-max:text-slate-700 text-sm lg:px-2 lg:hover:text-white/75 whitespace-nowrap"
                            href="{{ route('login') }}">
                            <i class="mr-1 text-lime-500 lg-max:text-slate-700 fas fa-user-circle opacity-40"></i>
                            Iniciar Sesión
                        </a>
                    </li>
                    <li>
                        <a class="block px-2 py-1 mr-2 font-normal text-white transition-all ease-in-out duration-250 lg-max:opacity-100 lg-max:text-slate-700 text-sm lg:px-2 lg:hover:text-white/75 whitespace-nowrap"
                            href="{{ route('register') }}">
                            <i class="mr-1 text-lime-500 lg-max:text-slate-700 fas fa-key opacity-40"></i>
                            Registrarse
                        </a>
                    </li>
                </ul>
            </div>

        </div>
    </nav>


    <main class="mt-0 transition-all duration-200 ease-in-out">
        <section class="min-h-screen">
            <div
                class="bg-top relative flex items-start pt-12 pb-48 m-4 overflow-hidden bg-cover min-h-50-screen rounded-xl ]">
                <span class="absolute top-0 left-0 w-full h-full bg-center bg-cover bg-blue-panel"></span>
                <div class="container relative z-10">
                    <div class="flex flex-wrap justify-center -mx-3">
                        <div class="w-full max-w-full px-3 mx-auto mt-0 text-center lg:flex-0 shrink-0 lg:w-5/12">
                            <h3 class="font-normal mt-12 mb-2 text-white">Registrarse</h3>
                            <img src="{{ asset('img/logoLogin.png') }}"
                                class="inline h-full max-w-full transition-all duration-200 dark:hidden ease-nav-brand max-h-44"
                                alt="main_logo" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="flex flex-wrap -mx-3 -mt-48 md:-mt-56 lg:-mt-48">
                    <div class="w-full max-w-full px-3 mx-auto mt-0 md:flex-0 shrink-0 md:w-7/12 lg:w-5/12 xl:w-5/12">
                        <div
                            class="relative z-0 flex flex-col min-w-0 break-words bg-white border-0 shadow-xl rounded-2xl bg-clip-border">
                            <div class="p-6 mb-0 text-center bg-white border-b-0 rounded-t-2xl">
                                <h5>Ingresa tu información personal</h5>
                            </div>

                            <div class="flex-auto p-6">
                                <form method="POST" action="{{ route('additional-info.store') }}">
                                    @csrf
                                    <p class="leading-normal uppercase dark:text-white dark:opacity-60 text-sm">
                                        Información personal</p>

                                    <div class="flex flex-wrap -mx-3">

                                        <div class="w-full max-w-full px-3 shrink-0 md:w-12/12 md:flex-0">
                                            <div class="mb-4">
                                                <label class="block text-gray-700 text-sm font-bold mb-2"
                                                    for="first_name">Nombre</label>
                                                <input id="first_name" placeholder="Ingrese tu nombre" type="text"
                                                    name="first_name" required value="{{ old('first_name') }}"
                                                    class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                            </div>
                                        </div>
                                        <div class="w-full max-w-full px-3 shrink-0 md:w-12/12 md:flex-0">
                                            <div class="mb-4">
                                                <label class="block text-gray-700 text-sm font-bold mb-2"
                                                    for="last_name">Apellido</label>
                                                <input id="last_name" placeholder="Ingrese tu apellido" type="text"
                                                    name="last_name" required value="{{ old('last_name') }}"
                                                    class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                            </div>
                                        </div>


                                        <div class="w-full max-w-full px-3 shrink-0 md:w-12/12 md:flex-0">
                                            <div class="mb-4">
                                                <label class="block text-gray-700 text-sm font-bold mb-2"
                                                    for="cedula">Cédula</label>

                                                <input id="cedula" placeholder="Ingrese tu número de cédula"
                                                    type="text" name="cedula" required value="{{ old('cedula') }}"
                                                    class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                            </div>
                                        </div>


                                        <div class="w-full max-w-full px-3 shrink-0 md:w-5/12 md:flex-0">
                                            <div class="mb-4 relative">
                                                <label class="block text-gray-700 text-sm font-bold mb-2"
                                                    for="date_of_birth">Fecha de nacimiento</label>

                                                <input value="{{ old('date_of_birth') }}"
                                                    placeholder="Ingrese la fecha" type="text" id="date_of_birth"
                                                    name="date_of_birth"
                                                    class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full pl-10 appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                                                    required x-data x-init="flatpickr($el, { dateFormat: 'Y-m-d' })">
                                            </div>
                                        </div>

                                        <div class="w-full max-w-full px-3 shrink-0 md:w-3/12 md:flex-0">
                                            <div class="mb-4">
                                                <label class="block text-gray-700 text-sm font-bold mb-2"
                                                    for="age">Edad</label>

                                                <input id="age" placeholder="--" type="text" name="age"
                                                    required value="{{ old('age') }}"
                                                    class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                            </div>
                                        </div>

                                        <div class="w-full max-w-full px-3 shrink-0 md:w-4/12 md:flex-0">
                                            <div class="mb-4">
                                                <label class="block text-gray-700 text-sm font-bold mb-2"
                                                    for="gender">Género</label>
                                                <select required value="{{ old('gender') }}" id="gender"
                                                    name="gender"
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

                                    <p class="leading-normal uppercase dark:text-white dark:opacity-60 text-sm">
                                        Información de contacto</p>

                                    <div class="flex flex-wrap -mx-3">

                                        <div class="w-full max-w-full px-3 shrink-0 md:w-7/12 md:flex-0">
                                            <div class="mb-4">
                                                <label class="block text-gray-700 text-sm font-bold mb-2"
                                                    for="phone">Teléfono</label>
                                                <input id="phone" placeholder="Ingrese tu número de teléfono"
                                                    type="text" name="phone" required
                                                    value="{{ old('phone') }}"
                                                    class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                            </div>
                                        </div>
                                        <div class="w-full max-w-full px-3 shrink-0 md:w-5/12 md:flex-0">
                                            <div class="mb-4">
                                                <label class="block text-gray-700 text-sm font-bold mb-2"
                                                    for="city_id">Ciudad
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
                                        <div class="w-full max-w-full px-3 shrink-0 md:w-12/12 md:flex-0">
                                            <div class="mb-4">
                                                <label class="block text-gray-700 text-sm font-bold mb-2"
                                                    for="address">Dirección</label>
                                                <input id="address" placeholder="Ingrese la dirección del paciente"
                                                    type="text" name="address" required
                                                    value="{{ old('address') }}"
                                                    class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                            </div>
                                        </div>






                                    </div>
                                    <div class="flex items-center justify-end mt-4">


                                        <x-primary-button
                                            class="inline-block px-5 py-2.5 mt-6 mb-2 font-bold text-center text-white align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer active:opacity-85 hover:-translate-y-px hover:shadow-xs leading-normal text-sm ease-in tracking-tight-rem shadow-md bg-150 bg-x-25 bg-gradient-to-tl from-zinc-800 to-zinc-700 hover:border-slate-700 hover:bg-slate-700 hover:text-white">
                                            {{ __('Registrarse') }}
                                        </x-primary-button>
                                    </div>



                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
        <footer class="py-12">
            <div class="container">

                <div class="flex flex-wrap -mx-3">
                    <div class="w-8/12 max-w-full px-3 mx-auto mt-1 text-center flex-0">
                        <p class="mb-0 text-slate-400">
                            Copyright ©
                            <script>
                                document.write(new Date().getFullYear());
                            </script>
                            , Hecho por Erick Guayanay.
                        </p>
                    </div>
                </div>
            </div>
        </footer>
        <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
    </main>

</body>

<!-- plugin for flatpickr  -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/es.js"></script>
<!-- main script file  -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const dateOfBirthInput = document.getElementById('date_of_birth');
        const ageInput = document.getElementById('age');

        dateOfBirthInput.addEventListener('change', function() {
            const dob = new Date(dateOfBirthInput.value);
            const today = new Date();
            let age = today.getFullYear() - dob.getFullYear();
            const monthDifference = today.getMonth() - dob.getMonth();
            if (monthDifference < 0 || (monthDifference === 0 && today.getDate() < dob.getDate())) {
                age--;
            }
            ageInput.value = age;
        });
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/es.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        flatpickr("#date_of_birth", {
            locale: "es",
            dateFormat: "Y-m-d"
        });
    });
</script>




{{-- <!-- plugin for charts  -->
@vite('resources/js/plugins/chartjs.min.js')
<!-- plugin for scrollbar  -->
@vite('resources/js/plugins/perfect-scrollbar.min.js') --}}
<!-- main script file  -->
@vite('resources/js/argon-dashboard-tailwind.js')


</html>
