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
  <link rel="stylesheet" href="../../../../../_public/assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../../../../_public/assets/fontWasame/fontawesome-free-6.7.1-web/css/all.css">
   <title>Registrar Usuario</title>
</head>
<body class="bg-light">

  <?php if (!empty($mensaje)): ?>
    <div class="alert alert-info text-center m-3 rounded-pill shadow-sm">
      <?= htmlspecialchars($mensaje) ?>
    </div>
  <?php endif; ?>

  
  <div class="container py-4">
    <div class="text-end mb-3">
      <a href="../../../../../index.php" class="btn btn-outline-dark rounded-pill px-4">
        ← Volver
      </a>
    </div>


    <div class="card shadow mx-auto p-4" style="max-width: 600px;">
      <div class="text-center mb-4">
        <i class="fas fa-user-plus fa-2x text-secondary mb-2"></i>
        <h4 class="fw-bold text-dark">Nueva usuaio</h4>
      </div>


    <form method="POST" action="../../../../app/controllers/guiaControllers.php">
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
                class="btn btn-dark rounded-pill"
                style="background-color: #cabfa5; color: #3b2f25; border: none;">
          <i class="fas fa-check me-2"></i> Crear cuenta
        </button>
      </div>
    </form>
  </div>
</div>

 <?php include '../../../../../includes/footer.php'; ?>
</body>
</html>
