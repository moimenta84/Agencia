<?php
// Incluye el archivo de conexión a la base de datos
require_once '../Includes/conexion.php';
// Inicia la sesión para poder usar variables de sesión
session_start();
// Activa la visualización de errores (solo para desarrollo)
ini_set('display_errors', 1);
error_reporting(E_ALL);
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['pais'], $_POST['ciudad'], $_POST['req_pass'])) {
    $pais = $_POST['pais'];
    $ciudad = $_POST['ciudad'];
    $req_pass = $_POST['req_pass'];
    try {
        $stmt = $pdo->prepare("INSERT INTO destino (pais, ciudad, req_pass) VALUES (?, ?, ?)");
        $stmt->execute([
            $pais,
            $ciudad,
            $req_pass
        ]);
        $_SESSION['mensaje'] = "Destino creado correctamente.";
    } catch (PDOException $e) {
        $_SESSION['mensaje'] = "Error al crear destino: " . $e->getMessage();
    }

} else {
    $_SESSION['mensaje'] = "Petición no válida.";
}

header("Location: ../views/admin/destiny/create_destiny.php");
exit();
