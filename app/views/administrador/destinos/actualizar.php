<?php
require_once '../Includes/conexion.php';
session_start();

$pais_original = trim($_POST['pais_original'] ?? '');
$pais = trim($_POST['pais'] ?? '');
$ciudad = trim($_POST['ciudad'] ?? '');
$req_pass = isset($_POST['req_pass']) ? 1 : 0;

if ($pais === '' || $ciudad === '' || $pais_original === '') {
    $_SESSION['mensaje'] = "Datos inválidos para modificar.";
    header("Location: ../views/admin/destiny/destiny_list.php");
    exit;
}

try {
    $stmt = $pdo->prepare("UPDATE destino SET pais = ?, ciudad = ?, req_pass = ? WHERE pais = ?");
    $stmt->execute([$pais, $ciudad, $req_pass, $pais_original]);
    $_SESSION['mensaje'] = "Destino modificado correctamente.";
} catch (PDOException $e) {
    $_SESSION['mensaje'] = "Error al modificar: " . $e->getMessage();
}
