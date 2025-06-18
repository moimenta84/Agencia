<?php
session_start();
require_once '../../../Includes/conexion.php';

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
        header("Location: destiny_list.php");
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
    <link rel="stylesheet" href="../../../assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../../assets/fontWasame/fontawesome-free-6.7.1-web/css/all.css" />
    <link rel="icon" href="../../../assets/img/lenguaje de marcas.png" />
    <title>Nuevo Destino</title>
</head>
<body>
    <?php if (!empty($mensaje)): ?>
        <div class="alert alert-info text-center m-3" role="alert">
            <?= htmlspecialchars($mensaje) ?>
        </div>
    <?php endif; ?>

    <!-- Botón volver -->
    <div class="text-end p-3">
        <a href="destiny_list.php" class="btn btn-outline-primary rounded-pill">
            ← Volver
        </a>
    </div>
    <!-- MAIN centrado con card/formulario -->
    <main class="d-flex justify-content-center align-items-center min-vh-100 bg-light">
        <div class="card shadow rounded-4 p-5" style="width: 100%; max-width: 600px;">
            <h2 class="mb-4 text-center text-primary">
                <i class="fas fa-map-marked-alt me-2"></i> Nuevo destino
            </h2>

            <form method="POST" action="create_destiny.php">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="pais" name="pais" placeholder="País" required>
                    <label for="pais">País</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="ciudad" name="ciudad" placeholder="Ciudad" required>
                    <label for="ciudad">Ciudad</label>
                </div>

                <div class="form-floating mb-4">
                    <select class="form-select" id="req_pass" name="req_pass" required>
                        <option value="" disabled selected>Selecciona una opción</option>
                        <option value="1">Sí</option>
                        <option value="0">No</option>
                    </select>
                    <label for="req_pass">¿Requiere pasaporte?</label>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-lg rounded-pill shadow-sm">
                        <i class="fas fa-plus-circle me-1"></i> Guardar destino
                    </button>
                </div>
            </form>
            
       
        </div>
          <?php include '../../../Includes/footer.php'; ?>
    </main>

  
</body>
</html>
