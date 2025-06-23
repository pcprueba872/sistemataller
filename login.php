<?php
session_start();
require __DIR__ . '/includes/db.php';

//require 'includes/db.php';

$mensaje = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = trim($_POST['username']);
    $clave = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE username = :usuario OR email = :usuario");
    $stmt->execute(['usuario' => $usuario]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($clave, $user['password'])) {
        $_SESSION['usuario_id'] = $user['id'];
        $_SESSION['usuario_rol'] = $user['rol']; // 'admin' o 'staff'
        echo "<pre>";
print_r($user);
//echo "</pre>";
//echo "Password ingresado: " . $clave . "<br>";
//echo "¿Coincide?: " . (password_verify($clave, $user['password']) ? 'Sí' : 'No');
//exit;


        header("Location: dashboard/panel.php");
        exit;
    } else {
        $mensaje = "Usuario o contraseña incorrectos.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login - Taller Reparaciones</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow">
                <div class="card-body">
                    <h3 class="card-title mb-4 text-center">Iniciar Sesión</h3>

                    <?php if ($mensaje): ?>
                        <div class="alert alert-danger"><?= $mensaje ?></div>
                    <?php endif; ?>

                    <form method="POST">
                        <div class="mb-3">
                            <label for="username" class="form-label">Usuario o Email</label>
                            <input type="text" name="username" class="form-control" required autofocus>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <div class="d-grid">
                            <button class="btn btn-primary">Ingresar</button>
                        </div>
                    </form>
                </div>
            </div>
            <p class="text-center mt-3 text-muted">Taller de Reparaciones &copy; <?= date('Y') ?></p>
        </div>
    </div>
</div>
</body>
</html>
