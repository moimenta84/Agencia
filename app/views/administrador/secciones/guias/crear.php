<?php
// RECUPERO LOS MENSAJES DEL CONTROLADOR
session_start();
$mensaje = $_SESSION['mensaje'] ?? '';
unset($_SESSION['mensaje']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../../../assets/StyleForm.css" />
  <link rel="stylesheet" href="../../../assets/fontWasame/fontawesome-free-6.7.1-web/css/all.css">
  <link rel="icon" href="../../../assets/img/lenguaje de marcas.png" />
  <title>Guide form</title>
</head>
<body>
<div class="Container">
    <header>
      <img src="../../../assets/img/logo.png" alt="Daw" class="Logo" />
      <button class="Bock-Now" onclick="window.location.href='../../../index.php'">Volver</button>
    </header>
    <main class="form-main">
      <section class="form-section">
        <h2>Crear nueva guia</h2>
        <p>Rellena tus datos:</p>
        <?php if ($mensaje): ?>
          <div class="mensaje-error"><?= htmlspecialchars($mensaje) ?></div>
        <?php endif; ?>
        <form method="POST" action="../../../app/controllers/guiaControllers.php" class="formulario">
          <input type="text" id="dni" name="dni" placeholder="DNI" required>
          <input type="text" id="nombre" name="nombre" placeholder="Nombre" required>
          <input type="text" id="apellidos" name="apellidos" placeholder="Apellidos" required>
          <select id="especialidad" name="especialidad" required>
            <option value="" disabled selected>Elige tu especialidad</option>
            <option value="Geografía">Geografía</option>
            <option value="Historia">Historia</option>
            <option value="Arquitectura">Arquitectura</option>
            <option value="Comida">Comida</option>
          </select>
          <input type="text" id="pais_dest" name="pais_dest" placeholder="País destino" required>
          <button type="submit" class="book-now">Registrar guia</button>
        </form>
      </section>
    </main>
  </div>
</div>
  <?php include '../../../Includes/footer.php'; ?>

</body>

</html>
