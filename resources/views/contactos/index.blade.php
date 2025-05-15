@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center mb-4 text-primary fw-bold">📇 Lista de Contactos</h1>

    <div class="d-flex justify-content-between mb-4">
        <a href="{{ route('categorias.index') }}" class="btn btn-outline-info btn-custom">
            <i class="fas fa-tags"></i> Ver Categorías
        </a>
        <a href="{{ route('contactos.create') }}" class="btn btn-primary btn-custom">
            <i class="fas fa-user-plus"></i> Nuevo Contacto
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        @foreach($contactos as $contacto)
            <div class="col-md-4">
                <div class="card card-contacto mb-4 shadow-sm">
                    <div class="card-body text-center">
                        <a href="{{ route('contactos.show', $contacto->id) }}">
                            <img src="{{ asset($contacto->foto ? 'storage/'.$contacto->foto : 'images/default.png') }}" 
                                class="rounded-circle mb-3 border border-3 border-primary"
                                width="90" height="90" alt="Foto de {{ $contacto->nombre }}">
                        </a>
                        <h5 class="card-title fw-bold">{{ $contacto->nombre }}</h5>
                        <p class="text-muted">{{ $contacto->correo_electronico }}</p>
                        <p class="text-dark fw-semibold">{{ $contacto->telefono }}</p>
                        <span class="badge bg-info">{{ optional($contacto->categoria)->nombre ?? 'Sin categoría' }}</span>
                        
                        <div class="d-flex justify-content-center mt-3">
                            <a href="{{ route('contactos.edit', $contacto->id) }}" class="btn btn-warning btn-sm mx-1">
                                <i class="fas fa-edit"></i> Editar
                            </a>
                            <form action="{{ route('contactos.destroy', $contacto->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar este contacto?')">
                                    <i class="fas fa-trash"></i> Eliminar
                                </button>
                            </form>
                            <!-- Botón de WhatsApp con mensaje personalizado -->
<a href="#" class="btn btn-success btn-sm mx-1" onclick="enviarWhatsApp('{{ $contacto->telefono }}', '{{ $contacto->nombre }}')">
    <i class="fab fa-whatsapp"></i> WhatsApp
</a>

<script>
    function enviarWhatsApp(telefono, nombre) {
        let mensaje = prompt("Escribe el mensaje para " + nombre + ":");
        if (mensaje !== null) {
            let url = `https://wa.me/57${telefono}?text=${encodeURIComponent(mensaje)}`;
            window.open(url, '_blank');
        }
    }
</script>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<style>
    .card-contacto {
        background:rgb(196, 233, 255);
        border-radius: 12px;
        transition: 0.3s ease-in-out;
    }

    .card-contacto:hover {
        transform: scale(1.03);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    }

    .btn-custom {
        border-radius: 10px;
        font-weight: bold;
    }

    .btn-outline-info {
        border-color: #6c63ff;
        color: #6c63ff;
    }

    .btn-outline-info:hover {
        background-color: #6c63ff;
        color: white;
    }
</style>
@endsection
