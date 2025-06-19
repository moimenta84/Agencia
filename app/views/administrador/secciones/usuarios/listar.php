<?php
require_once '../includes/conexion.php';
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

// BLOQUE DE ELIMINACIÓN
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['accion']) && $_POST['accion'] === 'eliminar') {
    $dni = $_POST['dni'];

    try {
        $stmt = $pdo->prepare("DELETE FROM usuario WHERE dni = ?");
        $stmt->execute([$dni]);

        if ($stmt->rowCount() > 0) {
            $_SESSION['mensaje'] = "Usuario eliminado correctamente.";
        } else {
            $_SESSION['mensaje'] = "No se encontró el usuario con ese DNI: $dni";
        }
    } catch (PDOException $e) {
        $_SESSION['mensaje'] = "Error al eliminar usuario: " . $e->getMessage();
    }

    header("Location: listar.php");
}

try {
    $stmt = $pdo->query("SELECT * FROM usuario ORDER BY dni DESC");
} catch (PDOException $e) {
    die("Error al obtener usuarios: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../../../assets/StyleList.css" />
    <link rel="stylesheet" href="fontWasame/fontawesome-free-6.7.1-web/css/all.css" />
    <link rel="stylesheet" href="../../../../assets/css/bootstrap.min.css">
    <link rel="icon" href="../assets/img/lenguaje de marcas.png" />
    <title>Listar usuarios</title>
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
        <h1>Lista de usuarios</h1>
        <table class="table table-striped table-bordered align-middle text-center shadow-sm">
            <thead class="table-danger">

                <tr>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Edad</th>
                    <th>Email</th>
                    <th>Modificar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <?php while ($usuario = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                <tr>
                    <td><?= htmlspecialchars($usuario['nombre']) ?></td>
                    <td><?= htmlspecialchars($usuario['apellidos']) ?></td>
                    <td><?= htmlspecialchars($usuario['edad']) ?></td>
                    <td><?= htmlspecialchars($usuario['email']) ?></td>
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

    <?php include '../../../includes/footer.php'; ?>

</body>

</html>