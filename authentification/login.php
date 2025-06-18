<?php
require_once '../../Includes/conexion.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recoger datos del formulario
    $email = $_POST['email'] ?? '';
    $contrasena = $_POST['contrasena'] ?? '';

    try {
        // Crear conexión PDO
        $pdo = new PDO("pgsql:host=$DB_HOST;port=$DB_PORT;dbname=$DB_NAME", $DB_USER, $DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Incluir campo DNI en la consulta
        $stmt = $pdo->prepare('SELECT email, contrasena, nombre, dni FROM usuario WHERE email = ?');
        $stmt->execute([$email]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verificar credenciales
        if ($usuario && password_verify($contrasena, $usuario['contrasena'])) {
            $_SESSION['usuario'] = $usuario['email'];
            $_SESSION['nombre'] = $usuario['nombre'];
            $_SESSION['dni'] = $usuario['dni'];
            $_SESSION['bienvenida'] = "Welcome, " . $usuario['nombre'];

            header('Location: ../../index.php');
            exit;
        } else {
            $_SESSION['mensaje'] = 'Correo o contraseña incorrectos.';
        }
    } catch (PDOException $e) {
        die("<h2 style='color: red;'>Error de conexión: " . $e->getMessage() . "</h2>");
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../../assets/StyleForm.css">
  <link rel="stylesheet" href="../../assets/fontWasame/fontawesome-free-6.7.1-web/css/all.css">
  <link rel="icon" href="../../../assets/img/lenguaje de marcas.png">
  <title>Iniciar Sesión</title>
</head>
<body>
  <div class="Container">
    <header>
      <img src="../../../assets/img/logo.png" alt="Daw" class="Logo" />
      <button class="Bock-Now" onclick="window.location.href='../../../index.php'">Volver</button>
    </header>
    <main class="form-main">
      <section class="form-section">
        <h2>Iniciar sesión</h2>
        <!--Sino estoy registrado me lleva al registrer-->
        <form class="formulario" method="post">
  <input type="email" name="email" placeholder="Email" required class="input"
         value="<?php echo htmlspecialchars($_POST['email'] ?? '', ENT_QUOTES); ?>">
  <input type="password" name="contrasena" placeholder="Contraseña" required class="input"
         value="<?php echo htmlspecialchars($_POST['contrasena'] ?? '', ENT_QUOTES); ?>">
  <button type="submit" name="submit" class="book-now">Iniciar sesión</button>
  <p><a href="signin_User.php">Si no tienes cuenta, regístrate aquí</a></p>
</form>
      </section>
    </main>
  </div>
  <footer>
    <div class="redes">
      <img src="../../../assets/img/logo.png" class="logo_footer" alt="">
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
