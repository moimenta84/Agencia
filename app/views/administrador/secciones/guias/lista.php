<?php
require_once '../../../../../includes/conexion.php';
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

//ELIMINAR GUIAS//
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['accion'] === 'eliminar') {
    $dni = $_POST['dni'] ?? null;

    if ($dni) {
        try {
            $stmtDelete = $pdo->prepare("DELETE FROM guia WHERE dni = :dni");
            $stmtDelete->execute(['dni' => $dni]);

            if ($stmtDelete->rowCount() > 0) {
                $_SESSION['mensaje'] = "Guía eliminada correctamente.";
            } else {
                $_SESSION['mensaje'] = "No se encontró la guía con el DNI proporcionado.";
            }
        } catch (PDOException $e) {
            $_SESSION['mensaje'] = "Error al eliminar la guía: " . $e->getMessage();
        }
    } else {
        $_SESSION['mensaje'] = "DNI no válido.";
    }

    header("Location: guide_list.php");
    exit();
}
// Obtener guías
try {
    $stmt = $pdo->query("SELECT * FROM guia ORDER BY nombre DESC");
} catch (PDOException $e) {
    die("Error al obtener guías: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../../../_public/assets/StyleList.css">
    <link rel="stylesheet" href="fontWasame/fontawesome-free-6.7.1-web/css/all.css">
    <link rel="stylesheet" href="../../../../../_public/assets/css/bootstrap.min.css">
    <link rel="icon" href="../assets/img/lenguaje de marcas.png">
    <title>Guide List</title>
</head>
<body>

    <?php
    if (isset($_SESSION['mensaje'])) {
        echo "<script>alert('" . addslashes($_SESSION['mensaje']) . "');</script>";
        unset($_SESSION['mensaje']);
    }
    ?>
    <div class="text-end mb-3">
        <a href="../../../../../index.php" class="btn btn-outline-dark rounded-pill px-4">
            ← Volver
        </a>
    </div>

    <table class="table table-hover table-bordered align-middle text-center shadow">
        <thead class="table-secondary">
            <tr>
                <th>DNI</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Especialidad</th>
                <th>País destino</th>
                <th>Modificar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($guia = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                <tr>
                    <td><?= htmlspecialchars($guia['dni']) ?></td>
                    <td><?= htmlspecialchars($guia['nombre']) ?></td>
                    <td><?= htmlspecialchars($guia['apellidos']) ?></td>
                    <td><?= htmlspecialchars($guia['especialidad']) ?></td>
                    <td><?= htmlspecialchars($guia['pais_dest']) ?></td>
                    <td>
                        <a href="guia_edit.php?dni=<?= urlencode($guia['dni']) ?>"
                            class="btn btn-secondary btn-sm rounded-pill">
                            <i class="fas fa-edit me-1"></i> Modificar
                        </a>
                    </td>
                    <td>
                        <form method="POST" action="guide_list.php" class="d-inline">
                            <input type="hidden" name="accion" value="eliminar">
                            <input type="hidden" name="dni" value="<?= htmlspecialchars($guia['dni']) ?>">
                            <button type="submit" class="btn btn-outline-danger btn-sm rounded-pill"
                                onclick="return confirm('¿Eliminar esta guía?')">
                                <i class="fas fa-trash-alt me-1"></i> Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    </div>

    <?php include '../../../../../includes/footer.php'; ?>

</body>

</html>