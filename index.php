<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Taller de Reparaciones</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome para íconos -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f4f6f9;
      color: #333;
    }
    .logo {
      max-height: 50px;
    }
    .nav-link {
      font-weight: 500;
    }
    .navbar {
      backdrop-filter: blur(8px);
    }
    .hero {
      background: linear-gradient(135deg, #1f2c4c, #3b4e70);
      color: #fff;
      padding: 100px 20px;
      text-align: center;
      border-bottom-left-radius: 30px;
      border-bottom-right-radius: 30px;
    }
    .hero h1 {
      font-size: 2.8rem;
    }
    .hero p {
      font-size: 1.2rem;
    }
    .btn-lg {
      padding: 12px 30px;
      font-size: 1.1rem;
      border-radius: 30px;
    }
    footer {
      background-color: #1f2c4c;
      color: #fff;
      padding: 20px 0;
    }
    .social-icons a {
      color: #fff;
      font-size: 1.2rem;
      margin: 0 10px;
      transition: color 0.3s;
    }
    .social-icons a:hover {
      color: #00d4ff;
    }
  </style>
</head>
<body>

<!-- 🟦 NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm sticky-top">
  <div class="container">
    <a class="navbar-brand" href="index.php">
      <img src="assets/images/logo.png" alt="Logo" class="logo me-2" onerror="this.src='https://cdn-icons-png.flaticon.com/512/1041/1041916.png';">
      Taller Reparaciones
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
            aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link" href="index.php">Inicio</a></li>
        <li class="nav-item"><a class="nav-link" href="comprobar_estado.php">Comprobar Estado</a></li>
        <li class="nav-item"><a class="nav-link" href="contacto.php">Contacto</a></li>
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="btn btn-outline-info rounded-pill" href="login.php">Login</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- 🟦 HERO SECTION -->
<section class="hero">
  <div class="container">
    <h1>Gestión de Reparaciones Tecnológicas</h1>
    <p>Consultá el estado de tu dispositivo o escribinos para más ayuda.</p>
    <a href="comprobar_estado.php" class="btn btn-light btn-lg mt-3">Comprobar Estado</a>
  </div>
</section>

<!-- 🟦 FOOTER -->
<footer class="text-center mt-5">
  <div class="container">
    <p>&copy; <?= date('Y') ?> Taller de Reparaciones. Todos los derechos reservados.</p>
    <div class="social-icons mt-2">
      <a href="#"><i class="fab fa-facebook-f"></i></a>
      <a href="#"><i class="fab fa-instagram"></i></a>
      <a href="#"><i class="fab fa-whatsapp"></i></a>
    </div>
  </div>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
