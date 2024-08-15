<aside
    class="fixed inset-y-0 flex-wrap items-center justify-between block w-full p-0 my-4 overflow-y-auto antialiased transition-transform duration-200 -translate-x-full bg-white border-0 shadow-xl dark:shadow-none dark:bg-slate-850 max-w-64 ease-nav-brand z-990 xl:ml-6 rounded-2xl xl:left-0 xl:translate-x-0"
    aria-expanded="false">
    <div class="h-19">
        <i class="absolute top-0 right-0 p-4 opacity-50 cursor-pointer fas fa-times dark:text-white text-slate-400 xl:hidden"
            sidenav-close></i>
        <a class="block px-8 py-6 m-0 text-sm whitespace-nowrap dark:text-white text-slate-700"
            href="https://demos.creative-tim.com/argon-dashboard-tailwind/pages/dashboard.html" target="_blank">
            <img src="{{ asset('img/logo-ia.png') }}"
                class="inline h-full max-w-full transition-all duration-200 dark:hidden ease-nav-brand max-h-8"
                alt="main_logo" />

            <span class="ml-1 font-semibold transition-all duration-200 ease-nav-brand">MedicalApp Isidro Ayora</span>
        </a>
    </div>


    <div class="items-center block w-auto max-h-screen overflow-auto h-sidenav grow basis-full">
        <ul class="flex flex-col pl-0 mb-0">
            
            

            @if ((auth()->user()->role == 'admin'))
            <li class="w-full mt-4">
                <h6
                    class="text-blue-700 pl-6 ml-2 text-sm font-bold leading-tight uppercase dark:text-white opacity-90">
                    Estadísticas
                </h6>
            </li>
            <hr
                class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent" />
            <li class="mt-0.5 w-full">
                <a class="py-2.7 bg-blue-500/13 dark:text-white dark:opacity-80 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold text-slate-700 transition-colors"
                    href="../pages/dashboard.html">
                    <div
                        class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <i class="fas fa-chart-line text-red-500"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Dashboard</span>
                </a>
            </li>
            @endif

            <li class="w-full mt-4">
                @if (auth()->user()->role == 'admin')
                    <h6
                        class="text-blue-700 pl-6 ml-2 text-sm font-bold leading-tight uppercase dark:text-white opacity-90">
                        GESTIÓN</h6>
                @else
                    <h6
                        class="text-blue-700 pl-6 ml-2 text-sm font-bold leading-tight uppercase dark:text-white opacity-90">
                        MENÚ</h6>
                @endif
            
            <hr
                class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent" />
            </li>

            @if (auth()->user()->role == '')
                

                
                {{-- <li class="w-full mt-4">
                    <h6
                        class="text-blue-700 pl-6 ml-2 text-sm font-bold leading-tight uppercase dark:text-white opacity-90">
                        GESTIÓN</h6>
                </li>
                <hr
                    class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent" /> --}}

                <li class="mt-0.5 w-full">
                    <a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
                        href="/reservarcitas/create">
                        <div
                            class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                            <i class="relative top-0 text-sm leading-normal text-orange-500 far fa-calendar-alt"></i>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Citas</span>
                    </a>
                </li>
                <li class="mt-0.5 w-full">
                    <a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
                        href="/miscitas">
                        <div
                            class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                            <i class="relative top-0 text-sm leading-normal text-purple-500 far fa-calendar-check"></i>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Citas agendadas</span>
                    </a>
                </li>

                <li class="mt-0.5 w-full">
                    <a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
                        href="{{ url('/medicos') }}">
                        <div
                            class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center fill-current stroke-0 text-center xl:p-2.5">
                            <i class="fas fa-stethoscope text-blue-500"></i>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Médicos</span>
                    </a>
                </li>

                <li class="mt-0.5 w-full">
                    <a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
                        href="{{ url('/consultorios') }}">
                        <div
                            class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center fill-current stroke-0 text-center xl:p-2.5">
                            <i class="fas fa-clinic-medical text-yellow-500"></i>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Consultorios</span>
                    </a>
                </li>
                <li class="mt-0.5 w-full">
                    <a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
                        href="{{ url('/asignarConsultorios') }}">
                        <div
                            class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center fill-current stroke-0 text-center xl:p-2.5">
                            <i class="fas fa-door-open text-blue-500"></i>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Asignar consultorios</span>
                    </a>
                </li>

                <li class="mt-0.5 w-full">
                    <a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
                        href={{ url('/horarios') }}>
                        <div
                            class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                            <i class="far fa-clock text-fuchsia-500"></i>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Horarios</span></span>
                    </a>
                </li>
                <li class="mt-0.5 w-full">
                    <a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
                        href={{ url('/asignarHorarios') }}>
                        <div
                            class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                            <i class="far fa-calendar-plus text-gray-500"></i>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Asignar
                            horarios</span></span>
                    </a>
                </li>

                <li class="mt-0.5 w-full">
                    <a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
                        href={{ url('/especialidades') }}>
                        <div
                            class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                            <i class="fas fa-medkit text-purple-500"></i>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Especialidades</span>
                    </a>
                </li>

                <li class="mt-0.5 w-full">
                    <a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
                        href={{ url('/pacientes') }}>
                        <div
                            class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                            <i class="fas fa-bed text-green-400"></i>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Pacientes</span>
                    </a>
                </li>



                <li class="w-full mt-4">
                    <h6
                        class="text-blue-700 pl-6 ml-2 text-sm font-bold leading-tight uppercase dark:text-white opacity-90">
                        RPU</h6>
                </li>
                <hr
                    class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent" />
                <li class="mt-0.5 w-full">
                    <a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
                        href="/users/create">
                        <div
                            class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                            <i class="fas fa-user text-cyan-500 "></i>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Usuarios</span>
                    </a>
                </li>

                <li class="mt-0.5 w-full">
                    <a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
                        href="../pages/sign-in.html">
                        <div
                            class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                            <i class="fas fa-address-book text-neutral-900"></i>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Roles</span>


                    </a>


                </li>

                <li class="mt-0.5 w-full">
                    <a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
                        href="../pages/sign-in.html">
                        <div
                            class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                            <i class="fas fa-folder-minus text-yellow-500"></i>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Modulos</span>


                    </a>


                </li>
            @elseif (auth()->user()->role == 'doctor')
                <li class="mt-0.5 w-full">
                    <a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
                        href="/miscitas">
                        <div
                            class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                            <i class="relative top-0 text-sm leading-normal text-purple-500 far fa-calendar-check"></i>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Mis citas</span>
                    </a>
                </li>
                <li class="mt-0.5 w-full">
                    <a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
                        href={{ url('/asignarHorarios') }}>
                        <div
                            class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                            <i class="far fa-clock text-gray-500"></i>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Mis horarios</span></span>
                    </a>
                </li>
            @else
                <li class="mt-0.5 w-full">
                    <a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
                        href="/reservarcitas/create">
                        <div
                            class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                            <i class="relative top-0 text-sm leading-normal text-orange-500 far fa-calendar-alt"></i>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Reservar citas</span>
                    </a>
                </li>
                <li class="mt-0.5 w-full">
                    <a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
                        href="/miscitas">
                        <div
                            class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                            <i class="relative top-0 text-sm leading-normal text-purple-500 far fa-calendar-check"></i>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Mis citas</span>
                    </a>
                </li>
            @endif

            <hr
                class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent" />
            <li class="mt-0.5 w-full">
                <a class=" dark:text-white dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
                    href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('formLogout').submit();">
                    <div
                        class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <i class="fas fa-sign-out-alt text-red-500"></i>
                    </div>

                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Cerrar Sesión</span>
                    <form action="{{ route('logout') }}" method="POST" style="display: none;" id="formLogout">
                        @csrf
                    </form>

                </a>
            </li>
        </ul>
    </div>


</aside>
