<?php
// Conecta con la base de datos mediante archivo externo
require_once '../../../Includes/conexion.php';
// Inicia sesión para manejar variables globales de usuario
session_start();
// Habilita la visualización de errores para debugging 
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Verifica que se recibió una petición POST y que existe el parámetro 'pais'
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['pais'])) {
    // Extrae el DNI del usuario a eliminar desde el formulario
    $pais = $_POST['pais'];
    try {
        
        $stmt = $pdo->prepare("DELETE FROM destino WHERE pais = ?");
        // Ejecuta la consulta con el parámetro pais
        $stmt->execute([ $pais]);

        // Verifica si alguna fila fue afectada (pais eliminado)
        if ($stmt->rowCount() > 0) {
            $_SESSION['mensaje'] = "destino eliminado correctamente.";
        } else {
            // No se encontró usuario con ese DNI
            $_SESSION['mensaje'] = "No se encontró el destino con ese pais.";
        }
    } catch (PDOException $e) {
        // Error de base de datos al intentar eliminar
        $_SESSION['mensaje'] = "Error al eliminar destino: " . $e->getMessage();
    }
}