<?php
require_once 'config.php';

try {
  $pdo = new PDO("pgsql:host=$DB_HOST;port=$DB_PORT;dbname=$DB_NAME", $DB_USER, $DB_PASS);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  die("<h2 style='color: red;'>Error de conexión: " . $e->getMessage() . "</h2>");
}
?>
