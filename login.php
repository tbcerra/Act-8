<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login de Usuario</title>
</head>
<body>

<?php
// Definir variables
$usuarioCorrecto = "jperez";
$contrasenaCorrecta = "9999";
$mensaje = "";

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
            $mensaje = "Bienvenido al sistema, Juan Pérez.";
        } else {
            $mensaje = "Usuario y/o Contraseña incorrectos. Intentar nuevamente.";
        }
    }
}
?>

<h2>Ingreso al sistema</h2>
<form method="post" action="">
    <label for="usuario">Usuario:</label>
    <input type="text" name="usuario" id="usuario" required><br><br>

    <label for="contrasena">Contraseña:</label>
    <input type="password" name="contrasena" id="contrasena" required><br><br>

    <input type="submit" value="Ingresar">
</form>

<?php
// Mostrar el mensaje si existe
if (!empty($mensaje)) {
    echo "<p><strong>$mensaje</strong></p>";
}
?>

</body>
</html>

