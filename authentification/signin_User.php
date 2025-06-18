<?php
session_start();
$mensaje = $_SESSION['mensaje'] ?? '';
unset($_SESSION['mensaje']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="/assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="/assets/fontWasame/fontawesome-free-6.7.1-web/css/all.css">
  <link rel="icon" href="/assets/img/lenguaje de marcas.png" />
  <title>Crear Usuario</title>
  <style>
    body {
      background-color: #f5f4fa;
    }
    .form-card {
      max-width: 500px;
      border: none;
      border-radius: 1rem;
    }
    footer i:hover {
      opacity: 0.7;
    }
  </style>
</head>
<header style="background-color: #f9f9f9;" class="py-3 border-bottom">
  <div class="container d-flex justify-content-between align-items-center">
    <h1 class="h4 mb-0 d-flex align-items-center" style="color: #a89b8e;">
      <i class="fas fa-building me-2"></i> Agencia de Viajes
    </h1>
    <nav>
      <a href="/index.php"
         class="btn btn-sm"
         style="background-color: #e2ded9; color: #594d45; border: none;">
        <i class="fas fa-home me-1"></i> Inicio
      </a>
    </nav>
  </div>
</header>


<body>

  <!-- MAIN centrado -->
  <main class="d-flex justify-content-center align-items-center min-vh-100" style="background-color: #f9f9f9;">
  <div class="card form-card shadow p-5" style="background-color: #fdfdfd; border: none;">
    <h3 class="text-center mb-4" style="color: #8d735c;">
      <i class="fas fa-user-plus me-2"></i> Crear usuario
    </h3>
    <p class="text-center text-muted mb-4">Rellena los campos para registrar un nuevo usuario.</p>

    <?php if ($mensaje): ?>
      <div class="alert alert-info text-center"><?= htmlspecialchars($mensaje) ?></div>
    <?php endif; ?>

    <form method="POST" action="/controllers/signin_controllers.php">
      <div class="form-floating mb-3">
        <input type="text" class="form-control" id="dni" name="dni" placeholder="DNI" maxlength="9" required>
        <label for="dni">DNI</label>
      </div>

      <div class="form-floating mb-3">
        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" maxlength="100" required>
        <label for="nombre">Nombre</label>
      </div>

      <div class="form-floating mb-3">
        <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Apellidos" maxlength="100" required>
        <label for="apellidos">Apellidos</label>
      </div>

      <div class="form-floating mb-3">
        <input type="date" class="form-control" id="f_nacimiento" name="f_nacimiento" required>
        <label for="f_nacimiento">Fecha de nacimiento</label>
      </div>

      <div class="form-floating mb-3">
        <input type="email" class="form-control" id="email" name="email" placeholder="Email" maxlength="50" required>
        <label for="email">Email</label>
      </div>

      <div class="form-floating mb-4">
        <input type="text" class="form-control" id="contrasena" name="contrasena" placeholder="Contraseña" maxlength="255" required>
        <label for="contrasena">Contraseña</label>
      </div>

      <div class="d-grid">
        <button type="submit"
                class="btn btn-lg rounded-pill shadow-sm"
                style="background-color: #cabfa5; color: #3b2f25; border: none;">
          <i class="fas fa-check me-2"></i> Crear cuenta
        </button>
      </div>
    </form>
  </div>
</main>

        </div>
      </form>
    </div>
  </main>

  <?php include(__DIR__ . '/../../Includes/footer.php'); ?>
</body>
</html>
