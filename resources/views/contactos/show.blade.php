@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center text-primary fw-bold">Detalle del Contacto</h1>

    <div class="card shadow-sm p-4">
        <div class="row">
            <div class="col-md-4">
                @if ($contacto->foto)
                    <img src="{{ asset('storage/' . $contacto->foto) }}" alt="Foto de {{ $contacto->nombre }}" class="img-fluid rounded">
                @else
                    <img src="https://via.placeholder.com/200x200.png?text=Sin+Foto" class="img-fluid rounded" alt="Sin foto">
                @endif
            </div>
            <div class="col-md-8">
                <h4>{{ $contacto->nombre }}</h4>
                <p><strong>Correo:</strong> {{ $contacto->correo_electronico }}</p>
                <p><strong>Teléfono:</strong> {{ $contacto->telefono }}</p>
                <p><strong>Nota:</strong> {{ $contacto->nota ?? 'Sin nota' }}</p>
                <p><strong>Categoría:</strong> {{ $contacto->categoria->nombre ?? 'Sin categoría' }}</p>
                <p><strong>Creado:</strong> {{ $contacto->created_at->format('d/m/Y H:i') }}</p>
                <a href="{{ route('contactos.index') }}" class="btn btn-outline-secondary mt-3">Volver</a>
            </div>
        </div>
    </div>
</div>
@endsection
