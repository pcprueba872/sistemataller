<?php
$mensaje = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = htmlspecialchars(trim($_POST['nombre']));
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $telefono = htmlspecialchars(trim($_POST['telefono']));
    $mensajeTexto = htmlspecialchars(trim($_POST['mensaje']));

    if ($nombre && $email && $mensajeTexto) {
        // Aquí puedes usar mail() o guardar en base de datos
        // En este ejemplo solo mostramos mensaje de éxito
        $mensaje = "Gracias por tu mensaje, nos contactaremos pronto.";
    } else {
        $mensaje = "Por favor completá todos los campos correctamente.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Contacto - Taller de Reparaciones</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- 🟦 NAVBAR reducida -->
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm sticky-top">
    <div class="container">
        <a class="navbar-brand" href="index.php">Taller Reparaciones</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"><a class="nav-link" href="index.php">Inicio</a></li>
                <li class="nav-item"><a class="nav-link" href="comprobar_estado.php">Comprobar Estado</a></li>
                <li class="nav-item"><a class="nav-link active" href="contacto.php">Contacto</a></li>
            </ul>
            <a class="btn btn-outline-primary" href="login.php">Login</a>
        </div>
    </div>
</nav>

<!-- 🟦 CONTACTO -->
<div class="container py-5">
    <h2 class="mb-4">Contáctanos</h2>
    <?php if ($mensaje): ?>
        <div class="alert alert-info"><?= $mensaje ?></div>
    <?php endif; ?>
    <div class="row">
        <div class="col-md-6">
            <form method="POST">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" name="nombre" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Correo electrónico</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="telefono" class="form-label">Teléfono</label>
                    <input type="text" name="telefono" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="mensaje" class="form-label">Mensaje</label>
                    <textarea name="mensaje" class="form-control" rows="5" required></textarea>
                </div>
                <button class="btn btn-primary" type="submit">Enviar Mensaje</button>
            </form>
        </div>
        <div class="col-md-6">
            <h5 class="mt-3">📧 Correo electrónico</h5>
            <p>contacto@tallerreparaciones.com</p>

            <h5>📞 Teléfono</h5>
            <p>+54 9 11 2345 6789</p>

            <h5>📍 Ubicación</h5>
            <p>Av. Siempre Viva 123, Buenos Aires, Argentina</p>

            <!-- Opcional: Mapa incrustado -->
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!..."
                width="100%" height="250" style="border:0;" allowfullscreen loading="lazy">
            </iframe>
        </div>
    </div>
</div>

<!-- 🟦 FOOTER -->
<footer class="bg-dark text-white text-center py-3 mt-5">
    <div class="container">
        &copy; <?= date('Y') ?> Taller de Reparaciones.
    </div>
</footer>

</body>
</html>
