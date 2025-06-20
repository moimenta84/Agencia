<?php
require_once '../../../../../includes/conexion.php';
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

// ELIMINAR DESTINO
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['accion']) && $_POST['accion'] === 'eliminar') {
    $pais = $_POST['pais'];

    try {
        $stmt = $pdo->prepare("DELETE FROM destino WHERE pais = ?");
        $stmt->execute([$pais]);

        if ($stmt->rowCount() > 0) {
            $_SESSION['mensaje'] = "Destino eliminado correctamente.";
        } else {
            $_SESSION['mensaje'] = "No se encontró destino con ese país.";
        }
    } catch (PDOException $e) {
        $_SESSION['mensaje'] = "Error al eliminar destino: " . $e->getMessage();
    }

    header("Location: lista.php");
    exit;
}

try {
    $stmt = $pdo->query("SELECT * FROM destino ORDER BY pais DESC");
} catch (PDOException $e) {
    $_SESSION['mensaje'] = "Error al obtener los destinos: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../../../../_public/assets/StyleList.css">
    <link rel="stylesheet" href="fontWasame/fontawesome-free-6.7.1-web/css/all.css" />
    <link rel="stylesheet" href="../../../../../assets/css/bootstrap.min.css" />
    <link rel="icon" href="../../../../../assets/img/lenguaje de marcas.png" />
    <title>Lista de Destinos</title>
</head>

<body>

    <?php
    if (isset($_SESSION['mensaje'])) {
        echo "<script>alert('" . addslashes($_SESSION['mensaje']) . "');</script>";
        unset($_SESSION['mensaje']);
    }
    ?>
    <div class="text-end p-3">
        <a href="../../../../../index.php" class="btn btn-outline-primary btn-lg rounded-pill shadow-sm">
            ← Volver
        </a>
    </div>

    <table class="table table-hover table-bordered align-middle text-center shadow">
        <thead class="table-secondary">
            <tr>
                <th>País</th>
                <th>Ciudad</th>
                <th>Requiere Pasaporte</th>
                <th>Modificar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($destino = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                <tr>
                    <td><?= htmlspecialchars($destino['pais']) ?></td>
                    <td><?= htmlspecialchars($destino['ciudad']) ?></td>
                    <td><?= $destino['req_pass'] ? 'Sí' : 'No' ?></td>
                    <td>
                        <a href="destiny_edit.php?pais=<?= urlencode($destino['pais']) ?>"
                            class="btn btn-outline-warning btn-sm">
                            <i class="fas fa-edit"></i> Modificar
                        </a>
                    </td>
                    <td>
                        <form method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este destino?');">
                            <input type="hidden" name="pais" value="<?= htmlspecialchars($destino['pais']) ?>">
                            <input type="hidden" name="accion" value="eliminar">
                            <button type="submit" class="btn btn-outline-danger btn-sm">
                                <i class="fas fa-trash-alt"></i> Eliminar
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