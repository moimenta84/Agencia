<?php
//Ruta de la conexion//
require_once '../Includes/conexion.php';
//INICIO SESSION - INCLUYE MENSAJES DE ERROR PARA CONEXION FALLIDA//
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

try {
    $stmt = $pdo->query("SELECT DISTINCT pais_dest FROM hotel  ORDER BY pais_dest DESC");
} catch (PDOException $e) {
    die("Error al obtener guias: " . $e->getMessage());
}

//VALIDACION DE ENVIO DE FORMULARIO Y RECOGIDA DE DATOS//
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recoger datos del formulario
    $nombre = $_POST['nombre'];
    $estrellas = $_POST['estrellas'] ?? '';
    $direccion = $_POST['direccion'] ?? '';
    $wifi = $_POST['wifi'] ?? '';
    $parking = $_POST['parking'] ?? '';
    $pais_dest = $_POST['pais_dest'] ?? '';

    $errores = [];
    //---VALIDACIONES--//
    if ($nombre === '' || $estrellas === '' || $direccion === '' || $pais_dest === '') {
        $errores[] = "Todos los campos obligatorios deben estar completos.";
    }

    if (!is_numeric($estrellas) || $estrellas < 1 || $estrellas > 5) {
        $errores[] = "Las estrellas deben ser un número entre 1 y 5.";
    }

    if ($wifi === '') {
        $errores[] = "Valor inválido para Wi-Fi.";
    }

    if ($parking === '') {
        $errores[] = "Valor inválido para Parking.";
    }

    if (!empty($errores)) {
        $_SESSION['mensaje'] = implode('<br>', $errores);
        header('Location: ../views/admin/hotel/create_Hotel.php');
        exit;
    }

    // Convertir wifi y parking a booleanos
    if ($wifi && $parking) {

        $wifiBool = true;
        $parkingBool = true;

    }
    //INTENTAMOS LA QUERY DE INSERCCION//
    try {
        require_once '../Includes/conexion.php';
        $sql = "INSERT INTO usuario (dni, nombre, apellidos, f_nacimiento, edad,email, contrasena)
            VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$dni, $nombre, $apellidos, $f_nacimiento, $edad, $email, $claveHash]);

        $_SESSION['mensaje'] = "Usuario registrado correctamente.";
        header('Location: ../views/authentification/signin_user.php');
        exit;

    } catch (PDOException $e) {
        $_SESSION['mensaje'] = "Error en la base de datos: " . $e->getMessage();
        header('Location: ../views/authentification/signin_user.php');
        exit;
    }
}
?>