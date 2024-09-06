
@extends('layouts.app')
@section('page-title')
  Ver cita
@endsection
@section('content')


<div class="flex flex-wrap -mx-3">
    <div class="w-full max-w-full px-3 mt-6 md:w-12/12 md:flex-none">

      <div
      class="px-3 relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
      <div class="flex items-center p-4 px-3  border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
          <h6 class="dark:text-white mb-0">Información cita médica</h6>
          <a href="{{ url('/miscitas') }}"
              class="inline-block px-2.5  py-1  ml-auto font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-red-500 border-0 rounded-lg shadow-md cursor-pointer text-sm tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85"">Regresar</a>
      </div>
  </div>
      <div class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
       
        
        <div class="flex-auto p-4 pt-6">
          <ul class="flex flex-col pl-0 mb-0 rounded-lg">
           
            <li class="relative flex p-6 mb-2 border-0 rounded-t-inherit rounded-xl bg-gray-50 dark:bg-slate-850">
              <div class="flex flex-col">
               
                    
                
                <span class="mb-2 text-mb leading-tight dark:text-white/80">Paciente: <span class="font-semibold text-slate-700 dark:text-white sm:ml-2">{{$appointment->patient->first_name}} {{$appointment->patient->last_name}}</span></span>
                <span class="mb-2 text-mb leading-tight dark:text-white/80">Médico: <span class="font-semibold text-slate-700 dark:text-white sm:ml-2">{{$appointment->doctor->first_name}} {{$appointment->doctor->last_name}}</span></span>
                <span class="mb-2 text-mb leading-tight dark:text-white/80">Especialidad: <span class="font-semibold text-slate-700 dark:text-white sm:ml-2">{{$appointment->specialty->name}}</span></span>
                <span class="mb-2 text-mb leading-tight dark:text-white/80">Fecha: <span class="font-semibold text-slate-700 dark:text-white sm:ml-2">{{$appointment->date}}</span></span>
                <span class="mb-2 text-mb leading-tight dark:text-white/80">Hora: <span class="font-semibold text-slate-700 dark:text-white sm:ml-2">{{$appointment->hour}}</span></span>
                <span class="mb-2 text-mb leading-tight dark:text-white/80">Tipo: <span class="font-semibold text-slate-700 dark:text-white sm:ml-2">{{$appointment->list_radio}}</span></span>
                <span class="mb-2 text-mb leading-tight dark:text-white/80">Descripción: <span class="font-semibold text-slate-700 dark:text-white sm:ml-2">{{$appointment->description}}</span></span>
                
                @if ($appointment->status==('Cancelada'))
                <span class="mb-2 text-mb leading-tight dark:text-white/80">Estado: <span class="border rounded-1   border-red-500  bg-red-300   font-semibold text-black dark:text-white sm:ml-2">{{$appointment->status}}</span></span>
                @elseif ($appointment->status==('Reservada'))
                <span class="mb-2 text-mb leading-tight dark:text-white/80">Estado: <span class="border rounded-1   border-green-500  bg-green-300   font-semibold text-black dark:text-white sm:ml-2">{{$appointment->status}}</span></span>
                @elseif ($appointment->status==('Finalizada'))
                <span class="mb-2 text-mb leading-tight dark:text-white/80">Estado: <span class="border rounded-1   border-orange-500  bg-orange-300   font-semibold text-black dark:text-white sm:ml-2">{{$appointment->status}}</span></span>
                @else
                <span class="text-mb leading-tight dark:text-white/80">Estado: <span class="border rounded-1   border-blue-500  bg-blue-300   font-semibold text-black dark:text-white sm:ml-2">{{$appointment->status}}</span></span>
                @endif
                
                
                
            
            </div>
           
              
            </li>
           
          
          </ul>
        </div>
  
      </div>
    </div>
    
  </div>
  @endsection