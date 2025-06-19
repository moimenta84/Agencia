<?php
require_once '../../../Includes/conexion.php';
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Procesar eliminación
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
    <link rel="stylesheet" href="../../../assets/StyleList.css">
    <link rel="stylesheet" href="fontWasame/fontawesome-free-6.7.1-web/css/all.css">
    <link rel="stylesheet" href="../../../assets/css/bootstrap.min.css">
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
    <div class="text-end my-3">
        <a href="../../../index.php" class="btn btn-outline-primary btn-lg rounded-pill">
            ← Volver
        </a>
    </div>

    <div class="container text-center my-4">
        <h1>Lista de guías</h1>

        <table class="table table-striped table-bordered align-middle text-center shadow-sm">
            <thead class="table-danger">
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

            <?php while ($guia = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                <tr>
                    <td><?= htmlspecialchars($guia['dni']) ?></td>
                    <td><?= htmlspecialchars($guia['nombre']) ?></td>
                    <td><?= htmlspecialchars($guia['apellidos']) ?></td>
                    <td><?= htmlspecialchars($guia['especialidad']) ?></td>
                    <td><?= htmlspecialchars($guia['pais_dest']) ?></td>
                    <td>
                        <a href="destiny_edit.php?pais=<?= urlencode($destino['pais']) ?>"
                            class="btn btn-outline-warning btn-sm">
                            <i class="fas fa-edit"></i> Modificar
                        </a>
                    </td>
                    <td>

                        <button type="submit" class="btn btn-outline-danger btn-sm">
                            <i class="fas fa-trash-alt"></i> Eliminar
                        </button>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>
    <?php include '../../../Includes/footer.php'; ?>

</body>

</html>