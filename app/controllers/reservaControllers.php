<?php
require_once '../Includes/conexion.php';
session_start();
// Recoger datos del formulario
$dni = trim($_POST['dni'] ?? '');
$pais_dest = trim($_POST['pais'] ?? '');
$cod_hotel = intval($_POST['hotel'] ?? 0);
$precio = intval($_POST['precio'] ?? 0);
$f_entrada = $_POST['f_entrada'] ?? '';
$f_salida = $_POST['f_salida'] ?? '';
$errores = [];

// Validaciones mínimas
if ($dni === '' || $pais_dest === '' || $precio ==='' ||$cod_hotel === 0 || $f_entrada === '' || $f_salida === '') {
    $errores[] = "Todos los campos son obligatorios.";
}
if (strtotime($f_salida) <= strtotime($f_entrada)) {
    $errores[] = "La fecha de salida debe ser posterior a la de entrada.";
}

if (!empty($errores)) {
    $_SESSION['mensaje'] = implode('<br>', $errores);
    header("Location: ../views/admin/destiny/reserva.php");
    exit;
}

// Calcular precio
/*try {
    $dias = max((strtotime($f_salida) - strtotime($f_entrada)) / 86400, 1);
    $stmt = $pdo->prepare("SELECT precio FROM hotel WHERE cod = ?");
    $stmt->execute([$cod_hotel]);
    $precio_noche = $stmt->fetchColumn();
    $precio_h = $dias * floatval($precio_noche);
} catch (PDOException $e) {
    $_SESSION['mensaje'] = "Error al calcular el precio: " . $e->getMessage();
    header("Location: ../views/admin/destiny/reserva.php");
    exit;
}*/

// Insertar en destino
try {
    $stmt = $pdo->prepare("INSERT INTO destino (dni_usu, pais_dest, cod_hotel, precio_h, f_entrada, f_salida)
                           VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$dni, $pais_dest, $cod_hotel, $precio_h, $f_entrada, $f_salida]);
    $_SESSION['mensaje'] = "Destino registrado correctamente. Total: " . number_format($precio_h, 2) . " €";
} catch (PDOException $e) {
    $_SESSION['mensaje'] = "Error al guardar en la base de datos: " . $e->getMessage();
}

header("Location: ../views/admin/destiny/reserva.php");
