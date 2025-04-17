<?php
// conexion.php
require_once 'config-local.php'; // Carga $host, $db, $user, $pass, $port

try {
    // Crear DSN de PostgreSQL con el mismo orden
    $dsn = "pgsql:host=$host;port=$port;dbname=$db";

    // Instanciar PDO
    $pdo = new PDO($dsn, $user, $pass);

    // Configurar modo de errores como excepciones
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // (Opcional) Mensaje de éxito
    // echo " Conexión establecida con PostgreSQL";

} catch (PDOException $e) {
    die(" Error de conexión: " . $e->getMessage());
}

