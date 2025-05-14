@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center text-primary fw-bold">Detalles de la Notificación</h1>
    
    <div class="card shadow-sm p-4">
        <h4 class="text-primary">{{ $notificacion->titulo }}</h4>
        <p><strong>Mensaje:</strong> {{ $notificacion->mensaje }}</p>
        <p><strong>Fecha:</strong> {{ $notificacion->created_at->format('d/m/Y H:i') }}</p>

        <div class="text-center mt-3">
            <a href="{{ route('contactos.index') }}" class="btn btn-outline-secondary">Volver</a>
        </div>
    </div>
</div>
@endsection
