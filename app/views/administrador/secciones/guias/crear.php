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
   <title>Registrar Guía</title>
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
        <h4 class="fw-bold text-dark">Nueva Guía</h4>
      </div>

      <form method="POST" action="../../../../app/controllers/guiaControllers.php">
        <div class="mb-3">
          <label for="dni" class="form-label">DNI</label>
          <input type="text" class="form-control" id="dni" name="dni" required>
        </div>

        <div class="mb-3">
          <label for="nombre" class="form-label">Nombre</label>
          <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>

        <div class="mb-3">
          <label for="apellidos" class="form-label">Apellidos</label>
          <input type="text" class="form-control" id="apellidos" name="apellidos" required>
        </div>

        <div class="mb-3">
          <label for="especialidad" class="form-label">Especialidad</label>
          <select class="form-select" id="especialidad" name="especialidad" required>
            <option value="" disabled selected>Selecciona una opción</option>
            <option value="Geografía">Geografía</option>
            <option value="Historia">Historia</option>
            <option value="Arquitectura">Arquitectura</option>
            <option value="Comida">Comida</option>
          </select>
        </div>

        <div class="mb-4">
          <label for="pais_dest" class="form-label">País destino</label>
          <input type="text" class="form-control" id="pais_dest" name="pais_dest" required>
        </div>

        <div class="d-grid">
          <button type="submit"
                   class="btn btn-dark rounded-pill"
                    style="background-color: #cabfa5; color: #3b2f25; border: none;">
            <i class="fas fa-save me-2"></i>Registrar guía
          </button>
        </div>
      </form>
    </div>
  </div>
  <?php include '../../../../../includes/footer.php'; ?>
</body>
</html>
