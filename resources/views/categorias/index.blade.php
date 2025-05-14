@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center text-primary mb-4 fw-bold">🏷️ Categorías</h1>

    <div class="d-flex justify-content-between mb-4">
        <a href="{{ route('categorias.create') }}" class="btn btn-primary btn-custom">
            <i class="fas fa-plus-circle"></i> Nueva Categoría
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        @foreach($categorias as $categoria)
            <div class="col-md-4">
                <div class="card card-categoria mb-4 shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title fw-bold text-secondary">{{ $categoria->nombre }}</h5>

                        <div class="d-flex justify-content-center mt-3">
                            <a href="{{ route('categorias.edit', $categoria->id) }}" class="btn btn-warning btn-sm mx-1">
                                <i class="fas fa-edit"></i> Editar
                            </a>
                            <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar esta categoría?')">
                                    <i class="fas fa-trash"></i> Eliminar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<style>
    .card-categoria {
        background:rgb(196, 233, 255);
        border-radius: 12px;
        transition: 0.3s ease-in-out;
    }

    .card-categoria:hover {
        transform: scale(1.03);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    }

    .btn-custom {
        border-radius: 10px;
        font-weight: bold;
    }
</style>
@endsection
