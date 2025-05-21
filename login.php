<?php
session_start();

// Definir variables
$usuarioCorrecto = "jperez";
$contrasenaCorrecta = "9999";
$mensaje = "";

// Verificar si se cerró sesión
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: ".$_SERVER['PHP_SELF']);
    exit;
}

// Verificar si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = trim($_POST["usuario"]);
    $contrasena = trim($_POST["contrasena"]);

    // Validar campos vacíos
    if (empty($usuario) || empty($contrasena)) {
        $mensaje = "Por favor, complete todos los campos.";
    } else {
        // Verificar credenciales
        if ($usuario === $usuarioCorrecto && $contrasena === $contrasenaCorrecta) {
            $_SESSION['logueado'] = true;
            $_SESSION['nombre'] = "Juan Pérez";
        } else {
            $mensaje = "Usuario y/o Contraseña incorrectos. Intentar nuevamente.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login de Usuario</title>
</head>
<body>

    <h2>Ingreso al sistema</h2>

    <?php if (isset($_SESSION['logueado']) && $_SESSION['logueado'] === true): ?>
        <p><strong>Bienvenido al sistema, <?php echo $_SESSION['nombre']; ?>.</strong></p>
        <form method="get" action="">
            <input type="submit" name="logout" value="Volver al Inicio">
        </form>
    <?php else: ?>
        <form method="post" action="">
            <label for="usuario">Usuario:</label>
            <input type="text" name="usuario" id="usuario" required><br><br>

            <label for="contrasena">Contraseña:</label>
            <input type="password" name="contrasena" id="contrasena" required><br><br>

            <input type="submit" value="Ingresar">
        </form>

        <?php if (!empty($mensaje)) {
            echo "<p><strong>$mensaje</strong></p>";
        } ?>
    <?php endif; ?>

</body>
</html>
