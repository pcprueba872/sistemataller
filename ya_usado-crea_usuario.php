<?php
// crea_usuario.php
require 'includes/db.php';

$username = 'admin';
$email = 'admin@taller.com';
$password = password_hash('admin123', PASSWORD_DEFAULT);
$rol = 'admin';

$stmt = $pdo->prepare("INSERT INTO usuarios (username, email, password, rol) VALUES (?, ?, ?, ?)");
$stmt->execute([$username, $email, $password, $rol]);

echo "Usuario creado.";
?>
