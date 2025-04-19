
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link rel="stylesheet" href="../assets/styleDestiny.css" />
  <link rel="stylesheet" href="fontWasame/fontawesome-free-6.7.1-web/css/all.css">
  <link rel="icon" href="assets/img/lenguaje de marcas.png" />
  <title>Inscripción a Destino</title>
</head>
<body>
  <div class="Container">
    <header>
      <img src="../assets/img/logo.png" alt="Daw" class="Logo" />
      <button class="Bock-Now" onclick="window.location.href='../Index.php'">Volver</button>
    </header>

    <main class="form-main">
      <section class="form-section">
        <h2>Inscripción a destino</h2>
        <p>Ingresa tu nombre y elige tu destino.</p>
        <form class="formulario">
          <input type="text" name="nombre" placeholder="Nombre completo" required>

          <select name="destino" required>
            <option value="" disabled selected>Selecciona un destino</option>
            <option value="California">Mountain Hiking Tour - California</option>
            <option value="Peru">Machu Picchu - Peru</option>
            <option value="Arizona">The Grand Canyon - Arizona</option>
          </select>

          <button type="submit" class="book-now">Inscribirme</button>
        </form>
      </section>
    </main>
    <footer>
      <div class="redes">
        <img src="../assets/img/logo.png" class="logo_footer" alt="">
        <p class="parrafo_redes">Enjoy The touring</p>
        <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
        <a href="#"><i class="fa-brands fa-instagram"></i></a>
        <a href="#"><i class="fa-brands fa-twitter"></i></a>
        <p class="copy"> &copy; 2025 My Website Pere Maria Orts.</p>
      </div>
    </footer>
  </div>
</body>
</html>