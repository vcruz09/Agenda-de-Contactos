@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center min-vh-100 text-center">
    <div class="welcome-box p-5 rounded shadow-lg">
        <h1 class="fw-bold mb-4">📒 Bienvenido a la Agenda de Contactos</h1>
        <p class="lead text-muted">Administra y organiza tus contactos de manera fácil y rápida.</p>

        <a href="{{ route('contactos.index') }}" class="btn btn-lg btn-primary btn-glow mt-4">
            <i class="fas fa-address-book"></i> Ver Contactos
        </a>
    </div>
</div>

<style>
    /* Fondo moderno con gradiente */
    body {
        background: linear-gradient(135deg,rgb(65, 140, 220), #6610f2);
        color: white;
    }

    .welcome-box {
        background: rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(10px);
        border-radius: 20px;
        max-width: 500px;
        text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2);
    }

    .btn-glow {
        transition: 0.3s;
        box-shadow: 0px 4px 10px rgba(255, 255, 255, 0.2);
        border-radius: 12px;
        padding: 15px 30px;
    }

    .btn-glow:hover {
        box-shadow: 0px 6px 20px rgba(255, 255, 255, 0.4);
        transform: translateY(-3px);
    }
</style>
@endsection
