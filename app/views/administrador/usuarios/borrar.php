<?php
require_once '../../../Includes/conexion.php';
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['dni'])) {
    $dni = $_POST['dni'];

    try {
        $stmt = $pdo->prepare("DELETE FROM usuario WHERE dni = ?");
        $stmt->execute([$dni]);

        if ($stmt->rowCount() > 0) {
            $_SESSION['mensaje'] = "Usuario eliminado correctamente.";
        } else {
            $_SESSION['mensaje'] = "No se encontró el usuario con ese DNI: ";
        }
    } catch (PDOException $e) {
        // Error de base de datos al intentar eliminar
        $_SESSION['mensaje'] = "Error al eliminar destino: " . $e->getMessage();
    }
}