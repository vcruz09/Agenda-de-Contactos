<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>

    <!-- Bootstrap + FontAwesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, rgb(65, 140, 220), #6610f2);
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
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100 text-center">
        <div class="welcome-box p-5 rounded shadow-lg">
            <h1 class="fw-bold mb-4">📒 Bienvenido a la Agenda de Contactos</h1>
            <p class="lead text-light">Administra y organiza tus contactos de manera fácil y rápida.</p>
            <a href="{{ route('contactos.index') }}" class="btn btn-lg btn-primary btn-glow mt-4">
                <i class="fas fa-address-book"></i> Ver Contactos
            </a>
        </div>
    </div>
</body>
</html>
