@extends('layouts.app')
@section('page-title')
    Asignar consultorios
@endsection
@section('content')
    <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3">
            <div
                class="px-3 relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                <div class="flex items-center p-4 px-3  border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                    <h6 class="dark:text-white mb-0">Asignar consultorios</h6>
                    <a href="{{ url('/assignOffices') }}"
                        class="inline-block px-2.5  py-1  ml-auto font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-red-500 border-0 rounded-lg shadow-md cursor-pointer text-sm tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85"">Regresar</a>
                </div>
            </div>

            <div>
                <form action="{{ route('assignOffices.store') }}" method="POST"
                    class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border p-6">
                    @csrf
                    <div class="mb-4">
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="relative p-2 my-1 text-white bg-red-500 rounded-lg">{{ $error }}</div>
                            @endforeach
                        @endif

                        <p class="leading-normal uppercase dark:text-white dark:opacity-60 text-sm">Consultorios - Médicos
                        </p>
                    </div>
                    <div class="flex flex-wrap -mx-3">
                        <div class="w-full max-w-full px-3 shrink-0 md:w-4/12 md:flex-0">
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2"
                                    for="office_id">Consultorios</label>
                                <select id="office_id" name="office_id" required
                                    class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                                    <option value="" disabled selected>Seleccione un consultorio</option>
                                    @foreach ($offices as $office)
                                        <option value="{{ $office->id }}">{{ $office->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- Segundo Selector: Personas -->
                        <div class="w-full max-w-full px-3 shrink-0 md:w-4/12 md:flex-0">
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="person_id">Médicos</label>
                                <select id="personSelect" name="user_id" required
                                    class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                                    <option value="" disabled selected>Seleccione un médico</option>
                                    @foreach ($doctors as $doctor)
                                        <option value="{{ $doctor->id }}">
                                            {{ $doctor->person->first_name }}
                                            {{ $doctor->person->last_name }}
                                            {{-- {{ $doctor }}</option> --}}
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="w-full max-w-full px-3 shrink-0 md:w-4/12 md:flex-0">
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2"
                                    for="specialty_id">Especialidad</label>
                                <select id="specialtySelect" name="specialty_id" required
                                    class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                                    <option value="" disabled selected>Seleccione una especialidad</option>
                                    @foreach ($specialties as $specialty)
                                        <option value="{{ $specialty->id }}">{{ $specialty->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <hr
                        class="h-px mx-0 my-4 bg-transparent border-0 opacity-25 bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent " />

                        <div class="flex justify-end ">
                            <button type="submit"
                                class="inline-block px-4 py-2  ml-auto font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-lime-500 border-0 rounded-lg shadow-md cursor-pointer text-md tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">Asignar consultorios</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        document.getElementById('personSelect').addEventListener('change', function() {
            var personId = this.value;

            // Hacer fetch a la API para obtener las especialidades del médico seleccionado
            fetch(`/api/users/${personId}/specialties`)
                .then(response => response.json())
                .then(data => {
                    // Referencia al <select> de especialidades
                    var specialtySelect = document.getElementById('specialtySelect');

                    // Limpiar las opciones actuales de especialidades
                    specialtySelect.innerHTML =
                        '<option value="" selected disabled>Especialidades del médico</option>';

                    // Rellenar el <select> con las especialidades del médico
                    data.forEach(specialty => {
                        var option = document.createElement('option');
                        option.value = specialty.id;
                        option.textContent = specialty
                            .name; // Asumiendo que cada especialidad tiene un campo 'name'
                        specialtySelect.appendChild(option);
                    });
                })
                .catch(error => {
                    console.error('Error fetching specialties:', error);
                });
        });
    </script>
@endsection
