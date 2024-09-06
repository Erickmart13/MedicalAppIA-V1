@extends('layouts.app')

@section('content')

<div class="flex flex-wrap -mx-3">
    <div class="flex-none w-full max-w-full px-3">
        <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-lg bg-clip-border">
            <div class="flex items-center p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                <h6 class="dark:text-white">Citas agendadas</h6>
            </div>
            <div>
                @if (session('notification'))
                <div class="relative mx-4 p-2 my-2 text-white rounded-lg bg-lime-500">
                    {{ session('notification') }}
                </div>
                @else
                @if (session('notificationDelete'))
                <div class="relative mx-4 p-2 my-2 text-white rounded-lg bg-red-500">
                    {{ session('notificationDelete') }}
                </div>
                @endif
                @endif
            </div>

            <div>
                <!-- Tab Links -->
                <div class="flex space-x-4 p-6 ">
                    <a href="#mis-citas" class="tab-link flex-1 border-b-2 border-transparent text-gray-500 py-2 px-4 hover:text-slate-700  focus:outline-none bg-gray-100 flex items-center justify-center" onclick="openTab(event, 'mis-citas')">
                        <i class="far fa-calendar-check mr-2"></i>Citas confirmadas
                    </a>
                    <a href="#citas-pendientes" class="tab-link flex-1 border-b-2 border-transparent text-gray-500 py-2 px-4 hover:text-slate-700  focus:outline-none bg-gray-100 flex items-center justify-center" onclick="openTab(event, 'citas-pendientes')">
                        <i class="far fa-bell mr-2"></i>Citas pendientes
                    </a>
                    <a href="#historial" class="tab-link flex-1 border-b-2 border-transparent text-gray-500 py-2 px-4 hover:text-slate-700 focus:outline-none bg-gray-100 flex items-center justify-center" onclick="openTab(event, 'historial')">
                        <i class="fas fa-clipboard-list mr-2"></i>Historial
                    </a>
                </div>

                <!-- Tab Contents -->
                <div class=" ">
                    <div id="mis-citas" class="tab-content bg-blue-100 p-4 rounded shadow">
                        @include('appointments.appointments-status.confirmed-appointments') 
                    </div>
                    <div id="citas-pendientes" class="tab-content bg-green-100 p-4 rounded shadow hidden">
                        @include('appointments.appointments-status.pending-appointments')
                    </div>
                    <div id="historial" class="tab-content bg-yellow-100 p-4 rounded shadow hidden">
                        @include('appointments.appointments-status.old-appointments')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
@section('scripts')
<script defer>
    document.addEventListener('DOMContentLoaded', () => {
        // Muestra por defecto la pestaña "mis-citas"
        const defaultTab = document.querySelector('.tab-link[href="#mis-citas"]');
        const defaultContent = document.getElementById('mis-citas');

        defaultContent.classList.remove('hidden');
        defaultTab.classList.remove('border-transparent', 'text-gray-500', 'bg-gray-100');
        defaultTab.classList.add('border-blue-500', 'text-white', 'bg-blue-500', 'rounded-lg');
    });

    function openTab(evt, tabName) {
        const tabContents = document.querySelectorAll('.tab-content');
        const tabLinks = document.querySelectorAll('.tab-link');

        // Oculta todos los contenidos de las pestañas
        tabContents.forEach(content => {
            content.classList.add('hidden');
        });

        // Restablece el estilo de todas las pestañas a no activas
        tabLinks.forEach(link => {
            link.classList.remove('border-blue-500', 'text-white', 'bg-blue-500');
            link.classList.add('border-transparent', 'text-gray-500', 'bg-gray-100');
        });

        // Muestra el contenido de la pestaña activa y ajusta su estilo
        document.getElementById(tabName).classList.remove('hidden');
        evt.currentTarget.classList.remove('border-transparent', 'text-gray-500', 'bg-gray-100');
        evt.currentTarget.classList.add('border-blue-500', 'text-white', 'bg-blue-500', 'rounded-lg');
    }
</script>
@endsection
