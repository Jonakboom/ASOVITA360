<?php
$conexion = new mysqli("localhost", "root", "", "asovita");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $correo = $_POST['correo'];
    $contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT);

    $stmt = $conexion->prepare("INSERT IGNORE INTO usuario (correo, contrasena) VALUES (?, ?)");
    $stmt->bind_param("ss", $correo, $contrasena);
    $stmt->execute();

    header("Location: productos.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro | ASOVITA</title>
    <link rel="icon" href="img/logo.png">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="cabecera">
        <div class="cabecera-interna">
            <a class="marca" href="index.php"><img src="img/logo.png" alt="ASOVITA"></a>
            <nav>
                <a href="index.php">Inicio</a>
                <a href="productos.php">Productos</a>
                <a class="activo" href="registro.php">Registro</a>
            </nav>
        </div>
    </header>

    <main class="centrado fondo-alt">
        <form class="tarjeta" action="" method="POST">
            <h1>Crear cuenta</h1>
            <p class="intro">Regístrate para ver el catálogo y agregar productos.</p>

            <div class="campo">
                <label>Correo electrónico</label>
                <input type="email" name="correo" required>
            </div>

            <div class="campo">
                <label>Contraseña (mínimo 6 caracteres)</label>
                <input type="password" name="contrasena" minlength="6" required>
            </div>

            <button type="submit" class="boton">Crear cuenta</button>
            <p class="pie-form">¿Ya tienes cuenta? <a href="productos.php">Ingresa aquí</a></p>
        </form>
    </main>

    <footer class="pie">
        <div class="contenedor pie-interno">
            <span>Copyright © ASOVITA <?= date('Y') ?></span>
            <a href="https://www.facebook.com/asovita.bo" target="_blank">Facebook</a>
        </div>
    </footer>
</body>
</html>
