<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/StyleUser.css" />
    <link rel="stylesheet" href="fontWasame/fontawesome-free-6.7.1-web/css/all.css">
    <link rel="icon" href="../assets/img/lenguaje de marcas.png" />
    <title>Creación de usuarios</title>
</head>
</head>
<body>
  <?php 
  
    require_once '../Includes/conexion.php';
    //Si el usuario a pulsado submit y existe el email y la password //
    if(isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['password'])){

      try {
        
        //CREO CONEXION POR PDO A BASE DE DATOS//
        $pdo = new PDO("pgsql:host=$DB_HOST;port=$DB_PORT;dbname=$DB_NAME", $DB_USER, $DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $pdo->prepare('SELECT password FROM usuarios WHERE email = :email');
        $stmt->execute(['email' => $email]);
        $usuario = $stmt->fetch();
 
        if ($usuario && password_verify($password, $usuario['password'])) {
             echo "Inicio de sesión exitoso.";
             $_SESSION['usuario'] = $email;
        } else {
            echo "Correo o contraseña incorrectos.";
        }
      } catch (PDOException $e) {
        die("<h2 style='color: red;'>Error de conexión: " . $e->getMessage() . "</h2>");
      }

    }
  
  ?>
  <div class="Container">
    <header>
      <img src="../assets/img/logo.png" alt="Daw" class="Logo" />
      <button class="Bock-Now" onclick="window.location.href='../Index.php'">Volver</button>
    </header>
    <main class="form-main">
      <section class="form-section">
        <h2>Create your Account</h2>
        <p>Fill in the details to create your user and passport.</p>
        <!--Sino estoy registrado me lleva al registrer-->
  

        <form class="formulario" method="post">
            <input type="email" name="email" placeholder="email" required class="input" value = <?php

              if(isset($_POST['submit']) && isset($_POST['email'])){

                echo $_POST['email'];

              }

            
            ?>
            >

            <input type="password" name="password" placeholder="contraseña" required class="input"value = <?php

                  if(isset($_POST['submit']) && isset($_POST['password'])){

                  echo $_POST['password'];
  
              }
          ?>
          >
            <button type="submit" class="book-now">Create Account</button>
            <p> <a href ="signin_User.php">Si no estás registrado, pulsa aquí</a></p>
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










