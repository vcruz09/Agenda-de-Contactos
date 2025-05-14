@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center text-primary mb-4 fw-bold">➕ Agregar Contacto</h1>

    <div class="card p-4 shadow-sm">
        <form action="{{ route('contactos.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label fw-bold">Nombre</label>
                <input type="text" name="nombre" class="form-control" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label fw-bold">Correo Electrónico</label>
                <input type="email" name="correo_electronico" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Teléfono</label>
                <input type="text" name="telefono" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Categoría</label>
                <select name="categoria_id" class="form-select">
                    <option value="">Sin Categoría</option>
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Nota</label>
                <input type="text" name="nota" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Foto</label>
                <input type="file" name="foto" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary w-100 fw-bold">
                <i class="fas fa-save"></i> Guardar Contacto
            </button>
        </form>
    </div>
</div>

<script>
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('preview');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
@endsection
