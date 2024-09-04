@extends('layouts.app')

@section('content')
    <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3">
            <div
                class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">

                <div class="flex items-center p-4  border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                    <h6 class="dark:text-white">Nuevo horario</h6>
                    <a href="{{ url('/scheduleAssignments') }}"
                        class="bg-red-500 from-emerald-500 to-teal-400 px-2.5 text-sm rounded-1.8 py-1.4 inline-block whitespace-nowrap text-center align-baseline font-bold leading-none text-white ml-auto">Regresar</a>
                </div>
            </div>
            <div>
                <form action="{{ route('scheduleAssignments.store') }}" method="POST"
                    class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border p-6">
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


                        <div class="w-full max-w-full px-3 shrink-0 md:w-2/12 md:flex-0">
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="roles">Roles</label>
                                <select id="roleSelect" name="roles" required
                                    class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                                    <option value="" disabled selected>Seleccione rol</option>
                                    @foreach ($roles as $rol)
                                        <option value="{{ $rol->id }}">{{ $rol->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Segundo Selector: Usuarios -->
                        <div class="w-full max-w-full px-3 shrink-0 md:w-4/12 md:flex-0">
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="userSelect">Personas</label>
                                <select id="userSelect" name="user_id" required
                                    class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                                    <option value="" disabled selected>Seleccione persona</option>
                                </select>
                            </div>
                        </div>
                        <div class="w-full max-w-full px-3 shrink-0 md:w-4/12 md:flex-0">
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="schedule_id">Seleccione el
                                    horario</label>
                                <select id="schedule_id" name="schedule_id" required
                                    class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                                    <option value="" disabled selected>Seleccione el horario</option>
                                    @foreach ($schedule as $schedule)
                                        <option value="{{ $schedule->id }}">{{ $schedule->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="w-full max-w-full px-3 shrink-0 md:w-2/12 md:flex-0">
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="active">Estado</label>
                                <select required value="{{ old('active') }}" id="active" name="active"
                                    class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                                    required>
                                    <option value="" disabled selected>Estado</option>
                                    <option value="1">Activa</option>
                                    <option value="0">Inactiva</option>
                                </select>
                            </div>
                        </div>



                    </div>
                    <hr
                        class="h-px mx-0 my-4 bg-transparent border-0 opacity-25 bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent " />

                    <div class="relative flex min-w-0 mb-6 items-center justify-end">
                        <button type="submit"
                            class="text-sm bg-lime-500 hover:bg-gray-700 text-white font-bold py-1 px-3 rounded-1.8 focus:outline-none focus:shadow-outline ml-4">Asignar
                            horario</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
       document.getElementById('roleSelect').addEventListener('change', function() {
    let roleId = this.value;
    console.log('Selected Role ID:', roleId);

    fetch(`/api/roles/${roleId}/users`)
        .then(response => {
            if (!response.ok) {
                console.error('Network response was not ok', response);
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            console.log('Data received:', data);
            let usersSelect = document.getElementById('userSelect');
            usersSelect.innerHTML = ''; // Limpiar opciones anteriores
            
            // Verificar que data es un array y tiene elementos
            if (Array.isArray(data) && data.length > 0) {
                data.forEach(user => {
                    console.log('Adding user:', user.first_name, user.last_name);
                    let option = document.createElement('option');
                    option.value = user.id;
                    option.textContent = `${user.first_name || 'N/A'} ${user.last_name || 'N/A'}`; // Mostrar nombre y apellido
                    usersSelect.appendChild(option);
                });
            } else {
                console.warn('No users found for this role.');
            }
        })
        .catch(error => console.error('Error en la solicitud:', error));
});

    </script>
@endsection
