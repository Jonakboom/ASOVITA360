<?php
session_start();
$conexion = new mysqli("localhost", "root", "", "asovita");
$conexion->set_charset("utf8mb4");

if (isset($_GET['salir'])) {
    session_destroy();
    header("Location: productos.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (!isset($_SESSION['usuario'])) {
        $correo = $_POST['correo'];

        $stmt = $conexion->prepare("SELECT * FROM usuario WHERE correo = ?");
        $stmt->bind_param("s", $correo);
        $stmt->execute();
        $usuario = $stmt->get_result()->fetch_assoc();

        if ($usuario && password_verify($_POST['contrasena'], $usuario['contrasena'])) {
            $_SESSION['usuario'] = $usuario['correo'];
        }
    } else {
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $imagen = null;

        $extension = strtolower(pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION));
        if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
            $imagen = uniqid() . "." . $extension;
            move_uploaded_file($_FILES['imagen']['tmp_name'], "uploads/" . $imagen);
        }

        $stmt = $conexion->prepare("INSERT INTO producto (nombre, descripcion, precio, imagen) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssds", $nombre, $descripcion, $precio, $imagen);
        $stmt->execute();
    }

    header("Location: productos.php");
    exit;
}

$productos = $conexion->query("SELECT * FROM producto ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos | ASOVITA</title>
    <link rel="icon" href="img/logo.png">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="cabecera">
        <div class="cabecera-interna">
            <a class="marca" href="index.php"><img src="img/logo.png" alt="ASOVITA"></a>
            <nav>
                <a href="index.php">Inicio</a>
                <a class="activo" href="productos.php">Productos</a>
                <a href="registro.php">Registro</a>
            </nav>
        </div>
    </header>

<?php if (!isset($_SESSION['usuario'])) { ?>

    <main class="centrado fondo-alt">
        <form class="tarjeta" action="" method="POST">
            <h1>Ingresar</h1>
            <p class="intro">Entra con tu cuenta para ver el catálogo de productos.</p>

            <div class="campo">
                <label>Correo electrónico</label>
                <input type="email" name="correo" required>
            </div>

            <div class="campo">
                <label>Contraseña</label>
                <input type="password" name="contrasena" required>
            </div>

            <button type="submit" class="boton">Ingresar</button>
            <p class="pie-form">¿No tienes cuenta? <a href="registro.php">Regístrate</a></p>
        </form>
    </main>

<?php } else { ?>

    <main class="fondo-alt">
        <section class="encabezado-pagina">
            <div class="contenedor">
                <h1>Catálogo de productos</h1>
                <p>Sesión iniciada como <?= htmlspecialchars($_SESSION['usuario']) ?>. <a href="productos.php?salir=1">Cerrar sesión</a></p>
            </div>
        </section>

        <div class="contenedor catalogo">
            <form class="tarjeta" action="" method="POST" enctype="multipart/form-data">
                <h2>Agregar producto</h2>

                <div class="campo">
                    <label>Nombre</label>
                    <input type="text" name="nombre" required>
                </div>

                <div class="campo">
                    <label>Descripción</label>
                    <textarea name="descripcion" rows="3"></textarea>
                </div>

                <div class="campo">
                    <label>Precio (Bs)</label>
                    <input type="number" name="precio" min="0" step="0.01" required>
                </div>

                <div class="campo">
                    <label>Imagen</label>
                    <input type="file" name="imagen" accept="image/*">
                </div>

                <button type="submit" class="boton">Guardar producto</button>
            </form>

            <div class="lista">
                <?php while ($p = $productos->fetch_assoc()) { ?>
                    <article class="producto">
                        <?php if ($p['imagen']) { ?>
                            <img src="uploads/<?= $p['imagen'] ?>" alt="<?= htmlspecialchars($p['nombre']) ?>">
                        <?php } else { ?>
                            <div class="sin-imagen tono-<?= $p['id'] % 4 ?>"><?= htmlspecialchars(mb_substr($p['nombre'], 0, 1)) ?></div>
                        <?php } ?>

                        <div class="producto-info">
                            <h3><?= htmlspecialchars($p['nombre']) ?></h3>
                            <p><?= htmlspecialchars($p['descripcion']) ?></p>
                            <span class="precio">Bs <?= $p['precio'] ?></span>
                        </div>
                    </article>
                <?php } ?>
            </div>
        </div>
    </main>

<?php } ?>

    <footer class="pie">
        <div class="contenedor pie-interno">
            <span>Copyright © ASOVITA <?= date('Y') ?></span>
            <a href="https://www.facebook.com/asovita.bo" target="_blank">Facebook</a>
        </div>
    </footer>
</body>
</html>
