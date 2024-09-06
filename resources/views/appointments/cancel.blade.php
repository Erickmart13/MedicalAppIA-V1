@extends('layouts.app')

@section('content')

<div class="flex flex-wrap -mx-3">
    <div class="flex-none w-full max-w-full px-3">
        <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-lg bg-clip-border">
            <div class="flex items-center p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                <h6 class="dark:text-white">Cancelar cita</h6>
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
                

                <!-- Tab Contents -->
                <div class=" ">
                    <p>Se cancelará tú cita médica reservada con el médico<b>{{$appointment}}</b> (especialidad <b>{{$appointment}}</b>) para el día <b>{{$appointment}}</b></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
