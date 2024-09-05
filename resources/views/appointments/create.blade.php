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
                    <a href="{{ url('/bookAppointments/create') }}"
                        class="inline-block px-2.5  py-1  ml-auto font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-red-500 border-0 rounded-lg shadow-md cursor-pointer text-sm tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85"">Regresar</a>
                </div>
            </div>
            <div>
                <form action="{{ url('/bookAppointments') }}" method="POST"
                    class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border p-6">
                    @csrf
                    <div class="mb-4">
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="relative p-2 my-1 text-white bg-red-500 rounded-lg">{{ $error }}</div>
                            @endforeach
                        @endif
                        <p class="leading-normal  uppercase dark:text-white dark:opacity-60 text-sm">Información cita</p>
                    </div>
                    {{-- @if (auth()->user()->role == 'admin') --}}
                    <div class="flex flex-wrap -mx-3 ">
                        <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="patient">Paciente</label>
                                <select id="patientSelect" name="patient_id"
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
                    {{-- @endif --}}
                    <div class="flex flex-wrap -mx-3  ">
                        <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2"
                                    for="specialtySelect">Especialidad</label>
                                <select name="specialty_id" id="specialtySelect" required
                                    class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                                    <option value="{{ old('specialtySelect') }}" disabled selected>Seleccione una
                                        especialidad
                                    </option>
                                    @foreach ($specialties as $specialty)
                                        <option value="{{ $specialty->id }}"
                                            @if (old('specialty_id') == $specialty->id) selected @endif>{{ $specialty->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="personSelect">Médico</label>
                                <select id="personSelect" name="doctor_id" data-old-value="{{ old('doctor_id') }}"
                                    class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                                    required>
                                    <option value="" disabled {{ old('doctor_id') ? '' : 'selected' }}>Seleccione un
                                        médico</option>
                                    @foreach ($doctors as $doctor)
                                        <option value="{{ $doctor->id }}"
                                            {{ old('doctor_id') == $doctor->id ? 'selected' : '' }}>
                                            {{ $doctor->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="w-full px-3 max-w-full shrink-0 md:w-6/12 md:flex-0">
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
                        </div>
                        <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="hour">Hora</label>
                                <select required value="{{ old('hour') }}" id="hour" name="hour"
                                    class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"
                                    required>

                                </select>
                            </div>
                        </div>
                        <div class="w-full px-3 max-w-full shrink-0 md:w-4/12 md:flex-0">
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="hour">Tipo</label>
                                <div class="flex space-x-4 ">
                                    <div class="flex items-center px-4">
                                        <input id="list_radio_consulta" type="radio" name="list_radio"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500 "
                                            @if (old('list_radio') == 'Consulta') checked @endif value="Consulta">
                                        <label for="list_radio_consulta"
                                            class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Consulta</label>
                                    </div>
                                    <div class="flex items-center px-4">
                                        <input id="list_radio_cirugia" type="radio" name="list_radio"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                                            @if (old('list_radio') == 'Cirugia') checked @endif value="Cirugia">
                                        <label for="list_radio_cirugia"
                                            class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Cirugía</label>
                                    </div>
                                    <div class="flex items-center px-4">
                                        <input id="list_radio_laboratorio" type="radio" value="laboratorio"
                                            name="list_radio"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"
                                            @if (old('list_radio') == 'Laboratorio') checked @endif value="Laboratorio">
                                        <label for="list_radio_laboratorio"
                                            class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Laboratorio</label>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="w-full max-w-full px-3  shrink-0 md:w-12/12 md:flex-0">
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
                                    Síntomas
                                </label>
                                <textarea
                                    class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none""
                                    id="description" name="description" placeholder="Ingrese los síntomas">{{ Request::old('description') }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-end ">
                        <button type="submit"
                            class="inline-block px-4 py-2  ml-auto font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-lime-500 border-0 rounded-lg shadow-md cursor-pointer text-md tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">Agendar
                            cita</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        document.getElementById('specialtySelect').addEventListener('change', function() {
            var specialtyId = this.value;
            // Fetch users based on the selected specialty
            fetch(`/api/specialties/${specialtyId}/users`)
                .then(response => response.json())
                .then(data => {
                    var personSelect = document.getElementById('personSelect');
                    var oldValue = personSelect.getAttribute('data-old-value');
                    // Clear the personSelect before populating
                    personSelect.innerHTML = '<option value="" selected disabled>Seleccione un médico</option>';
                    // Populate the personSelect with the fetched doctors
                    data.forEach(user => {
                        var option = document.createElement('option');
                        option.value = user.user_id; // Use user.user_id instead of user.id
                        option.textContent = user.first_name + ' ' + user.last_name;

                        // If the old value matches, set it as selected
                        if (oldValue && oldValue == user
                            .user_id) { // Use user.user_id instead of user.id
                            option.selected = true;
                        }
                        personSelect.appendChild(option);
                    });
                    // Ensure the change event is only added once
                    personSelect.removeEventListener('change',
                        handlePersonSelectChange); // Remove previous handler
                    personSelect.addEventListener('change', handlePersonSelectChange); // Add new handler
                });
        });
        // Define the change event handler function
        function handlePersonSelectChange() {
            var selectedPersonId = this.value;
            console.log("Selected Person ID:", selectedPersonId); // Check if the doctor ID is correctly selected
        }
        document.getElementById('personSelect').addEventListener('change', function() {
            var personId = this.value;
            var selectedDate = document.getElementById('date').value;

            if (personId && personId !== 'undefined') { // Verifica que el valor no esté vacío o sea 'undefined'
                if (selectedDate) {
                    fetchSchedulesAndAppointments(personId, selectedDate);
                }
            } else {
                console.error('Person ID is undefined or not selected');
            }
        });
        document.getElementById('date').addEventListener('change', function() {
            var personId = document.getElementById('personSelect').value;
            var selectedDate = this.value;

            if (personId && personId !== 'undefined') { // Verifica que el valor no esté vacío o sea 'undefined'
                if (selectedDate) {
                    fetchSchedulesAndAppointments(personId, selectedDate);
                }
            } else {
                console.error('Person ID is undefined or not selected');
            }
        });

        function fetchSchedulesAndAppointments(personId, date) {
            fetch(`/api/users/${personId}/schedules?date=${date}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    window.scheduleData = data; // Save the fetched schedule data for later use
                    updateAvailableHours(); // Update the list of available hours based on the selected date
                })
                .catch(error => {
                    console.error('Error fetching schedules:', error);
                });
        }
        document.getElementById('hour').addEventListener('change', function() {
            window.selectedHour = this.value; // Store the selected hour
        });

        function updateAvailableHours() {
            var selectedDate = new Date(document.getElementById('date').value);
            var hourSelect = document.getElementById('hour');
            hourSelect.innerHTML = '<option value="" selected disabled>Seleccione una hora</option>';
            // Verify that the schedule data has been loaded
            if (window.scheduleData) {
                // Clear existing options
                hourSelect.innerHTML = '';

                // Flag to check if any interval was added
                let hasIntervals = false;

                window.scheduleData.forEach(schedule => {
                    schedule.days_times.forEach(dayTime => {
                        // Convert the day name to a number (0=Sunday, 1=Monday, ..., 6=Saturday)
                        var dayNumber = getDayNumber(dayTime.day.name);

                        if (selectedDate.getDay() === dayNumber) {
                            dayTime.time_intervals.forEach(interval => {
                                // Append the option if it is not already booked
                                var option = document.createElement('option');
                                option.value = `${interval.start_time}`;
                                option.textContent =
                                    `Inicio: ${interval.start_time}, Fin: ${interval.end_time}`;
                                hourSelect.appendChild(option);

                                // Set the flag to true indicating intervals were added
                                hasIntervals = true;
                            });
                        }
                    });
                });

                // If no intervals were added, show a message
                if (!hasIntervals) {
                    var option = document.createElement('option');
                    option.value = '';
                    option.textContent = 'No hay horarios disponibles';
                    option.disabled = true;
                    option.selected = true;
                    hourSelect.appendChild(option);
                }
            }

        }

        function getDayNumber(dayName) {
            const days = ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'];
            return days.indexOf(dayName);
        }
    </script>
@endsection
