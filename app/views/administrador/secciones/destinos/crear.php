<?php
session_start();
require_once '../../../../../includes/conexion.php';

$mensaje = $_SESSION['mensaje'] ?? '';
unset($_SESSION['mensaje']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pais = $_POST['pais'];
    $ciudad = $_POST['ciudad'];
    $req_pass = $_POST['req_pass'];

    try {
        $stmt = $pdo->prepare("INSERT INTO destino (pais, ciudad, req_pass) VALUES (?, ?, ?)");
        $stmt->execute([$pais, $ciudad, $req_pass]);
        $_SESSION['mensaje'] = "Destino creado correctamente.";
        header("Location: lista.php");
        exit;
    } catch (PDOException $e) {
        $_SESSION['mensaje'] = "Error al guardar: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Nuevo Destino</title>
  <link rel="stylesheet" href="../../../../../_public/assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="../../../../../_public/assets/fontWasame/fontawesome-free-6.7.1-web/css/all.css" />
  <link rel="icon" href="../../../../../_public/assets/img/lenguaje de marcas.png" />
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
        <i class="fas fa-map-marked-alt fa-2x text-secondary mb-2"></i>
        <h4 class="fw-bold text-dark">Nuevo Destino</h4>
      </div>

      <form method="POST" action="create_destiny.php">
        <div class="mb-3">
          <label for="pais" class="form-label">País</label>
          <input type="text" class="form-control" id="pais" name="pais" required>
        </div>

        <div class="mb-3">
          <label for="ciudad" class="form-label">Ciudad</label>
          <input type="text" class="form-control" id="ciudad" name="ciudad" required>
        </div>

        <div class="mb-4">
          <label for="req_pass" class="form-label">¿Requiere pasaporte?</label>
          <select class="form-select" id="req_pass" name="req_pass" required>
            <option value="" disabled selected>Selecciona una opción</option>
            <option value="1">Sí</option>
            <option value="0">No</option>
          </select>
        </div>

        <div class="d-grid">
          <button type="submit" class="btn btn-dark rounded-pill">
            <i class="fas fa-save me-2"></i>Guardar destino
          </button>
        </div>
      </form>
    </div>
  </div>

  <?php include '../../../../../includes/footer.php'; ?>
</body>
</html>
