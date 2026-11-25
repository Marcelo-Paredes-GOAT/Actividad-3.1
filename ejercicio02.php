<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'GET' || !isset($_SESSION['codigo_acceso'])) {
    $_SESSION['codigo_acceso'] = rand(1000, 9999);
}
$mensaje = '';
$tipo = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = trim($_POST['usuario'] ?? '');
    $password = $_POST['password'] ?? '';
    $codigo = trim($_POST['codigo'] ?? '');
    if ($usuario === 'estudiante' && $password === 'Actividad123' && $codigo === (string) $_SESSION['codigo_acceso']) {
        $mensaje = 'Acceso exitoso. Los datos y el código coinciden.';
        $tipo = 'exito';
        $_SESSION['codigo_acceso'] = rand(1000, 9999);
    } else {
        $mensaje = 'Error de acceso. Usuario, contraseña o código incorrectos.';
        $tipo = 'error';
        $_SESSION['codigo_acceso'] = rand(1000, 9999);
    }
}
?>
<!doctype html>
<html lang="es">
<head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1"><title>Ejercicio 02</title><link rel="stylesheet" href="estilos.css"></head>
<body><main class="contenedor">
<h1>Ejercicio 02: Usuario y contraseña con rand()</h1>
<form class="formulario" method="post">
    <label for="usuario">Usuario</label><input id="usuario" name="usuario" required>
    <label for="password">Contraseña</label><input id="password" name="password" type="password" required>
    <label for="codigo">Código aleatorio</label><input id="codigo" name="codigo" required>
    <p>Código generado para la prueba: <strong><?= htmlspecialchars((string) $_SESSION['codigo_acceso']) ?></strong></p>
    <button type="submit">Comprobar acceso</button>
</form>
<p><small>Datos de prueba: usuario <strong>estudiante</strong> y contraseña <strong>Actividad123</strong>.</small></p>
<?php if ($mensaje): ?><div class="resultado <?= $tipo ?>"><?= htmlspecialchars($mensaje) ?></div><?php endif; ?>
<a class="volver" href="index.php">← Volver al menú principal</a>
</main></body></html>
