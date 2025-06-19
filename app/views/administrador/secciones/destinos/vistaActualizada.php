<?php
$pais = $_GET['pais'] ?? '';
$ciudad = $_GET['ciudad'] ?? '';
$req_pass = $_GET['req_pass'] ?? '0';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../../assets/StyleForm.css" />
    <link rel="stylesheet" href="../../../assets/fontWasame/fontWasome-free-6.7.1-web/css/all.css">
    <link rel="icon" href="../../../assets/img/lenguaje de marcas.png" />
    <title>Modificar Destino</title>
</head>
<body>
    <div class="Container">
        <header>
            <img src="../../../assets/img/logo.png" alt="Daw" class="Logo" />
            <button class="Bock-Now" onclick="window.location.href='../../../index.php'">Volver</button>
        </header>

        <main class="form-main">
            <section class="form-section">
                <h2>Modificar Destino</h2>
                <form class="formulario" method="POST" action="update_destiny.php">
                    <input type="hidden" name="pais_original" value="<?= htmlspecialchars($pais) ?>"required>
                    <input type="text" name="pais" value="<?= htmlspecialchars($pais) ?>" required>
                    <input type="text" name="ciudad" value="<?= htmlspecialchars($ciudad) ?>" required>
                    <select name="req_pass" required>
                        <option value="1" <?= $req_pass == '1' ? 'selected' : '' ?>>Sí</option>
                        <option value="0" <?= $req_pass == '0' ? 'selected' : '' ?>>No</option>
                    </select>

                    <button type="submit" class="book-now">Actualizar</button>
                </form>
            </section>
        </main>
    </div>

    <?php include '../../../Includes/footer.php'; ?>
</body>

</html>