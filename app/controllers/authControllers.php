<?php
//Ruta de la conexion//
require_once '../Includes/conexion.php';
//INICIO SESSION - INCLUYE MENSAJES DE ERROR PARA CONEXION FALLIDA//
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

$mensaje = '';
//VALIDACION DE ENVIO DE FORMULARIO Y RECOGIDA DE DATOS//
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recoger datos del formulario
    $dni = $_POST['dni'] ?? '';
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'] ?? '';
    $f_nacimiento = $_POST['f_nacimiento'] ?? '';
    $edad = $_POST['edad'] ?? '';
    $email = $_POST['email'] ?? '';
    $contrasena = $_POST['contrasena'] ?? '';

    // Validaciones Basicas//
    if (trim($dni) === '' || trim($nombre) === '' || trim($apellidos) === '' || trim($f_nacimiento) === '' || trim($edad) === '' || trim($email) === '' || trim($contrasena) === '') {

        $_SESSION['mensaje'] = "No peudes dejar el campo vacio.";
        header('Location: ../views/authentification/signin_user.php');
        exit;
    }

    //Validacion de correo con una funcion de php//
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['mensaje'] = "Correo Electronico invalido.";
        header('Location: ../views/authentification/signin_user.php');
        exit;
    }
    //Valido entrada y mayor de edad//
    if (!is_numeric($edad)) {
        $_SESSION['mensaje'] = "La edad debe ser un número.";
        header('Location: ../views/authentification/signin_user.php');
        exit;
    } else {

        if ($edad < 18) {
            $_SESSION['mensaje'] = "Debes tener al menos 18 años.";
            header('Location: ../views/authentification/signin_user.php');
            exit;
        }
    }

    //Funcion Para encriptar contraseña//
    $claveHash = password_hash($contrasena, PASSWORD_DEFAULT);

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