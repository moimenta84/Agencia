<?php
require_once '../../../Includes/conexion.php';

session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['accion'] === 'eliminar') {
    $dni = $_POST['dni'];

    try {
        $stmt = $pdo->prepare("DELETE FROM guia WHERE dni = ?");
        $stmt->execute([$dni]);

        if ($stmt->rowCount() > 0) {
            $_SESSION['mensaje'] = "Guía eliminada correctamente.";
        } else {
            $_SESSION['mensaje'] = "No se encontró la guía con el DNI proporcionado.";
        }
    } catch (PDOException $e) {
        $_SESSION['mensaje'] = "Error al eliminar la guía: " . $e->getMessage();
    }
} else {
    $_SESSION['mensaje'] = "Petición no válida.";
}

header("Location: ../views/admin/guia/guide_list.php");
exit;
