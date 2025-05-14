@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card p-4 shadow-sm">
                <h2 class="text-center text-primary fw-bold">✏️ Editar Categoría</h2>
                <form action="{{ route('categorias.update', $categoria->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="nombre" class="form-label fw-bold">Nombre</label>
                        <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $categoria->nombre }}" required>
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('categorias.index') }}" class="btn btn-secondary btn-custom">Cancelar</a>
                        <button type="submit" class="btn btn-success btn-custom">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    .btn-custom {
        border-radius: 10px;
        font-weight: bold;
    }

    .card {
        background: #f8f9fa;
        border-radius: 15px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .btn-success {
        background-color: #6c63ff;
        border: none;
    }

    .btn-success:hover {
        background-color: #574bff;
    }
</style>
@endsection
