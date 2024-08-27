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
                                <h5>Crea tú cuenta de paciente</h5>
                            </div>

                            <div class="flex-auto p-6">
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf

                                    {{-- <!--First Name -->
                                    <div>
                                        <div class="mb-4">
                                            <x-input-label for="first_name" :value="__('Nombre')" />
                                            <div class="relative">
                                                <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                                                    <i class="fas fa-user text-gray-300"></i>
                                                </span>
                                            <x-text-input class="placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 ease block w-full pl-9 appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow"
                                             id="first_name" type="text" placeholder="Ingresa tu nombre"
                                                name="first_name" :value="old('first_name')" required autofocus
                                                autocomplete="first_name" />
                                            </div>
                                            <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
                                        </div>
                                    <!--Last Name -->
                                    <div>
                                        <div class="mb-4">
                                            <x-input-label for="last_name" :value="__('Apellido')" />
                                            <div class="relative">
                                                <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                                                    <i class="fas fa-user text-gray-300"></i>
                                                </span>
                                            <x-text-input class="placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 ease block w-full pl-9 appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow"
                                             id="last_name" type="text" placeholder="Ingresa tu apellido"
                                                name="last_name" :value="old('last_name')" required autofocus
                                                autocomplete="last_name" />
                                            </div>
                                            <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
                                        </div> --}}

                                        <!-- Email Address -->
                                        <div class="mb-4">
                                            <x-input-label for="email" :value="__('Correo')" />
                                            <div class="relative">
                                                <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                                                    <i class="fas fa-envelope text-gray-300"></i>
                                                </span>
                                                <x-text-input
                                                    class="placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 ease block w-full pl-9 appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow"
                                                    id="email" placeholder="Ingresa tu correo electrónico"
                                                    aria-label="Email" aria-describedby="email-addon" type="email"
                                                    name="email" :value="old('email')" required autofocus
                                                    autocomplete="username" />
                                            </div>
                                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                        </div>

                                        <!-- Password -->
                                        <div class="mt-4">
                                            <x-input-label for="password" :value="__('Contraseña')" />
                                            <div class="relative">
                                                <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                                                    <i class="fas fa-lock text-gray-300"></i>
                                                </span>
                                                <x-text-input id="password"
                                                    class="placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 ease block w-full pl-9 appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow"
                                                    placeholder="Ingresa tu contraseña" aria-label="Password"
                                                    aria-describedby="password-addon" type="password" name="password"
                                                    required autocomplete="new-password" />
                                            </div>
                                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                        </div>
                                        <!-- Confirm Password -->
                                        <div class="mt-4">
                                            <x-input-label for="password_confirmation" :value="__('Confirmar contraseña')" />
                                            <div class="relative">
                                                <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                                                    <i class="fas fa-lock text-gray-300"></i>
                                                </span>
                                                <x-text-input id="password_confirmation"
                                                    class="placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 ease block w-full pl-9 appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow"
                                                    placeholder="Confirma tu contraseña" aria-label="Password"
                                                    aria-describedby="password-addon" type="password" name="password_confirmation"
                                                    required autocomplete="new-password" />
                                            </div>
                                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                        </div>

                                       
                                        

                                        <div class="flex items-center justify-end mt-4">


                                            <x-primary-button
                                                class="inline-block px-5 py-2.5 mt-6 mb-2 font-bold text-center text-white align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer active:opacity-85 hover:-translate-y-px hover:shadow-xs leading-normal text-sm ease-in tracking-tight-rem shadow-md bg-150 bg-x-25 bg-gradient-to-tl from-zinc-800 to-zinc-700 hover:border-slate-700 hover:bg-slate-700 hover:text-white">
                                                {{ __('Siguiente') }}
                                            </x-primary-button>

                                        </div>

                                        <div >
                                            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                                                {{ __('Ya estas registrado?') }}
                                            </a>
                                
                                            
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
<!-- plugin for charts  -->
@vite('resources/js/plugins/chartjs.min.js')
<!-- plugin for scrollbar  -->
@vite('resources/js/plugins/perfect-scrollbar.min.js')
<!-- main script file  -->
@vite('resources/js/argon-dashboard-tailwind.js')


</html>
