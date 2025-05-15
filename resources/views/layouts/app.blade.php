<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda de Contactos</title>
    
    <!-- Bootstrap 5 + Iconos -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">

    <style>
        /* Diseño del navbar */
        .navbar {
            background: linear-gradient(135deg, #007bff, #6610f2);
            padding: 15px;
        }

        .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
            color: white !important;
        }

        /* Botón de Notificaciones */
        .dropdown-menu {
            min-width: 300px;
            max-height: 300px;
            overflow-y: auto;
        }

        /* Tarjetas modernas para contactos */
        .card-contacto {
            border-radius: 15px;
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .card-contacto:hover {
            transform: scale(1.05);
            box-shadow: 0px 6px 20px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="{{ route('contactos.index') }}">
            📒 Agenda de Contactos
        </a>

        <!-- Botones alineados a la derecha -->
        <ul class="navbar-nav ms-auto align-items-center">
            <!-- Notificaciones -->
            <li class="nav-item dropdown me-2">
                <a id="notificacionesDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    🔔 Notificaciones 
                    <span id="contador-notificaciones" class="badge bg-danger" style="display: none;">0</span>
                </a>

                <div class="dropdown-menu dropdown-menu-end p-2" aria-labelledby="notificacionesDropdown">
                    <div id="notificaciones-lista">
                        <a class="dropdown-item text-muted">Cargando notificaciones...</a>
                    </div>
                </div>
            </li>

            <!-- Botón Cerrar -->
            <li class="nav-item">
                <a href="{{ url('/') }}" class="btn btn-outline-light">
                    <i class="fas fa-sign-out-alt"></i> Cerrar
                </a>
            </li>
        </ul>
    </div>
</nav>


    <div class="container mt-4">
        @yield('content')
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            fetch('/notificaciones')
                .then(response => response.json())
                .then(data => {
                    let lista = document.getElementById('notificaciones-lista');
                    let countBadge = document.getElementById('notificaciones-count');
                    
                    lista.innerHTML = '';
                    
                    if (data.length === 0) {
                        lista.innerHTML = '<a class="dropdown-item text-muted">No hay notificaciones</a>';
                        countBadge.textContent = "0";
                    } else {
                        countBadge.textContent = data.length;
                        data.forEach((notificacion, index) => {
                            let item = `
                                <a class="dropdown-item" href="/contactos/${notificacion.id}">
                                    <strong>${notificacion.titulo}</strong><br> 📅 ${notificacion.fecha}
                                </a>`;
                            lista.innerHTML += item;

                            // Agregar un divisor si no es la última notificación
                            if (index < data.length - 1) {
                                lista.innerHTML += `<div class="dropdown-divider"></div>`;
                            }
                        });
                    }
                })
                .catch(error => {
                    console.error('Error obteniendo notificaciones:', error);
                    document.getElementById('notificaciones-lista').innerHTML = '<a class="dropdown-item text-danger">Error cargando notificaciones</a>';
                });
        });
    </script>
    <script>
function actualizarContadorNotificaciones() {
    fetch('/notificaciones')
        .then(response => response.json())
        .then(data => {
            const lista = document.getElementById('notificaciones-lista');
            const badge = document.getElementById('contador-notificaciones');

            lista.innerHTML = '';

            if (data.length === 0) {
                lista.innerHTML = '<a class="dropdown-item text-muted">No hay notificaciones</a>';
                badge.textContent = '0';
                badge.style.display = 'none';
            } else {
                badge.textContent = data.length;
                badge.style.display = 'inline-block';

                data.forEach((notificacion, index) => {
                    const fechaFormateada = new Date(notificacion.created_at).toLocaleString('es-ES');
                    lista.innerHTML += `
                        <a class="dropdown-item" href="/notificaciones/${notificacion.id}">
                            <strong>${notificacion.titulo}</strong><br>
                            🕒 ${fechaFormateada}
                        </a>
                    `;
                    if (index < data.length - 1) {
                        lista.innerHTML += '<div class="dropdown-divider"></div>';
                    }
                });
            }
        })
        .catch(error => {
            console.error('Error obteniendo notificaciones:', error);
            document.getElementById('notificaciones-lista').innerHTML = '<a class="dropdown-item text-danger">Error cargando notificaciones</a>';
        });
}

document.addEventListener('DOMContentLoaded', actualizarContadorNotificaciones);
</script>

</body>
</html>
