<?php
session_start();
require_once '../../../Includes/conexion.php';
// Obtener país y ciudad seleccionados del POST
$paisSeleccionado = $_POST['pais'] ?? '';
$ciudadSeleccionada = $_POST['ciudad'] ?? '';
$idHotelSeleccionado = $_POST['hotel'] ?? '';
$f_entrada = $_POST['f_entrada'] ?? '';
$f_salida = $_POST['f_salida'] ?? '';
$precioMostrado = 0;

$paises = $pdo->query("SELECT DISTINCT pais FROM destino ORDER BY pais")->fetchAll(PDO::FETCH_COLUMN);
if ($f_entrada && $f_salida && $idHotelSeleccionado) {
  $dias = max((strtotime($f_salida) - strtotime($f_entrada)) / 86400, 1);
  $stmt = $pdo->prepare("SELECT precio FROM hotel WHERE cod = ?");
  $stmt->execute([$idHotelSeleccionado]);
  $precioPorNoche = $stmt->fetchColumn();
  $precioMostrado = $dias * floatval($precioPorNoche);
}
$hoteles = [];
if ($paisSeleccionado) {
  $stmt = $pdo->prepare("SELECT cod, nombre FROM hotel WHERE pais_dest = ?");
  $stmt->execute([$paisSeleccionado]);
  $hoteles = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../../../assets/StyleForm.css" />
  <!--<link rel="stylesheet" href="../../../fontWasame/fontawesome-free-6.7.1-web/css/all.css">-->
  <link rel="icon" href="../../../assets/img/lenguaje de marcas.png" />
  <title>Haga su Reserva</title>
</head>

<body>
  <div class="Container">
    <header>
      <img src="../../../assets/img/logo.png" alt="Daw" class="Logo" />
      <button class="Bock-Now" onclick="window.location.href='../../../index.php'">Volver</button>
    </header>
    <main class="form-main">
      <section class="form-section">
        <h2>Reserva</h2>
        <p>Haga su reserva.</p>
        <?php
        if (isset($_SESSION['mensaje'])) {
          echo '<p style="color: green;">' . htmlspecialchars($_SESSION['mensaje']) . '</p>';
          unset($_SESSION['mensaje']);
        }
        ?>
        <!-- Formulario principal -->
        <form class="formulario" method="POST" action="">

          <!-- */ <select name="pais_dest" id="pais_dest" required onchange="this.form.submit()">
            <option value="" disabled selected>Seleccione el país de destino</option>
           
          </select>-->
          <!-- País -->
          <select id="pais" name="pais" required onchange="this.form.submit()">
            <option value="" disabled selected>Seleccione el país de destino</option>
            <?php foreach ($paises as $pais): ?>
              <option value="<?php echo htmlspecialchars($pais); ?>" <?php if ($pais === $paisSeleccionado)
                   echo 'selected'; ?>>
                <?php echo htmlspecialchars($pais); ?>
              </option>
            <?php endforeach; ?>
          </select>
          <?php

          ?>
          <!-- Hotel -->
          <select name="hotel" id="hotel" required>
            <option value="" disabled selected>Seleccione el hotel de destino</option>
            <?php foreach ($hoteles as $hotel): ?>
              <option value="<?= htmlspecialchars($hotel['cod']) ?>" <?= ($hotel['cod'] === $idHotelSeleccionado) ? 'selected' : '' ?>>
                <?= htmlspecialchars($hotel['nombre']) ?>
              </option>
            <?php endforeach; ?>
          </select>

          <!-- Fechas -->
          <label for="f_entrada">Fecha de entrada:</label>
          <input type="date" name="f_entrada" id="f_entrada">
          <label for="f_salida">Fecha de salida:</label>
          <input type="date" name="f_salida" id="f_salida">
          <input type="hidden" name="precio" value="<?= htmlspecialchars($precioMostrado) ?>">
          <?php
          if ($precioMostrado > 0): ?>
            <p id="precio_total">Precio total estimado: <?= number_format($precioMostrado, 2) ?> €</p>
          <?php endif; ?>
          <input type="text" name="dni" id="dni" placeholder="dni" required>
          <button type="submit" class="book-now">Guardar reserva</button>
        </form>
      </section>
    </main>
    <footer>
      <?php include '../../../Includes/footer.php'; ?>
    </footer>
  </div>
</body>

</html>