<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/Style.css">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/fontWasame/fontawesome-free-6.7.1-web/css/all.css">
  <link rel="icon" href="assets/img/lenguaje de marcas.png">
  <title>Agencia</title>
</head>

<body>
  <?php
  session_start();
  if (isset($_SESSION['bienvenida'])) {
    $mensaje = htmlspecialchars($_SESSION['bienvenida'], ENT_QUOTES, 'UTF-8');
    echo "<h2>$mensaje</h2>";
    unset($_SESSION['bienvenida']);
  }
  ?>
  <div class="Container">
    <?php include __DIR__ . '/Includes/header.php'?>

    <main class="main-container">
      <section class="hero">
        <img src="assets/img/bola.jpg" class="bola" alt="bola">
        <img src="assets/img/section1.png" class="img1" alt="section1" />
        <img src="assets/img/mapa.png" class="mapa-icono" />
        <script>
          const mapa = document.querySelector(".mapa-icono");
          let arriba = true;

          setInterval(() => {
            mapa.style.transform = arriba ? "translateY(-10px)" : "translateY(0)";
            arriba = !arriba;
          }, 1000);
        </script>
        <h1>Descubre los <br> Mejores Destinos <br> Del mundo</h1>
        <p class="hero_parrafo">
          Organiza y reserva tu viaje ideal con ayuda de nuestros expertos.
          Inspírate, encuentra consejos útiles y explora destinos únicos.
        </p>
      </section>
      <section class="destinations">
        <h2 id="destinos">
          Explora Destinos<br> Populares</br>
        </h2>
        <script>
          const colores = [
            "#FFF8F1",
            "#FCE7D8",
            "#FFD6C2",
            "#FFBFAE",
            "#FB9185",
            "#E96B5B",
            "#C65D52",
            "#A6473B",
            "#8B3B33",
            "#6F2E28"
          ];

          // Aplica cambio de color a un elemento cada 2 segundos
          let index = 0;
          const elemento = document.getElementById('destinos');

          let intervalo = setInterval(() => {

            elemento.style.color = colores[index % colores.length]
            index++;

            console.log(intervalo)
          }, 2000);

        </script>
        <div class="carousel-container">
          <button class="carousel-btn prev">‹</button>
          <ul class="carousel">
            <li>
              <div class="card" tabindex="0">
                <img src="assets/img/destinies/caracas.jpg">
                <div class="card-content">
                  <h3>Caracas, Venezuela</h3>
                  <a href="views/admin/destiny/reserva.php" class="Bock-Now">Reserva ahora</a>
                </div>
              </div>
            </li>
            <li>
              <div class="card" tabindex="0">
                <img src="assets/img/destinies/santo-domingo.jpg">
                <div class="card-content">
                  <h3>Santo Domingo, Rep. Dominicana</h3>
                  <a href="views/admin/destiny/reserva.php" class="Bock-Now">Reserva ahora</a>
                </div>
            </li>
            <li>
              <div class="card" tabindex="0">
                <img src="assets/img/destinies/ciudad-de-mexico.jpg">
                <div class="card-content">
                  <h3>Ciudad de México, México</h3>
                  <a href="views/admin/destiny/reserva.php" class="Bock-Now">Reserva ahora</a>
                </div>
            </li>
            <li>
              <div class="card" tabindex="0">
                <img src="assets/img/destinies/roma.jpg">
                <div class="card-content">
                  <h3>Roma, Italia</h3>
                  <a href="views/admin/destiny/reserva.php" class="Bock-Now">Reserva ahora</a>
                </div>
            </li>
            <li>
              <div class="card" tabindex="0">
                <img src="assets/img/destinies/paris.jpg">
                <div class="card-content">
                  <h3>París, Francia</h3>
                  <a href="views/admin/destiny/reserva.php" class="Bock-Now">Reserva ahora</a>
                </div>
            </li>
            <li>
              <div class="card" tabindex="0">
                <img src="assets/img/destinies/new-york.jpg">
                <div class="card-content">
                  <h3>New York, EE.UU</h3>
                  <a href="views/admin/destiny/reserva.php" class="Bock-Now">Reserva ahora</a>
                </div>
            </li>
            <li>
              <div class="card" tabindex="0">
                <img src="assets/img/destinies/madrid.jpg">
                <div class="card-content">
                  <h3>Madrid, España</h3>
                  <a href="views/admin/destiny/reserva.php" class="Bock-Now">Reserva ahora</a>
                </div>
            </li>
            <li>
              <div class="card" tabindex="0">
                <img src="assets/img/destinies/bogota.jpg">
                <div class="card-content">
                  <h3>Bogotá, Colombia</h3>
                  <a href="views/admin/destiny/reserva.php" class="Bock-Now">Reserva ahora</a>
                </div>
            </li>
            <li>
              <div class="card" tabindex="0">
                <img src="assets/img/destinies/bruselas.jpg">
                <div class="card-content">
                  <h3>Bruselas, Bélgica</h3>
                  <a href="views/admin/destiny/reserva.php" class="Bock-Now">Reserva ahora</a>
                </div>
            </li>
            <li>
              <div class="card" tabindex="0">
                <img src="assets/img/destinies/berlin.jpg">
                <div class="card-content">
                  <h3>Berlín, Alemania</h3>
                  <a href="views/admin/destiny/reserva.php" class="Bock-Now">Reserva ahora</a>
                </div>
            </li>
          </ul>
          <button class="carousel-btn next">›</button>
        </div>
      </section>

      <section class="Newsletter">
        <div class="Class_newsletter">
          <h3><b>Suscríbete a nuestro boletín </b></h3>
          <p>Últimas noticias, actualizaciones y muchas otras cosas <br>cada semana</p>
          <form action="post">
            <input type="email" placeholder="Introduzca su email" class="input" />
          </form>
        </div>
      </section>

    </main>

  </div>

      <?php include 'Includes/footer.php'; ?>

  <script src="assets/Carousel.js"></script>
</body>

</html>