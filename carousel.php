<?php
require_once 'includes/conexion.php';
session_start();
$stmt = $pdo->query("SELECT DISTINCT pais FROM destino ORDER BY pais ASC");
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>Reservar</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="_public/assets/StyleCarousel.css">
  <link rel="stylesheet" href="_public/assets/fontWasame/fontawesome-free-6.7.1-web/css/all.css">
</head>

<body>

  <div class="carousel-container">
    <button class="carousel-btn prev">‹</button>
    <ul class="carousel">
      <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
        <li>
          <div class="card" tabindex="0" data-pais="<?= htmlspecialchars($row['pais']) ?>">
            <img src="_public/assets/img/destinies/<?= strtolower(str_replace([' ', ',', '.'], ['-', '', ''], $row['pais'])) ?>.jpg"
                 alt="<?= htmlspecialchars($row['pais']) ?>" 
                 onerror="this.src='_public/assets/img/default.jpg'">
            <h3><?= htmlspecialchars($row['pais']) ?></h3>
            <button onclick="reservar(this)">Reservar</button>
          </div>
        </li>
      <?php endwhile; ?>
    </ul>
    <button class="carousel-btn next">›</button>
  </div>

  <script>
    function reservar(btn) {
      const pais = btn.closest('.card').dataset.pais;
      alert('Reserva iniciada para: ' + pais);
    }

    const prevBtn = document.querySelector('.carousel-btn.prev');
    const nextBtn = document.querySelector('.carousel-btn.next');
    const carousel = document.querySelector('.carousel');

    prevBtn.addEventListener('click', () => {
      carousel.scrollBy({ left: -300, behavior: 'smooth' });
    });

    nextBtn.addEventListener('click', () => {
      carousel.scrollBy({ left: 300, behavior: 'smooth' });
    });
  </script>
</body>
</html>
