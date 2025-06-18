<?php
require_once '../Includes/conexion.php';
//INICIO SESSION - INCLUYE MENSAJES DE ERROR PARA CONEXION FALLIDA//
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Limpiar mensaje anterior
$_SESSION['mensaje'] = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    //--RECOGER DATOS DEL FORMULARIO--//
    $dni = $_POST['dni'] ?? '';
    $nombre = $_POST['nombre'] ?? '';
    $apellidos = $_POST['apellidos'] ?? '';
    $especialidad = $_POST['especialidad'] ?? '';
    $pais_dest = $_POST['pais_dest'] ?? '';

    //--ARRAY ERRORES--//
    $errores = [];

    // Validaciones
    if ($dni === '') {
        $errores[] = "El DNI es obligatorio.";
    } else if (strlen($dni) !== 9) {
        $errores[] = "El DNI debe tener exactamente 9 caracteres.";
    }

    if ($nombre === '') {
        $errores[] = "El nombre es obligatorio.";
    }

    if ($apellidos === '') {
        $errores[] = "Los apellidos son obligatorios.";
    }

    if ($especialidad === '') {
        $errores[] = "La especialidad es obligatoria.";
    }

    if ($pais_dest === '') {
        $errores[] = "El país de destino es obligatorio.";
    }

    // Si hay errores, guardar en sesión y redirigir
    if (!empty($errores)) {
        $_SESSION['mensaje'] = implode('<br>', $errores);
        header("Location: ../views/admin/guia/create_Guide.php");
        exit;
    }

    try {
        $sql = "INSERT INTO guia (dni, nombre, apellidos, especialidad, pais_dest)
                    VALUES (?, ?, ?, ?, ?)";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([

            $dni,
            $nombre,
            $apellidos,
            $especialidad,
            $pais_dest
        ]);

        $_SESSION['mensaje'] = "Guia registrado correctamente.";

        header("Location: ../views/admin/guia/create_guide.php");
        exit;
    } catch (PDOException $e) {
        $_SESSION['mensaje'] = "Error en la base de datos: " . $e->getMessage();
        header('Location: ../views/admin/guia/create_Guide.php');
        exit;
    }
}

?>