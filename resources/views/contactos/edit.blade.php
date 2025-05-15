@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center text-primary mb-4 fw-bold">✏️ Editar Contacto</h1>

    <div class="card p-4 shadow-sm">
        <form action="{{ route('contactos.update', $contacto->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label fw-bold">Nombre</label>
                <input type="text" name="nombre" value="{{ $contacto->nombre }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Correo Electrónico</label>
                <input type="email" name="correo_electronico" value="{{ $contacto->correo_electronico }}" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Teléfono</label>
                <input type="text" name="telefono" value="{{ $contacto->telefono }}" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Categoría</label>
                <select name="categoria_id" class="form-select">
                    <option value="">Sin Categoría</option>
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id }}" {{ $contacto->categoria_id == $categoria->id ? 'selected' : '' }}>
                            {{ $categoria->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Foto</label>
                <input type="file" name="foto" class="form-control">
                @if($contacto->foto)
                    <img src="{{ asset('storage/'.$contacto->foto) }}" class="mt-2 rounded" width="80">
                @endif
            </div>

            <button type="submit" class="btn btn-warning w-100 fw-bold">
                <i class="fas fa-edit"></i> Actualizar Contacto
            </button>

            <a href="{{ route('contactos.index') }}" class="btn btn-secondary w-100 fw-bold mt-2">
            Cancelar
            </a>

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
