<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/StyleCarousel.css">
    <link rel="stylesheet" href="assets/fontWasame/fontawesome-free-6.7.1-web/css/all.css">
    <title>Document</title>
</head>
<body>

    <div class="carousel-container">
        <button class="carousel-btn prev">‹</button>
        <ul class="carousel">
            <li><div class="card" tabindex="0">1</div></li> 
            <li><div class="card" tabindex="0">2</div></li> 
            <li><div class="card" tabindex="0">3</div></li> 
            <li><div class="card" tabindex="0">4</div></li> 
            <li><div class="card" tabindex="0">5</div></li> 
            <li><div class="card" tabindex="0">6</div></li> 
            <li><div class="card" tabindex="0">7</div></li> 
            <li><div class="card" tabindex="0">8</div></li> 
            <li><div class="card" tabindex="0">9</div></li> 
            <li><div class="card" tabindex="0">10</div></li> 
        </ul>
        <button class="carousel-btn next">›</button>
    </div>
    <script src="assets/Carousel.js"></script>
</body>
</html>

<?php
require_once '../Includes/conexion.php';
session_start();
$stmt = $pdo->query("SELECT DISTINCT pais FROM destino ORDER BY pais ASC");
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Reservar</title>
</head>
<body>
<ul class="carousel">
  <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
    <li>
      <div class="card" data-pais="<?= htmlspecialchars($row['pais']) ?>">
        <h3><?= htmlspecialchars($row['pais']) ?></h3>
        <button onclick="reservar(this)">Book now</button>
      </div>
    </li>
  <?php endwhile; ?>
</ul>

</body>
</html>
