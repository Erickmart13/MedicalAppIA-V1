@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h2 class="text-2xl font-bold mb-4">Detalles de la Emergencia</h2>

    <div class="bg-white p-4 rounded-md shadow-md">
        <p><strong>ID del Usuario:</strong> {{ $emergency->user_id }}</p>
        <p><strong>Frecuencia Cardíaca:</strong> {{ $emergency->heart_rate }}</p>
        <p><strong>Frecuencia Respiratoria:</strong> {{ $emergency->respiratory_rate }}</p>
        <p><strong>Presión Arterial:</strong> {{ $emergency->blood_pressure }}</p>
        <p><strong>Temperatura:</strong> {{ $emergency->temperature }}</p>
        <p><strong>Saturación de Oxígeno:</strong> {{ $emergency->oxygen_saturation }}</p>
        <p><strong>Gravedad:</strong> {{ $emergency->severity }}</p>
    </div>

    <div class="mt-4">
        <a href="{{ route('emergencies.edit', $emergency->id) }}" class="px-4 py-2 bg-yellow-500 text-white rounded-md hover:bg-yellow-600">Editar</a>
        <form action="{{ route('emergencies.destroy', $emergency->id) }}" method="POST" class="inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600">Eliminar</button>
        </form>
        <a href="{{ route('emergencies.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600">Volver</a>
    </div>
</div>
@endsection
