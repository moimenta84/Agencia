<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Agencia</title>

  <!-- CSS -->
  <link rel="stylesheet" href="_public/assets/Style.css">
  <link rel="stylesheet" href="_public/assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="_public/assets/fontWasame/fontawesome-free-6.7.1-web/css/all.css">
  <link rel="icon" href="_public/assets/img/lenguaje de marcas.png">
</head>
<body>

<?php
if (isset($_SESSION['bienvenida'])) {
  $mensaje = htmlspecialchars($_SESSION['bienvenida'], ENT_QUOTES, 'UTF-8');
  echo "<h2>$mensaje</h2>";
  unset($_SESSION['bienvenida']);
}
?>
<div class="Container">
  <?php include 'includes/headerAministrador.php'; ?>             
  <?php include 'includes/asideAdministrador.php'; ?>
  <main class="main-container">
    <!-- Sección Hero -->
    <section class="hero">
      <img src="_public/assets/img/bola.jpg" class="bola" alt="bola">
      <img src="_public/assets/img/section1.png" class="img1" alt="section1" />
      <img src="_public/assets/img/mapa.png" class="mapa-icono" alt="mapa">
      <h1>Descubre los <br> Mejores Destinos <br> Del mundo</h1>
      <p class="hero_parrafo">
        Organiza y reserva tu viaje ideal con ayuda de nuestros expertos.
        Inspírate, encuentra consejos útiles y explora destinos únicos.
      </p>
    </section>

    <!-- Sección Destinos -->
    <section class="destinations">
      <h2 id="destinos">Explora Destinos<br> Populares</br></h2>
      <div class="carousel-container">
        <button class="carousel-btn prev">‹</button>
        <ul class="carousel">
          <?php
          $destinos = [
            ["caracas.jpg", "Caracas, Venezuela"],
            ["santo-domingo.jpg", "Santo Domingo, Rep. Dominicana"],
            ["ciudad-de-mexico.jpg", "Ciudad de México, México"],
            ["roma.jpg", "Roma, Italia"],
            ["paris.jpg", "París, Francia"],
            ["new-york.jpg", "New York, EE.UU"],
            ["madrid.jpg", "Madrid, España"],
            ["bogota.jpg", "Bogotá, Colombia"],
            ["bruselas.jpg", "Bruselas, Bélgica"],
            ["berlin.jpg", "Berlín, Alemania"]
          ];

          foreach ($destinos as $destino) {
            echo '
              <li>
                <div class="card" tabindex="0">
                  <img src="_public/assets/img/destinies/' . $destino[0] . '" alt="' . $destino[1] . '">
                  <div class="card-content">
                    <h3>' . $destino[1] . '</h3>
                    <a href="reserva.php" class="book-now">Reserva ahora</a>
                  </div>
                </div>
              </li>';
          }
          ?>
        </ul>
        <button class="carousel-btn next">›</button>
      </div>
    </section>

    <!-- Sección Newsletter -->
    <section class="Newsletter">
      <div class="Class_newsletter">
        <h3><b>Suscríbete a nuestro boletín</b></h3>
        <p>Últimas noticias, actualizaciones y muchas otras cosas <br>cada semana</p>
        <form method="post">
          <input type="email" placeholder="Introduzca su email" class="input" name="email" required />
        </form>
      </div>
    </section>
  </main>
</div>

<!-- JS -->
<script>
  const mapa = document.querySelector(".mapa-icono");
  let arriba = true;
  setInterval(() => {
    mapa.style.transform = arriba ? "translateY(-10px)" : "translateY(0)";
    arriba = !arriba;
  }, 1000);
</script>

<script>
  const colores = ["#FFF8F1", "#FCE7D8", "#FFD6C2", "#FFBFAE", "#FB9185", "#E96B5B", "#C65D52", "#A6473B", "#8B3B33", "#6F2E28"];
  let index = 0;
  const elemento = document.getElementById('destinos');
  setInterval(() => {
    elemento.style.color = colores[index % colores.length];
    index++;
  }, 2000);
</script>

<script src="_public/assets/js/Carousel.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<?php include 'includes/footer.php'; ?>
</body>
</html>
