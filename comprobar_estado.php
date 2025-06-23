<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Comprobar Estado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            background: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1rem;
        }
        .container {
            max-width: 400px;
            background: white;
            padding: 2rem;
            border-radius: 0.75rem;
            box-shadow: 0 4px 15px rgb(0 0 0 / 0.1);
        }
        h2 {
            font-weight: 600;
            margin-bottom: 1.5rem;
            color: #212529;
            text-align: center;
            letter-spacing: 0.05em;
        }
        .btn-volver {
            display: block;
            width: 100%;
            margin-top: 1rem;
            background-color: #6c757d;
            border: none;
            color: white;
            font-weight: 600;
            letter-spacing: 0.05em;
            border-radius: 0.5rem;
            padding: 0.5rem;
            transition: background-color 0.3s ease;
            text-align: center;
            text-decoration: none;
        }
        .btn-volver:hover {
            background-color: #5a6268;
            color: white;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Consulta de Estado de Reparación</h2>
        <form action="public/estado_resultado.php" method="get" class="mt-3">
            <div class="mb-3">
                <label for="id" class="form-label">Número de Seguimiento</label>
                <input type="number" name="id" id="id" class="form-control" required />
            </div>
            <button type="submit" class="btn btn-primary w-100">Ver Detalles</button>
        </form>
        <a href="index.php" class="btn-volver">Volver al Inicio</a>
    </div>
</body>
</html>
