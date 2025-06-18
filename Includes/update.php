<?php
require_once '../../../Includes/conexion.php';
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

// RECUPERO LOS MENSAJES DEL CONTROLADOR
session_start();
$mensaje = $_SESSION['mensaje'] ?? '';
unset($_SESSION['mensaje']);

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM usuario WHERE dni = ?");
$stmt->execute([$id]);
$task = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $title = $_POST['title'];
  $description = $_POST['description'];

  $stmt = $pdo->prepare("UPDATE usuario SET title = ?, description = ? WHERE id = ?");
  $stmt->execute([$title, $description, $id]);

  header("Location: index.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../../assets/StyleForm.css" />
  <link rel="stylesheet" href="../../../assets/fontWasame/fontawesome-free-6.7.1-web/css/all.css">
  <link rel="icon" href="../../../assets/img/lenguaje de marcas.png" />
  <title>Actualizar usuario</title>
</head>
<body>
  <div class="Container">
    <div class="Container">
    <header>
    <button class="Bock-Now" onclick="window.location.href=' ../../../index.php'">Volver</button>
      <img src="../../../assets/img/logo.png" alt="Daw" class="Logo" />
    </header>
    <main class="form-main">
      <section class="form-section">
        <h2>Actualizar usuario</h2>
        <p>Rellena los campos para actualizar tu usuario.</p>
        <!-- MOSTRAR MENSAJE PHP -->
        <?php if ($mensaje): ?>
        <div class="mensaje-error"><?= htmlspecialchars($mensaje) ?></div>
        <?php endif; ?>
          <form method="POST" action="../../controllers/signin_controllers.php" class="formulario">
            <input type="text" id="dni" name="dni" placeholder = "DNI" rmaxlength="9" required>
            <input type="text" id="nombre" name="nombre" placeholder = "Nombre"     maxlength="100" required>
            <input type="text" id="apellidos" name="apellidos" placeholder = "Apellidos"       maxlength="100" required>
            <input type="date" id="f_nacimiento" name="f_nacimiento" placeholder = "Fecha de nacimiento"  maxlength="100" required>
            <input type="number" id="edad" name="edad"   placeholder="Edad"    min="18" max="130" required>
            <input type="email" id="email" name="email"  placeholder="Email"   maxlength="50" required>
            <input type="text" id="contrasena" name="contrasena" placeholder="Contraseña"  maxlength="255" required>
            <button type="submit" class="book-now">Actualizar</button>
          </form>
      </section>
    </main>
  </div>
  </div>
  <?php include '../../Includes/footer.php'; ?>
</body>
</html>

