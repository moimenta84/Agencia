
<main class="main-container">
  <section class="formulario">
    <h2>Registrar nuevo usuario</h2>
    <form method="POST" action="../controllers/usuarioController.php" class="form">
      <input type="text" name="nombre" placeholder="Nombre" required class="input">
      <input type="text" name="apellidos" placeholder="Apellidos" required class="input">
      <input type="number" name="edad" placeholder="Edad (mínimo 18)" min="18" required class="input">
      <input type="email" name="email" placeholder="Email" required class="input">
      <button type="submit" class="book-now">Guardar usuario</button>
    </form>
  </section>
</main>



