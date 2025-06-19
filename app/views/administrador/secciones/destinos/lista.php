<?php
require_once '../../../../../Includes/conexion.php';
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

// BLOQUE DE ELIMINACIÓN
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

    header("Location: destinos/lista.php");

}

try {
    $stmt = $pdo->query("SELECT * FROM destino ORDER BY pais DESC");
} catch (PDOException $e) {
    $_SESSION['mensaje'] = "Error al eliminar destino: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../../../../assets/StyleList.css" />
    <link rel="stylesheet" href="../../../../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../../../assets/fontWasame/fontawesome-free-6.7.1-web/css/all.css" />
    <link rel="icon" href="../../../../../assets/img/lenguaje de marcas.png" />
    <title>Lista de Destinos</title>
</head>

<body>



    <?php if (!empty($_SESSION['mensaje'])): ?>
        <script>alert("<?= addslashes($_SESSION['mensaje']) ?>");</script>
        <?php $_SESSION['mensaje'] = ''; ?>
    <?php endif; ?>

    <div class="text-end my-3">
        <a href="../../../index.php" class="btn btn-outline-primary btn-lg rounded-pill">
            ← Volver
        </a>
    </div>



    <div class="container text-center my-4">
        <h1>Lista de Destinos</h1>

        <!-- Aquí dentro va todo -->

        <table class="table table-striped table-bordered align-middle text-center shadow-sm">

            <thead class="table-danger">
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
                        <td><?= htmlspecialchars($destino['req_pass']) ?></td>
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